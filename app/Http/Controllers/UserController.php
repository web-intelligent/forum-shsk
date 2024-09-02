<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Policies\IsAdminPolicy;
use App\Services\ForumServices;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use \App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{

    /*
     * Страница авторизации
     * */
    public function authForm()
    {
        // Проверим если авторизован, перенаправим в личный кабинет
//        if(Auth::check()) {
//            return redirect()->route('user.auth'); // не создан маршрут
//        }

        $meta = [
            'title' => 'Авторизация пользователя',
            'description' => 'Страница авторизации пользователя',
            'keywords' => 'авторизация пользователя'
        ];

        return view('authorisation', compact('meta'));
    }

    /*
     * Авторизация пользователя
     * */
    public function authUser(Request $request)
    {
        $valid_fields = [
            'password' => [
                'required', 'min:8', 'max:25'
            ],
            'email' => [
                'required', 'max:25', 'min:5', 'email'
            ],
        ];
        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила

            $valid_fields,

            // Сообщения об ошибках валидации
            [
                'password.required' => 'Укажите пароль',
                'password.min' => 'Пароль должен содержать не менее 8 символов',
                'password.max' => 'Пароль должен содержать не более 25 символов',

                'email.required' => 'Укажите адрес электронной почты',
                'email.min' => 'Адрес электронной почты должен содержать не менее 5 символов',
                'email.max' => 'Адрес электронной почты должен содержать не более 25 символов',
                'email.email' => 'Адрес электронной почты указан неверно',

            ]

        )->validate();

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->filled('remember'))) {

            // Установка куки запоминания, если выбрана опция "Remember Me"
            if ($request->filled('remember')) {
                Auth::user()->setRememberToken(Str::random(60));
                Auth::user()->save();

                $rememberToken = Auth::user()->getRememberToken();
                Cookie::queue('remember_token', $rememberToken, 43200); // Продолжительность куки - 30 дней
            }

            session()->flash('success', 'Вы авторизовались успешно');
            return redirect()->route('user.profile');
//            if(Auth::user()->is_admin) {
//                return redirect()->route('admin.dashboard');
//            } else {
//                return redirect()->route('user.profile');
//            }
        }

        return redirect()->back()->with('wrong', 'Неверный логин или пароль');
    }


    /*
     * Страница регистрации пользователя
     * */
    public function registerForm()
    {
        // Проверим если авторизован, перенаправим в личный кабинет
        if(Auth::check()) {
            return redirect()->route('user.profile');
        }

        $meta = [
            'title' => 'Регистрация участника на форум ШСК',
            'description' => 'Страница регистрации Всероссийского форума школьных спортивных клубов! Мы рады, что вы решили присоединиться к нашему сообществу',
            'keywords' => 'регистрация на форум шск, регистрация форум шск, форум шск регистрация,'
        ];

        return view('registration', compact('meta'));
    }

    /*
     * Регистрация пользователя
     * */
    public function registerUser(Request $request)
    {

        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'password' => [
                    'required', 'min:8', 'max:25', 'confirmed'
                ],
                'email' => [
                    'required', 'max:25', 'min:5', 'email', 'unique:users'
                ],
                'name' => [
                    'required', 'max:25', 'min:2', 'regex:/[А-Яа-яЁё]/u'
                ],
                'phone' => [
                    'required', 'max:18', 'min:18', 'unique:users'
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
                'accept' => [
                    'accepted'
                ],
            ],
            // Сообщения об ошибках валидации
            [
                'password.required' => 'Укажите пароль',
                'password.confirmed' => 'Пароли не совпадают',
                'password.min' => 'Пароль должен содержать не менее 8 символов',
                'password.max' => 'Пароль должен содержать не более 25 символов',
                'password.regex' => 'Пароль должен содержать хотя бы одну строчную букву, одну заглавную букву и одну цифру',

                'email.required' => 'Укажите адрес электронной почты',
                'email.min' => 'Адрес электронной почты должен содержать не менее 5 символов',
                'email.max' => 'Адрес электронной почты должен содержать не более 25 символов',
                'email.email' => 'Адрес электронной почты указан неверно',
                'email.unique' => 'Указанный адрес электронной почты уже зарегистрирован',

                'phone.required' => 'Укажите номер телефона',
                'phone.min' => 'Номер телефона должен содержать 18 символов',
                'phone.max' => 'Номер телефона должен содержать 18 символов',
                'phone.unique' => 'Указанный номер телефона уже зарегистрирован',

                'name.required' => 'Укажите имя',
                'name.max' => 'Имя не должно содержать более 25 символов',
                'name.min' => 'Имя не должно содержать менее 2 символов',
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

                'accept.accepted' => 'Необходимо дать согласие на обработку персональных данных',

            ]

        )->validate();


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'birth_day' => $request->birth_day,
            'phone' => $request->phone,
            'telegram' => $request->telegram,
            'category' => $request->category,
            'seat' => $request->seat,
            'standing' => $request->standing,
            'rank' => json_encode($request->rank, JSON_UNESCAPED_UNICODE),
            'awards' => json_encode($request->awards, JSON_UNESCAPED_UNICODE),
            'org_name' => $request->org_name,
            'address' => $request->address,
            'region' => $request->region,
            'form' => $request->form,
            'location' => $request->location,
            'password' => Hash::make($request->password),
            'ip_address' => $request->ip(),

        ]);

        if($user) {
            event(new Registered($user));
            session()->flash('success', 'Регистрация учётной записи завершена успешно, необходимо подтвердить адрес электронной почты, указанный при регистрации');
            return redirect()->route('login');
        }

        return redirect()->back()->with('wrong', 'Что-то пошло не так, напишите нам об этом');


    }

    /*
    *   Выход пользователя
     * */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    /*
     * Страница профиля пользователя
     * */
    public function userProfile()
    {
        if(!Auth::check()) return redirect()->route('login');

        $meta = [
            'title' => 'Личный кабинет - Всероссийский форум школьных спортивных клубов',
            'description' => 'Личный кабинет пользователя. Всероссийский форум школьных спортивных клубов',
            'keywords' => 'личный кабинет'
        ];

        $user = Auth::user();

        $performance_material = DB::table('material_docs')->where('user_id', $user->id)->first();

        $program = DB::table('user_program')->where('user_id', '=', Auth::id())->first('program');


        return view('user.profile', compact('meta', 'user', 'performance_material', 'program'));
    }

    /*
     * Страница редактирования профиля
     * */
    public function changeProfileDataForm()
    {
        $user = Auth::user();
        $meta = [
            'title' => 'Редактирование основных данных пользователя',
            'description' => 'Страница редактирование основных данных пользователя',
            'keywords' => 'редактирование основных данных пользователя'
        ];

        return view('user.change_profile', compact('user', 'meta'));
    }

    /*
     * Отправка данных на обновление
     * */
    public function changeProfileDataFormRequest(Request $request)
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

        $userId = Auth::id();
        // Получаем пользователя по ID
        $user = User::findOrFail($userId);

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

        return redirect()->route('user.profile')->with('success', 'Данные изменены успешно');
    }


    /*
     * Загрузка аватара
     * */
    public function uploadAvatar(Request $request)
    {
        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'avatar' => [
                    'required', 'image', 'mimes:jpg,png,jpeg', 'max:4096', 'dimensions:min_width=500,min_height=500,max_width=4000,max_height=4000'
                ],

            ],
            // Сообщения об ошибках валидации
            [
                'avatar.image' => 'Указан неверный формат изображения',
                'avatar.mimes' => 'Изображение должно быть в формате jpg, jpeg или png',
                'avatar.max' => 'Размер изображения должен быть не более 4МБ',
                'avatar.dimensions' => 'Размер изображения должен быть не менее 500 пикселей и не более 4000 пикселей',
                'avatar.required' => 'Не добавлено изображение профиля',
            ]

        )->validate();



        $user_id = Auth::id();

        $avatar = '';
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->storeAs("avatar/" . Auth::id(), $request->file('avatar')->getClientOriginalName(), 'public');
        }

        $user = User::findOrFail($user_id);

        $user->avatar = $avatar;

        $user->save();

        return redirect()->route('user.profile')->with('success', 'Изображение профиля загружено успешно');

    }


    /*
     * Страница опроса пользователей
     * */
    public function pollForm() {
        $meta = [
            'title' => 'Опрос пользователя',
            'keywords' => 'опрос пользователя',
            'description' => 'Страница опроса пользователей',
        ];
        $user = Auth::user();
        return view('user.poll', compact('meta', 'user'));
    }

    /*
     * Страница сертификата пользователя
     * */
    public function certificatePage() {
        $meta = [
            'title' => 'Сертификат пользователя',
            'keywords' => 'сертификат пользователя',
            'description' => 'Страница сертификата пользователей',
        ];
        $user = Auth::user();
        return view('user.certificate', compact('meta', 'user'));
    }

    /*
     * Страница QR КОД
     * */
    public function scanUser($id) {

        $user = User::find($id);

        $meta = [
            'title' => 'Участник форума ' . $user->name,
            'keywords' => 'участник форума ' . $user->name,
            'description' => 'Страница участника форума ' . $user->name,
        ];

        return view('forum_member', compact('meta', 'user'));
    }


    /*
     *
     * Загрузка материалов для выступления
     * */

    public function uploadMaterials(Request $request)
    {

        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'material_docs' => [
                    'required', 'mimes:ppt,pptx'
                ],
            ],

            // Сообщения об ошибках валидации
            [
                'material_docs.mimes' => 'Неверный формат файла. Требуется презентация в формате PowerPoint',
                'material_docs.required' => 'Файлы для загрузки не добавлены',
            ]

        )->validate();

        $material_docs = '';

        // Загрузка на диск
        if ($request->hasFile('material_docs')) {
            $material_docs = $request->file('material_docs')->storeAs("performance-materials/" . Auth::id(), $request->file('material_docs')->getClientOriginalName(), 'public');
        }

        // пробуем обновить инфо
        $update = DB::table('material_docs')->where('user_id', '=', Auth::id())->update([
            'user_id' => Auth::id(),
            'material_docs' => $material_docs,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // проверяем состояние
        if($update) return redirect()->route('user.profile')->with('success', 'Материал для выступления обновлен успешно');

        // если $update != true пробуем вставить новую запись
        $insert = DB::table('material_docs')->insert([
            'user_id' => Auth::id(),
            'material_docs' => $material_docs,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // проверяем состояние
        if($insert) return redirect()->route('user.profile')->with('success', 'Материал для выступления добавлены успешно');

        // если не то и не другое не сработало тогда тормозим процесс
        return redirect()->back()->with('wrong', 'Материал для выступления не добавлены');
    }


    /*
     * Страница распечатывания QR кода
     * */

    public function printQrCode($user_id)
    {

        return view('user.print_qrcode', compact('user_id'));
    }

}
