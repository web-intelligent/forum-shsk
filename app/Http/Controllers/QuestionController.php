<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /*
     * Список вопросов
     * */

    public function index($test_id)
    {
        $test = Test::where('id', $test_id)->first();

        $meta = [
            'title' => 'Список вопросов к тесту "'. $test->name .'"',
            'description' => 'Список вопросов к тесту "'. $test->name .'"',
            'keywords' => 'Список вопросов к тесту "'. $test->name .'"',
        ];

        $questions = DB::table('questions')->where('test_id', '=', $test_id)->get();

        $user = Auth::user();


        return view('test.question.index', compact('meta', 'user', 'test_id', 'test', 'questions'));
    }

    // Форма добавления вопроса и ответов
    public function create($test_id)
    {
        $meta = [
            'title' => 'Всероссийский форум школьных спортивных клубов - Тесты',
            'description' => 'Всероссийский форум школьных спортивных клубов - Тесты',
            'keywords' => 'тесты',
        ];

        $user = Auth::user();

        $test = Test::where('id', $test_id)->first();

        return view('test.question.create', compact('meta', 'user', 'test_id', 'test'));
    }

    public function store(Request $request)
    {
        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'question' => [
                    'required', 'max:500',
                ],
                'type' => [
                    'required', 'integer'
                ],
                'test_id' => [
                    'required', 'integer'
                ],
            ],
            // Сообщения об ошибках валидации
            [
                'question.required' => 'Укажите вопрос',
                'question.max' => 'Максимально допустимое число символов вопроса 500',
                'type.required' => 'Укажите тип вопроса',
                'type.integer' => 'Неверно указан формат типа вопроса',

                'test_id.required' => 'Укажите ID теста',
                'test_id.integer' => 'Неверный формат ID теста',
            ]

        )->validate();

        $insert = DB::table('questions')->insert([
            'test_id' => $request->test_id,
            'question' => htmlspecialchars(trim($request->question)),
            'type' => $request->type,
        ]);

        if($insert) return redirect()->route('question.index', ['test_id' => $request->test_id])->with('success', 'Вопрос был успешно добавлен');

        return redirect()->back()->with('wrong', 'Что-то пошло не так!');

    }

    /*
     * Форма редактирования вопроса
     * */

    public function edit($question_id)
    {
        $question = DB::table('questions')->where('id', '=', $question_id)->first();
        $meta = [
            'title' => 'Редактирование вопроса "'. $question->question .'"',
            'description' => 'Редактирование вопроса "'. $question->question .'"',
            'keywords' => 'Редактирование вопроса "'. $question->question .'"',
        ];

        $user = Auth::user();

        return view('test.question.edit', compact('meta', 'user', 'question'));
    }

    /*
     * Обновление вопроса
     * */
    public function update(Request $request)
    {
        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'question' => [
                    'required', 'max:500',
                ],
                'type' => [
                    'required', 'integer'
                ],
                'question_id' => [
                    'required', 'integer'
                ],
            ],
            // Сообщения об ошибках валидации
            [
                'question.required' => 'Укажите вопрос',
                'question.max' => 'Максимально допустимое число символов вопроса 500',
                'type.required' => 'Укажите тип вопроса',
                'type.integer' => 'Неверно указан формат типа вопроса',

                'question_id.required' => 'Укажите ID вопроса',
                'question_id.integer' => 'Неверный формат ID вопроса',
            ]

        )->validate();

        $test_id = DB::table('questions')->where('id', '=', $request->question_id)->first('test_id');

        $update = DB::table('questions')
            ->where('id', '=', $request->question_id)
            ->update([
                'question' => htmlspecialchars(trim($request->question)),
                'type' => $request->type,
            ]);

        if($update) return redirect()->route('question.index', ['test_id' => $test_id->test_id])->with('success', 'Вопрос был отредактирован успешно');

        return redirect()->back()->with('wrong', 'Что-то пошло не так!');
    }


    /*
     * Удаление вопроса
     * */
    public function destroy($question_id)
    {
        $delete = DB::table('questions')->where('id', '=', $question_id)->delete();
        if($delete) return redirect()->back()->with('success', 'Вопрос удалён успешно');
        return redirect()->back()->with('wrong', 'Что-то пошло не так');
    }

}
