@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel">
        @include('includes.profile_main_header')
        <div class="container">
            @if ($errors->any())
                <div class="response-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <small style="font-size: 10px" class="text-white">Нажмите, чтобы скрыть</small>
                </div>
            @endif
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Личный кабинет</h4>
                </div>
                <div class="page-category">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Основные данные участника</h4>
                                    @if($user->competition_member == 1)
                                        <p class="card-category mb-3 mt-3 text-info">
                                            Участник Всероссийского конкурса профессионального мастерства среди педагогических работников, осуществляющих обучение детей по дополнительным общеобразовательным программам в области физической культуры и спорта
                                        </p>
                                    @endif
                                    <p class="card-category mb-3 mt-3">ФИО: {{ $user->name }}</p>
                                    <p class="card-category mb-3">Email: {{ $user->email }}</p>
                                    <p class="card-category mb-3">Телефон: {{ $user->phone }}</p>
                                    <p class="card-category mb-3">Дата рождения: {{ date('d.m.Y', strtotime($user->birth_day)) }} - Возраст: {{ \App\Services\ForumServices::showAge($user->birth_day) }}</p>
                                    <p class="card-category mb-3">Имя пользователя в Телеграм: {{ (!is_null($user->telegram)) ? $user->telegram : 'Не указано' }}</p>
                                    <p class="card-category mb-3">Категорию: {{ \App\Services\ForumServices::$forum_categories[$user->category] }}</p>
                                    <p class="card-category mb-3">Должность: {{ $user->seat }}</p>
                                    <p class="card-category mb-3">Стаж работы: {{ \App\Services\ForumServices::$forum_standing[$user->standing] }}</p>
                                    <?php
                                        $str = 'Не указано';
                                        if($user->rank != 'null' && $user->rank != '') {
                                            $str = '';
                                            $ranks = json_decode($user->rank, true);
                                            foreach ($ranks as $rank) {
                                                $str .= \App\Services\ForumServices::$forum_rank[$rank] . ', ';
                                            }

                                            $str = substr($str, 0, -2);
                                        }
                                    ?>
                                    <p class="card-category mb-3">Спортивные звания: {{ $str }}</p>

                                    <?php
                                        $str = 'Не указано';
                                        if($user->awards != 'null' && $user->awards != '') {

                                            $awards = json_decode($user->awards, true);
                                            foreach ($awards as $award) {
                                                $str .= \App\Services\ForumServices::$forum_awards[$award] . ', ';
                                            }

                                            $str = substr($str, 0, -2);
                                        }
                                    ?>
                                    <p class="card-category mb-3">Ведомственные награды и звания: {{ $str }}</p>

                                    <p class="card-category mb-3">Наименование организации: {{ $user->org_name }}</p>
                                    <p class="card-category mb-3">Адрес организации: {{ $user->address }}</p>
                                    <p class="card-category mb-3">Субъект РФ: {{ $user->region }}</p>
                                    <p class="card-category mb-3">Форма участия: {{ \App\Services\ForumServices::$forum_forms[$user->form] }}</p>
                                    <p class="card-category mb-3">Тип населённого пункта: {{ ($user->location == 'c') ? 'Город' : 'Село' }}</p>
                                    <small class="text-secondary">Если Вы обнаружили неточность в своих данных, их можно изменить</small>
                                    <div class="my-3">
                                        <a href="{{ route('change.profile.data.form') }}" class="btn btn-primary">Изменить данные</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card card-stats card-round p-3">
                                <h4 class="card-title mb-3">Ваш QR-код</h4>
                                <div class="mx-auto mt-4 mb-3">
                                    {{ \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->generate(route('scan.user', ['id' => $user->id])) }}
                                </div>
                                <a class="btn btn-sm btn-primary" target="_blank" href="{{ route('print.qrcode', ['user_id' => $user->id]) }}"><i class="fa-solid fa-print"></i> Распечатать QR-код</a>
                            </div>
                            @if($user->form == 3)
                                <div class="card card-stats card-round p-3">
                                    @if(!is_null($performance_material))
                                        <h4 class="card-title mb-3">Материал для выступления</h4>
                                    @else
                                        <h4 class="card-title mb-3">Прикрепите материалы для выступления</h4>
                                    @endif
                                    <form class="needs-validation" novalidate action="{{ route('upload.materials') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="my-3">
                                            <div class="mb-2 fw-bold">
                                                @if(!is_null($performance_material))
                                                    В случае необходимости, можно изменить добавленный файл выступления. Просто загрузите новый файл презентации *
                                                @else
                                                    Презентация *
                                                @endif
                                            </div>
                                            <input required type="file" class="form-control" name="material_docs">
                                            <div class="valid-feedback">
                                                Файлы добавлены
                                            </div>
                                            <div class="invalid-feedback">
                                                Добавьте файл для загрузки
                                            </div>
                                        </div>
                                        <div class="mb-3"><small class="text-secondary">* - Презентация для выступления должна быть в формате PowerPoint</small></div>
                                        <div class="my-3">
                                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paperclip"></i> Прикрепить</button>
                                        </div>
                                    </form>

                                    @if(!is_null($performance_material))
                                        <a href="{{ asset('public/storage/' . $performance_material->material_docs) }}" class="btn btn-secondary">{{ str_replace('performance-materials/' . $user->id . '/', '', $performance_material->material_docs) }}</a>
                                    @endif

                                </div>
                            @endif
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                            <div class="card card-stats card-round p-3">
                                <h4 class="card-title mb-3">Ваша фотография</h4>
                                @if(!is_null($user->avatar))
                                    <img class="mt-3 rounded-2" src="{{ asset('public/storage/' . $user->avatar) }}" alt="">
                                    <div class="my-3">
                                        <small class="text-secondary">В случае необходимости, фотографию можно изменить</small>
                                    </div>
                                    <form action="{{ route('upload.avatar') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label class="cyber_input-file">
                                            <input type="file" name="avatar">
                                            <span class="cyber_input-file-btn my-3"> Выберите файл <i class="fa-solid fa-image-portrait"></i></span>
                                            <span class="cyber_input-file-text"></span>
                                        </label>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-upload"></i> Изменить фото</button>
                                        </div>
                                    </form>
                                @else
                                    <img class="mt-3 rounded-2" src="{{ asset('public/img/user-no-photo.png') }}" alt="">
                                    <form action="{{ route('upload.avatar') }}" method="POST" enctype="multipart/form-data">
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
                                        <label class="cyber_input-file">
                                            <input type="file" name="avatar">
                                            <span class="cyber_input-file-btn my-3"> Выберите файл <i class="fa-solid fa-paperclip"></i></span>
                                            <span class="cyber_input-file-text"></span>
                                        </label>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-upload"></i> Загрузить</button>
                                        </div>
                                    </form>
                                    <small class="text-muted">Обратите, пожалуйста, внимание, что загружаемая фотография должна быть в формате JPG, JPEG или PNG размером не более 2000 пикселей по ширине и высоте. Добавляя фотографию, учитывайте, что её могут использовать в работе данного сайта и во время проведения форума</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('includes.profile_footer')
