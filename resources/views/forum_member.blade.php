@include('includes.header')

<!-- Team Start -->
<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Участник форума</h4>
            <h1 class="display-4 mb-4">{{ $user->name }}</h1>
        </div>
        <div class="mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <div class="row">
                <div class="col-sm-12 col-lg-5 mb-3">
                    <div class="user_photo" style="position: sticky; top: 97px">
                        @if(!is_null($user->avatar))
                            <img style="width: 100%; object-fit: cover" class="mt-3 rounded-2" src="{{ asset('public/storage/' . $user->avatar) }}" alt="">
                        @else
                            <img style="width: 100%; object-fit: cover" class="mt-3 rounded-2" src="{{ asset('public/img/user-no-photo.png') }}" alt="">
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-lg-7 mb-3">
                    <div class="user_data my-3">
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
                        $str = '';
                        $ranks = json_decode($user->rank, true);
                        foreach ($ranks as $rank) {
                            $str .= \App\Services\ForumServices::$forum_rank[$rank] . ', ';
                        }

                        $str = substr($str, 0, -2)
                        ?>
                        <p class="card-category mb-3">Спортивные звания: {{ $str }}</p>
                        <?php
                        $str = '';
                        $awards = json_decode($user->awards, true);
                        foreach ($awards as $award) {
                            $str .= \App\Services\ForumServices::$forum_awards[$award] . ', ';
                        }

                        $str = substr($str, 0, -2)
                        ?>
                        <p class="card-category mb-3">Ведомственные награды и звания: {{ $str }}</p>
                        <p class="card-category mb-3">Наименование организации: {{ $user->org_name }}</p>
                        <p class="card-category mb-3">Адрес организации: {{ $user->address }}</p>
                        <p class="card-category mb-3">Субъект РФ: {{ $user->region }}</p>
                        <p class="card-category mb-3">Форма участия: {{ \App\Services\ForumServices::$forum_forms[$user->form] }}</p>
                        <p class="card-category mb-3">Тип населённого пункта: {{ ($user->location == 'c') ? 'Город' : 'Село' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

@include('includes.footer')
