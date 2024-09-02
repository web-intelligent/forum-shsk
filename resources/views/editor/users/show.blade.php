@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')
    <div class="main-panel">
        @include('includes.profile_main_header')
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">{{ $user_get->name }}</h4>
                </div>
                <div class="mb-3">
                    <a href="{{ route('users.index') }}"><i class="fa-solid fa-arrow-left"></i> Назад</a>
                </div>
                <div class="page-category">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Основные данные</div>

                                    @if($user_get->form == 2)
                                        <p class="card-category mb-3 mt-3 text-info">
                                            Участник Всероссийского конкурса профессионального мастерства среди педагогических работников, осуществляющих обучение детей по дополнительным общеобразовательным программам в области физической культуры и спорта
                                        </p>
                                    @endif
                                    <p class="card-category mb-3 mt-3">ФИО: {{ $user_get->name }}</p>
                                    <p class="card-category mb-3">Email: {{ $user_get->email }}</p>
                                    <p class="card-category mb-3">Телефон: {{ $user_get->phone }}</p>
                                    <p class="card-category mb-3">Дата рождения: {{ date('d.m.Y', strtotime($user_get->birth_day)) }} - Возраст: {{ \App\Services\ForumServices::showAge($user_get->birth_day) }}</p>
                                    <p class="card-category mb-3">Имя пользователя в Телеграм: {{ (!is_null($user_get->telegram)) ? $user_get->telegram : 'Не указано' }}</p>
                                    <p class="card-category mb-3">Категорию: {{ \App\Services\ForumServices::$forum_categories[$user_get->category] }}</p>
                                    <p class="card-category mb-3">Должность: {{ $user_get->seat }}</p>
                                    <p class="card-category mb-3">Стаж работы: {{ \App\Services\ForumServices::$forum_standing[$user_get->standing] }}</p>
                                    <?php
                                    $str = 'Не указано';
                                    if($user_get->rank != 'null' && $user_get->rank != '') {
                                        $str = '';
                                        $ranks = json_decode($user_get->rank, true);
                                        foreach ($ranks as $rank) {
                                            $str .= \App\Services\ForumServices::$forum_rank[$rank] . ', ';
                                        }

                                        $str = substr($str, 0, -2);
                                    }
                                    ?>
                                    <p class="card-category mb-3">Спортивные звания: {{ $str }}</p>

                                    <?php
                                    $str = 'Не указано';
                                    if($user_get->awards != 'null' && $user_get->awards != '') {

                                        $awards = json_decode($user_get->awards, true);
                                        foreach ($awards as $award) {
                                            $str .= \App\Services\ForumServices::$forum_awards[$award] . ', ';
                                        }

                                        $str = substr($str, 0, -2);
                                    }
                                    ?>
                                    <p class="card-category mb-3">Ведомственные награды и звания: {{ $str }}</p>

                                    <p class="card-category mb-3">Наименование организации: {{ $user_get->org_name }}</p>
                                    <p class="card-category mb-3">Адрес организации: {{ $user_get->address }}</p>
                                    <p class="card-category mb-3">Субъект РФ: {{ $user_get->region }}</p>
                                    <p class="card-category mb-3">Форма участия: {{ \App\Services\ForumServices::$forum_forms[$user_get->form] }}</p>
                                    <p class="card-category mb-3">Тип населённого пункта: {{ ($user_get->location == 'c') ? 'Город' : 'Село' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 mb-3">
                            <div class="card card-stats card-round p-3">
                                <h4 class="card-title mb-3">Фото участника</h4>
                                @if(!is_null($user_get->avatar))
                                    <img class="mt-3 rounded-2" src="{{ asset('public/storage/' . $user_get->avatar) }}" alt="{{ $user_get->name }}">
                                @else
                                    <img class="mt-3 rounded-2" src="{{ asset('public/img/user-no-photo.png') }}" alt="{{ $user_get->name }}">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 mb-3">
                            @if($user_get->form == 3 || $user_get->form == 4)
                                <div class="card card-stats card-round p-3">
                                    <h4 class="card-title mb-3">Материал для выступления</h4>
                                   <div class="mt-4">
                                       @if(!is_null($performance_material))
                                           <a href="{{ asset('public/storage/' . $performance_material->material_docs) }}" class="btn btn-secondary">{{ str_replace('performance-materials/' . $user_get->id . '/', '', $performance_material->material_docs) }}</a>
                                       @else
                                            <div class="text-muted">Материалы для выступления не прикреплены</div>
                                       @endif
                                   </div>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('includes.profile_footer')
