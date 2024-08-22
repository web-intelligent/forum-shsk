<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    //
    public function index()
    {
        $meta = [
            'title' => 'Восстановление пароля',
            'keywords' => 'восстановление пароля',
            'description' => 'Страница восстановление пароля',
        ];
        return view('user.forgot_password', compact('meta'));
    }

    public function store(Request $request)
    {

        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'email' => [
                    'required', 'email'
                ],
            ],
            // Сообщения об ошибках валидации
            [
                'email.required' => 'Поле "Логин (адрес электронной почты)" обязательно для заполнения',
                'email.email' => 'Поле "Логин (адрес электронной почты)" должны быть адресом электронной почты',
            ]

        )->validate();

        $user = DB::table('users')->select('id')->where('email', $request->email)->first();
        if(empty($user)) return redirect()->back()->with('wrong', 'Пользователь с указанным адресом электронной почты не найден');

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => 'Отправили на указанный адрес ссылку для сброса пароля'])
            : back()->with(['wrong' => 'Что-то пошло не так, попробуйте ещё раз']);

    }

    public function reset(Request $request)
    {
        $meta = [
            'title' => 'Восстановление пароля',
            'keywords' => 'восстановление пароля',
            'description' => 'Страница восстановление пароля',
        ];

        return view('user.reset_password', compact('meta', 'request'));
    }

    public function resetRequest(Request $request)
    {
        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'email' => [
                    'required', 'email'
                ],
                'password' => [
                    'required', 'min:8', 'max:25', 'confirmed'
                ],
            ],
            // Сообщения об ошибках валидации
            [
                'email.required' => 'Поле "Логин (адрес электронной почты)" обязательно для заполнения',
                'email.email' => 'Поле "Логин (адрес электронной почты)" должны быть адресом электронной почты',

                'password.required' => 'Поле "Пароль" обязательно для заполнения',
                'password.min' => 'Поле "Пароль" должно содержать минимум 8 символов',
                'password.max' => 'Поле "Пароль" должно содержать максимум 25 символов',
                'password.confirmed' => 'Поле "Пароль" должны совпадать с полем "Пароль ещё раз"',
            ]

        )->validate();

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (\App\Models\User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Пароль изменён успешно')
            : back()->with('wrong', 'Что-то пошло не так. попробуйте ещё раз!');
    }
}
