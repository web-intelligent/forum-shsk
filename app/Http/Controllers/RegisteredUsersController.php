<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ForumServices;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisteredUsersController extends Controller
{
    // Список пользователей
    public function index()
    {


        $meta = [
            'title' => 'Пользователи форума',
            'description' => 'Пользователи форума',
            'keywords' => 'Пользователи форума',
        ];
        $user = Auth::user();
        $users = \App\Models\User::where('is_admin', '=', 0)->orderBy('id')->get(); // сделать условие is_admin = 0

        $statistic = [];

        foreach ($users as $reg_user) {
            if (!isset($statistic['forms'])) {
                $statistic['forms'] = [];
            }
            if (!isset($statistic['forms'][ForumServices::$forum_forms[$reg_user->form]])) {
                $statistic['forms'][ForumServices::$forum_forms[$reg_user->form]] = 0;
            }
            $statistic['forms'][ForumServices::$forum_forms[$reg_user->form]] += 1;
        }

        return view('editor.users.index', compact('meta', 'user', 'users', 'statistic'));
    }

    // Подробно о пользователе
    public function show($user_id)
    {
        $user_get = \App\Models\User::where('id', $user_id)->first();
        $user = Auth::user();

        $meta = [
            'title' => 'Пользователь - ' . $user_get->name,
            'description' => 'Пользователь - ' . $user_get->name,
            'keywords' => 'пользователь - ' . $user_get->name,
        ];

        $performance_material = DB::table('material_docs')->where('user_id', $user_get->id)->first();

        return view('editor.users.show', compact('user_get', 'user', 'meta', 'performance_material'));
    }

    // Удаление пользователя
    public function destroy($user_id)
    {
        //
        \App\Models\User::destroy($user_id);
        return redirect()->back()->with('success', 'Пользователь удалён успешно');
    }

    // Редактирование пользователя
    public function edit($user_id)
    {
        $user = Auth::user();
        $user_get = \App\Models\User::where('id', $user_id)->first();

        $meta = [
            'title' => 'Редактирование пользователя - ' . $user_get->name,
            'description' => 'Редактирование пользователя - ' . $user_get->name,
            'keywords' => 'Редактирование пользователя - ' . $user_get->name,
        ];


        return view('editor.users.edit', compact('user_get', 'user', 'meta'));
    }

    // Обновление данных пользователя

    public function update(Request $request, $user_id)
    {
        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'email' => [
                    'required', 'max:25', 'min:5', 'email'
                ],
                'name' => [
                    'required', 'max:255', 'min:5', 'regex:/[А-Яа-яЁё]/u'
                ],
                'phone' => [
                    'required', 'max:18', 'min:18',
                ],
                'birth_day' => [
                    'required', 'date'
                ],
                'telegram' => [
                    'nullable', 'regex:/^@/'
                ],

                'category' => [
                    'required', 'integer'
                ],

                'seat' => [
                    'required', 'string', 'max:100'
                ],
                'standing' => [
                    'required', 'integer'
                ],

                'rank' => [
                    'nullable', 'array'
                ],
                'awards' => [
                    'nullable', 'array'
                ],
                'org_name' => [
                    'required', 'min:5'
                ],
                'address' => [
                    'required', 'min:5'
                ],
                'region' => [
                    'required'
                ],

                'form' => [
                    'required', 'integer'
                ],

                'location' => [
                    'required', 'string', 'max:1'
                ],
            ],
            // Сообщения об ошибках валидации
            [

                'email.required' => 'Укажите адрес электронной почты',
                'email.min' => 'Адрес электронной почты должен содержать не менее 5 символов',
                'email.max' => 'Адрес электронной почты должен содержать не более 25 символов',
                'email.email' => 'Адрес электронной почты указан неверно',

                'phone.required' => 'Укажите номер телефона',
                'phone.min' => 'Номер телефона должен содержать 18 символов',
                'phone.max' => 'Номер телефона должен содержать 18 символов',

                'name.required' => 'Укажите имя',
                'name.max' => 'Имя не должно содержать более 25 символов',
                'name.min' => 'Имя не должно содержать менее 1 символов',
                'name.regex' => 'В имени должны быть только кириллические символы',

                'birth_day.required' => 'Укажите дату рождения',
                'birth_day.date' => 'Неверный формат даты',

                'telegram.regex' => 'Начните ввод имени пользователя в телеграм с символа @',

                'category.required' => 'Поле "Укажите категорию" обязательно для заполнения',
                'category.integer' => 'В поле "Укажите категорию" указан неверный формат',

                'seat.required' => 'Поле "Должность" обязательно для заполнения',
                'seat.string' => 'В поле "Должность" указан неверный формат',
                'seat.max' => 'Поле "Должность" не может больше 100 символов',

                'standing.required' => 'Поле "Стаж работы" обязательно для заполнения',
                'standing.integer' => 'В поле "Стаж работы" указан неверный формат',

                'rank.array' => 'Неверный формат в поле "Спортивные звания"',
                'awards.array' => 'Неверный формат в поле "Ведомственные награды и звания"',

                'org_name.min' => 'Поле "Наименование организации" должно содержать минимум 5 символов',
                'org_name.required' => 'Поле "Наименование организации" обязательно для заполнения',

                'address.min' => 'Поле "Адрес" должно содержать минимум 5 символов',
                'address.required' => 'Поле "Адрес" обязательно для заполнения',

                'region.required' => 'Поле "Субъект РФ" обязательно для заполнения',

                'form.required' => 'Поле "Форма участия" обязательно для заполнения',
                'form.integer' => 'В поле "Форма участия" указан неверный формат',

                'location.required' => 'Поле "Тип населённого пункта" обязательно для заполнения',
                'location.string' => 'В поле "Тип населённого пункта" указан неверный формат',
                'location.max' => 'В поле "Тип населённого пункта" превышено максимальное значение',


            ]

        )->validate();


        // Получаем пользователя по ID
        $user = User::findOrFail($user_id);

        // Обновляем данные пользователя
        $user->name = $request->name;
        $user->email = $request->email;
        $user->birth_day = $request->birth_day;
        $user->phone = $request->phone;
        $user->telegram = $request->telegram;
        $user->category = $request->category;
        $user->seat = $request->seat;
        $user->standing = $request->standing;
        $user->rank = json_encode($request->rank, JSON_UNESCAPED_UNICODE);
        $user->awards = json_encode($request->awards, JSON_UNESCAPED_UNICODE);
        $user->org_name = $request->org_name;
        $user->address = $request->address;
        $user->region = $request->region;
        $user->form = $request->form;
        $user->location = $request->location;

        // Сохраняем изменения
        $user->save();

        return redirect()->route('users.index')->with('success', 'Данные участника форума изменены успешно');
    }
}
