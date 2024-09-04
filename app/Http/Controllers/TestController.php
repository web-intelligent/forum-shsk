<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $meta = [
            'title' => 'Всероссийский форум школьных спортивных клубов - Тесты',
            'description' => 'Всероссийский форум школьных спортивных клубов - Тесты',
            'keywords' => 'тесты',
        ];

        $tests = Test::all();
        $user = Auth::user();

        return view('test.index', compact('meta', 'tests', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $meta = [
            'title' => 'Всероссийский форум школьных спортивных клубов - Тесты',
            'description' => 'Всероссийский форум школьных спортивных клубов - Тесты',
            'keywords' => 'тесты',
        ];

        $user = Auth::user();

        return view('test.create', compact('meta','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'name' => [
                    'required', 'max:55', 'min:2'
                ],
                'description' => [
                    'nullable', 'max:255', 'min:2'
                ],
                'open_date' => [
                    'nullable', 'date'
                ],
                'timeout' => [
                    'nullable', 'integer'
                ],
            ],
            // Сообщения об ошибках валидации
            [
                'name.required' => 'Укажите наименование теста',
                'name.max' => 'Наименование теста не должно содержать более 55 символов',
                'name.min' => 'Наименование теста не должно содержать менее 2 символов',

                'description.max' => 'Описание теста не должно содержать более 255 символов',
                'description.min' => 'Описание теста не должно содержать менее 2 символов',

                'open_date.date' => 'Неверно указана дата',
                'timeout.integer' => 'Неверно указано время',
            ]

        )->validate();

        $insert = Test::create([
            'name' => $request->name,
            'description' => $request->description,
            'timeout' => $request->timeout,
            'open_date' => $request->open_date,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if($insert) return redirect()->route('test.index')->with('success', 'Тест создан успешно');

        return redirect()->back(500)->with('wrong', 'Что-то пошло не так! Обратитесь в службу технической поддержки');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        $q_and_a = DB::table('questions')
            ->leftJoin('answers', 'questions.id', '=', 'answers.question_id')
            ->where('test_id', '=', $test->id)
            ->select(
                'question',
                'questions.id as question_id',
                'answers.id as answer_id',
                'type',
                'answer',
                'right'
            )->get();

        foreach ($q_and_a as $a) {
            $arr[$a->question][$a->type][$a->answer]['right'] = $a->right;
            $arr[$a->question][$a->type][$a->answer]['question_id'] = $a->question_id;
            $arr[$a->question][$a->type][$a->answer]['answer_id'] = $a->answer_id;
        }

        $meta = [
            'title' => $test->name .' - Всероссийский форум школьных спортивных клубов',
            'description' => $test->description,
            'keywords' => $test->name
        ];

        $user = Auth::user();

        return view('test.show', compact('meta', 'test', 'user', 'arr'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function showForUser($test_id)
    {
        $points = 0;
        // проверим есть ли уже результат по тестированию
        $t = DB::table('test_user_answers')->where([
            ['test_id', '=', $test_id],
            ['user_id', '=', Auth::id()],
        ])->first(array('id', 'test_data'));

        if(!empty($t)) {
            $test_data = json_decode($t->test_data, true);
            foreach ($test_data as $a_id) {
                $get = DB::table('answers')->where('id', '=', $a_id)->first('right');
                if(!empty($get)) {
                    if($get->right == 1) $points += 1;
                }
            }
        }

        // получим сам тест
        $test = Test::where('id', $test_id)->first();
        $q_and_a = DB::table('questions')
            ->where('test_id', '=', $test->id)
            ->leftJoin('answers', 'questions.id', '=', 'answers.question_id')
            ->inRandomOrder('questions.id')
            ->select(
                'question',
                'questions.id as question_id',
                'answers.id as answer_id',
                'type',
                'answer',
                'right'
            )->get();

        $arr = [];
        foreach ($q_and_a as $a) {
            if($a->type == 1) {
                $arr[$a->question][$a->type][$a->answer]['right'] = $a->right;
                $arr[$a->question][$a->type][$a->answer]['question_id'] = $a->question_id;
                $arr[$a->question][$a->type][$a->answer]['answer_id'] = $a->answer_id;
            }
            elseif ($a->type == 3) {
                $arr[$a->question][$a->type]['question_id'] = $a->question_id;
            }
        }
        // перетасовываем результат

        $meta = [
            'title' => $test->name .' - Всероссийский форум школьных спортивных клубов',
            'description' => $test->description,
            'keywords' => $test->name
        ];

        $user = Auth::user();

        return view('test.show_for_user', compact('meta', 'test', 'user', 'arr', 't', 'points'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
        $meta = [
            'title' => 'Всероссийский форум школьных спортивных клубов - Тесты',
            'description' => 'Всероссийский форум школьных спортивных клубов - Тесты',
            'keywords' => 'тесты',
        ];

        $user = Auth::user();

        return view('test.edit', compact('meta','user', 'test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'name' => [
                    'required', 'max:55', 'min:2'
                ],
                'description' => [
                    'nullable', 'max:255', 'min:2'
                ],
                'open_date' => [
                    'nullable', 'date'
                ],
                'timeout' => [
                    'nullable', 'integer'
                ],
            ],
            // Сообщения об ошибках валидации
            [
                'name.required' => 'Укажите наименование теста',
                'name.max' => 'Наименование теста не должно содержать более 55 символов',
                'name.min' => 'Наименование теста не должно содержать менее 2 символов',

                'description.max' => 'Описание теста не должно содержать более 255 символов',
                'description.min' => 'Описание теста не должно содержать менее 2 символов',

                'open_date.date' => 'Неверно указана дата',
                'timeout.integer' => 'Неверно указано время',
            ]

        )->validate();

        $update = Test::where('id', $test->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'timeout' => $request->timeout,
            'open_date' => $request->open_date,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if($update) return redirect()->route('test.index')->with('success', 'Тест отредактирован успешно');

        return redirect()->back(500)->with('wrong', 'Что-то пошло не так! Обратитесь в службу технической поддержки');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($test_id)
    {

        Test::destroy($test_id);
        return redirect()->route('test.index')->with('success', 'Тест удалён успешно');
    }

    /*
     * Публикация теста
     * */
    public function publish($test_id)
    {
        $update = Test::where('id', $test_id)->update(['publish' => 1]);
        if($update) return redirect()->route('test.index')->with('success', 'Тест опубликован успешно');
    }

    /*
     * Отмена публикация теста
     * */
    public function unpublish($test_id)
    {
        $update = Test::where('id', $test_id)->update(['publish' => 0]);
        if($update) return redirect()->route('test.index')->with('success', 'Тест снят с публикации');
    }

    /*
     * Отправка теста
     * */

    public function sendTest(Request $request)
    {
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'test_id' => [
                    'required', 'integer'
                ],
            ],
            // Сообщения об ошибках валидации
            [
                'test_id.required' => 'Укажите идентификатор теста',
                'test_id.integer' => 'Идентификатор теста указан неверно',
            ]

        )->validate();

        $user_answer = [];
        foreach ($request->all() as $key => $value) {
            if($key != 'test_id' && $key != '_token') $user_answer[$key] = $value;
        }
        // Записываем ответы в БД
        $insert = DB::table('test_user_answers')->insert([
            'user_id' => Auth::id(),
            'test_id' => $request->test_id,
            'test_data' => json_encode($user_answer, JSON_UNESCAPED_UNICODE),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if($insert) {
            $main_arr = []; // массив для сбора вопросов ответов
            $points = 0;
            // Выводим результат теста
            foreach ($user_answer as $q_id => $a_id) {
                // смотрим тип вопроса
                $q_type = DB::table('questions')->where('id', '=', $q_id)->first(['type', 'question']);

                // тип выбора одного ответа
                if($q_type->type == 1) {
                    // Берём все ответы на вопрос
                    $q_answers = DB::table('answers')->where('question_id', '=', $q_id)->get(['answer', 'right', 'id']);
                    foreach ($q_answers as $answer) {
                        if($answer->right == 1 && $answer->id == $a_id) {
                            $main_arr[$q_type->question]['right'][] = $answer->answer;
                            $points += 1;
                        } else {
                            $main_arr[$q_type->question]['wrong'][] = $answer->answer;
                        }
                    }
                }

                // тип выбора нескольких ответов
                if($q_type->type == 2) {

                }

                // тип ответа в свободной форме
                if($q_type->type == 3) {

                }
            }

            $meta = [
                'title' => 'Результат прохождения тестирования - Всероссийский форум школьных спортивных клубов',
                'description' => 'Результат прохождения тестирования - Всероссийский форум школьных спортивных клубов',
                'keywords' => 'Результат прохождения тестирования - Всероссийский форум школьных спортивных клубов',
            ];

            $user = Auth::user();

            $test = Test::where('id', $request->test_id)->first();

            return view('test.user_result', compact('meta', 'main_arr', 'user', 'test', 'points' ))->with('success', 'Результат Вашего тестирования принят');
        }
    }
}
