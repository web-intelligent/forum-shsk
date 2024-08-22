@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel">
        @include('includes.profile_main_header')

        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Изменение данных профиля</h4>
                </div>
                <div class="mb-3">
                    <a href="{{ route('user.profile') }}"><i class="fa-solid fa-arrow-left"></i> Назад</a>
                </div>
                <div class="page-category">


                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 offset-sm-0 offset-md-3 offset-lg-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="mb-4 text-center">Редактирование основных данных участника</h4>
                                    <form class="needs-validation" action="{{ route('change.profile.data.request') }}" method="POST" novalidate>
                                        @csrf
                                        @if ($errors->any())
                                            <div class="response-message-register">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                <small style="font-size: 10px" class="text-white">Нажмите, чтобы скрыть</small>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6 mb-3">
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Ваше ФИО *</div>
                                                    <input required type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" placeholder="Иванов Иван Иванович">
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите ФИО
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Дата рождения *</div>
                                                    <input required type="date" class="form-control" name="birth_day" value="{{ old('birth_day', $user->birth_day) }}">
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите дату рождения
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Имя пользователя в Телеграм</div>
                                                    <input type="text" class="form-control" name="telegram" value="{{ old('telegram', $user->telegram) }}" placeholder="Например, @user_name">
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите имя пользователя в Телеграм
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Ваша должность *</div>
                                                    <input required type="text" class="form-control" name="seat" value="{{ old('seat', $user->seat) }}" placeholder="Например, учитель физической культуры">
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите должность
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-1 fw-bold">Спортивное звание</div>
                                                    @foreach(\App\Services\ForumServices::$forum_rank as $key => $rank)
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="rank[]" @if(!is_null(old('rank', json_decode($user->rank, true))) && in_array($key, old('rank', json_decode($user->rank, true)))) checked @endif type="checkbox" value="{{ $key }}" id="rank_{{ $key }}">
                                                            <label class="form-check-label" for="rank_{{ $key }}">
                                                                {{ $rank }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-6 mb-3">
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Адрес электронной почты *</div>
                                                    <input required type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="contact@mail.ru">
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите адрес электронной почты
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Контактный телефон *</div>
                                                    <input required type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="+7 (999) 999-99-99">
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите контактный телефон
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-1 fw-bold">Укажите категорию *</div>
                                                    <select required name="category" class="form-select">
                                                        <option value="">Выберите категорию</option>
                                                        @foreach(\App\Services\ForumServices::$forum_categories as $key => $category)
                                                            <option @if(old('category', $user->category) == $key) selected @endif value="{{ $key }}">{{ $category }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите категорию
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-1 fw-bold">Стаж педагогической деятельности *</div>
                                                    @foreach(\App\Services\ForumServices::$forum_standing as $key => $standing)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="standing" @if(old('standing', $user->standing) == $key) checked @endif id="standing_{{ $key }}" value="{{ $key }}">
                                                            <label class="form-check-label" for="standing_{{ $key }}">
                                                                {{ $standing }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите стаж педагогической деятельности
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <div class="mb-1 fw-bold">Ведомственные награды и звания</div>
                                                    @foreach(\App\Services\ForumServices::$forum_awards as $key => $award)
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="awards[]" @if(!is_null(old('awards', json_decode($user->awards, true))) && in_array($key, old('awards', json_decode($user->awards, true)))) checked @endif type="checkbox" value="{{ $key }}" id="awards_{{ $key }}">
                                                            <label class="form-check-label" for="awards_{{ $key }}">
                                                                {{ $award }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-1 fw-bold">Наименование организации, которую вы представляете (полностью) *</div>
                                                    <textarea required name="org_name" rows="5" class="form-control" placeholder="Например, Муниципальное бюджетное образовательное учреждение «Звонаревокутская средняя общеобразовательная школа»">{{ old('org_name', $user->org_name) }}</textarea>
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите наименование организации
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-1 fw-bold">Юридический адрес организации *</div>
                                                    <textarea required name="address" class="form-control" placeholder="Например, 646882, Омская область, Азовский район,с. Звонарев Кут, ул. Школьная 44А">{{ old('address', $user->address) }}</textarea>
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите юридический адрес организации
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-6 mb-3">
                                                <div class="mb-3">
                                                    <div class="mb-1 fw-bold">Укажите субъект РФ *</div>
                                                    <select required name="region" class="form-select">
                                                        <option value="">Выберите субъект РФ</option>
                                                        @foreach(\App\Services\ForumServices::getRegions() as $key => $region)
                                                            <option @if(old('region', $user->region) == $region['region']) selected @endif value="{{ $region['region'] }}">{{ $region['region'] }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите субъект РФ
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-1 fw-bold">Тип населённого пункта *</div>
                                                    <div class="form-check">
                                                        <input required @if(old('location', $user->location) == 'c') checked @endif value="c" class="form-check-input" type="radio" name="location" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Город
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input @if(old('location', $user->location) == 'v') checked @endif required value="v" class="form-check-input" type="radio" name="location" id="flexRadioDefault2">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Село
                                                        </label>
                                                        <div class="valid-feedback">
                                                            Верно!
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Укажите тип населённого пункта
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-6 mb-3">
                                                <div class="mb-3">
                                                    <div class="mb-1 fw-bold">Форма участия *</div>
                                                    @foreach(\App\Services\ForumServices::$forum_forms as $key => $form)
                                                        <div class="form-check">
                                                            <input @if(old('form', $user->form) == $key) checked @endif required value="{{ $key }}" class="form-check-input" type="radio" name="form" id="form_{{ $key }}">
                                                            <label class="form-check-label" for="form_{{ $key }}">
                                                                {{ $form }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите форму участия
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <small class="text-secondary">* - Поля, обязательные для заполнения</small>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0" type="submit"><i class="fa-solid fa-pen-to-square"></i> Редактировать</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('includes.profile_footer')
