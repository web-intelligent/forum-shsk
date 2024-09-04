<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    // Список ответов определённого вопроса
    public function index($question_id)
    {
        $answers = DB::table('answers')->where('question_id', '=', $question_id)->get();
        $question = DB::table('questions')->where('id', '=', $question_id)->first();

        $meta = [
            'title' => 'Ответы на вопрос "' . $question->question . '"',
            'description' => 'Ответы на вопрос "' . $question->question . '"',
            'keywords' => 'Ответы на вопрос "' . $question->question . '"',
        ];

        $user = Auth::user();


        return view('test.answer.index', compact('meta', 'user', 'answers', 'question'));
    }

    /*
     * Форма добавления ответа
     * */
    public function create($question_id)
    {
        $question = DB::table('questions')->where('id', '=', $question_id)->first();

        $meta = [
            'title' => 'Добавление ответов на вопрос "' . $question->question . '"',
            'description' => 'Добавление ответов на вопрос "' . $question->question . '"',
            'keywords' => 'Добавление ответов на вопрос "' . $question->question . '"',
        ];

        $user = Auth::user();

        return view('test.answer.create', compact('meta', 'user', 'question', 'question_id'));
    }

    /*
     * Добавление ответа
     * */
    public function store(Request $request)
    {
        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'answer' => [
                    'required',
                ],
                'right' => [
                    'nullable', 'integer'
                ],

            ],
            // Сообщения об ошибках валидации
            [
                'answer.required' => 'Укажите ответ',
                'right.integer' => 'Указан неверный формат правильного ответа',
            ]

        )->validate();

        // Нужно проверить тип вопроса и проверить кол-во правильных ответов
        $question_type = DB::table('questions')->where('id', '=', $request->question_id)->first('type');

        $right = 0;
        if(isset($request->right)) {
            if($question_type->type == 1) {
                $right_answers_amount = DB::table('answers')
                    ->where('question_id', '=', $request->question_id)
                    ->where('right', '=', 1)
                    ->groupBy('right')
                    ->count();
                if ($right_answers_amount != 0) return redirect()->route('answer.index', ['question_id' => $request->question_id])->with('wrong', 'Превышено количество верных ответов для данного вопроса');
            }
            $right = $request->right;
        }

        $insert = DB::table('answers')->insert([
            'question_id' => $request->question_id,
            'answer' => htmlspecialchars(trim($request->answer)),
            'right' => $right,
        ]);

        if($insert) return redirect()->route('answer.index', ['question_id' => $request->question_id])->with('success', 'Ответ был добавлен успешно');

        return redirect()->route('answer.index', ['question_id' => $request->question_id])->with('wrong', 'Что-то пошло не так!');

    }

    /*
     * Форма редактирования ответа
     * */

    public function edit($answer_id)
    {
        $answer= DB::table('answers')->where('id', '=', $answer_id)->first();

        $meta = [
            'title' => 'Редактирование ответа "' . $answer->answer . '"',
            'description' => 'Редактирование ответа "' . $answer->answer . '"',
            'keywords' => 'Редактирование ответа "' . $answer->answer . '"',
        ];

        $user = Auth::user();

        return view('test.answer.edit', compact('meta', 'user', 'answer'));
    }

    /*
     * Обновление ответа
     * */
    public function update(Request $request)
    {
        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'answer' => [
                    'required',
                ],
                'right' => [
                    'nullable', 'integer'
                ],
                'answer_id' => [
                    'required', 'integer'
                ],

            ],
            // Сообщения об ошибках валидации
            [
                'answer.required' => 'Укажите ответ',
                'right.integer' => 'Указан неверный формат правильного ответа',

                'answer_id.integer' => 'Указан неверный формат редактируемого ответа ответа',
                'answer_id.required' => 'Не указан ID ответа',
            ]

        )->validate();

        $question_id = DB::table('answers')->where('id', '=', $request->answer_id)->first('question_id');

        // Нужно проверить тип вопроса и проверить кол-во правильных ответов
        $question_type = DB::table('questions')->where('id', '=', $question_id->question_id)->first('type');

        $right = 0;
        if(isset($request->right)) {
            if($question_type->type == 1) {
                $right_answers_amount = DB::table('answers')
                    ->where('question_id', '=', $question_id->question_id)
                    ->where('right', '=', 1)
                    ->groupBy('right')
                    ->count();
                if ($right_answers_amount != 0) return redirect()->route('answer.index', ['question_id' => $question_id->question_id])->with('wrong', 'Превышено количество верных ответов для данного вопроса');
            }
            $right = $request->right;
        }

        $update = DB::table('answers')->where('id', '=', $request->answer_id)->update([
            'answer' => htmlspecialchars(trim($request->answer)),
            'right' => $right,
        ]);

        if($update) return redirect()->route('answer.index', ['question_id' => $question_id->question_id])->with('success', 'Ответ был отредактирован успешно');

        return redirect()->route('answer.index', ['question_id' => $question_id->question_id])->with('wrong', 'Что-то пошло не так!');
    }


    /*
     * Удаление ответа
     * */

    public function destroy($answer_id)
    {
        $delete = DB::table('answers')->where('id', '=', $answer_id)->delete();
        if($delete) return redirect()->back()->with('success', 'Ответ был удалён успешно');
        return redirect()->back()->with('wrong', 'Что-то пошло не так!');
    }

}
