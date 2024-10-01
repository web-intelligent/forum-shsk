<?php

namespace App\Http\Controllers;

use App\Events\UserDocsConfirmEvent;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserIncomeRegisterController extends Controller
{
    public function index()
    {
        $meta = [
            'title' => 'Регистрация участников форума',
            'description' => 'Регистрация участников форума. Список участников, приезжающих на мероприятие',
            'keywords' => 'регистрация участников форума',
        ];

        $user = Auth::user();

        $users = DB::table('users')
            ->leftJoin('users_income_confirm', 'users_income_confirm.user_id', '=', 'users.id')
            ->where('is_admin', '=', 0)
//            ->where('email_verified_at', '!=', NULL)
            ->where('form', '!=', 4)
            ->where('form', '!=', 5)
            ->select('users.*', 'docs', 'income')
            ->get();

        $statistic = [];
        $statistic['people_total_amount'] = count($users);
        $statistic['docs_confirm_amount'] = 0;
        $statistic['income_confirm_amount'] = 0;
        foreach ($users as $data) {
            if($data->docs == 1) $statistic['docs_confirm_amount'] += 1;
            if($data->income == 1) $statistic['income_confirm_amount'] += 1;
        }


        return view('user_income_register.index', compact('meta', 'user', 'users', 'statistic'));
    }

//    /*
//     * Получение зарегистрированных пользователей асинхронно
//     * */
//    public function getRegisteredMembers(Request $request) {
//        if($request->ajax()) {
//
//            $users = DB::table('users')
//                ->where('is_admin', '=', 0)
//                ->where('email_verified_at', '!=', NULL)
//                ->select('users.*', 'docs', 'income')
//                ->leftJoin('users_income_confirm', 'users_income_confirm.user_id', '=', 'users.id')
//                ->get();
//
//            return view('user_income_register.ajax.index', compact('users'));
//        }
//    }

    /*
    * Подтверждение приезда
    */
    public function income($user_id)
    {
        $test = DB::table('users_income_confirm')->where('user_id', '=', $user_id)->first('id');
        if(!is_null($test)) {
            // Обновляем данные
            $update = DB::table('users_income_confirm')->where('id', '=', $test->id)->update(['income' => 1]);
            if($update) return redirect()->back()->with('success', 'Данные успешно сохранены');
        } else {
            // Добавляем данные
            $insert = DB::table('users_income_confirm')->insert(['user_id' => $user_id, 'income' => 1]);
            if($insert) return redirect()->back()->with('success', 'Данные успешно сохранены');
        }

        return redirect()->back()->with('wrong', 'Что-то пошло не так!');
    }

    /*
    * Подтверждение выдачи комплектов документов
    */
    public function userDocsConfirm(Request $request)
    {

        $test = DB::table('users_income_confirm')->where('user_id', '=', $request->user_id)->first(['id', 'docs']);
        if(!is_null($test)) {
            $docs = 1;
            if ($test->docs == 1) $docs = 0;
            // Обновляем данные
            $update = DB::table('users_income_confirm')->where('id', '=', $test->id)->update(['docs' => $docs]);
            if($update) {
                if($docs == 0) {
                    event(new UserDocsConfirmEvent($request->user_id, 'docs_confirm', 'minus'));
                    echo 3;
                } else {
                    event(new UserDocsConfirmEvent($request->user_id, 'docs_confirm', 'plus'));
                    echo 2;
                }
                exit();
            }
        } else {
            // Добавляем данные
            $insert = DB::table('users_income_confirm')->insert(['user_id' => $request->user_id, 'docs' => 1]);
            if($insert) {
                event(new UserDocsConfirmEvent($request->user_id, 'docs_confirm', 'plus'));
                echo 1;
                exit();
            }

        }

        return redirect()->back()->with('wrong', 'Что-то пошло не так!');
    }

    /*
    * Подтверждение приезда участника
    */
    public function userIncomeConfirm(Request $request)
    {

        $test = DB::table('users_income_confirm')->where('user_id', '=', $request->user_id)->first(['id', 'income']);
        if(!is_null($test)) {
            $income = 1;
            if ($test->income == 1) $income = 0;
            // Обновляем данные
            $update = DB::table('users_income_confirm')->where('id', '=', $test->id)->update(['income' => $income]);
            if($update) {
                if($income == 0) {
                    event(new UserDocsConfirmEvent($request->user_id, 'income_confirm', 'minus'));
                    echo 3;
                } else {
                    event(new UserDocsConfirmEvent($request->user_id, 'income_confirm', 'plus'));
                    echo 2;
                }
                exit();
            }
        } else {
            // Добавляем данные
            $insert = DB::table('users_income_confirm')->insert(['user_id' => $request->user_id, 'income' => 1]);
            if($insert) {
                event(new UserDocsConfirmEvent($request->user_id, 'income_confirm', 'plus'));
                echo 1;
                exit();
            }

        }

        return redirect()->back()->with('wrong', 'Что-то пошло не так!');
    }
}
