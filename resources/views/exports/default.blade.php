<table id="test_table" class="table table-striped table-hover" style="font-size: 10px">
    <thead>
    <tr role="row">
        <th style="font-size: 12px" data-sortas="numeric" class="sorting">#</th>
        <th>Фото</th>
        <th style="font-size: 12px" class="">ФИО</th>
        <th style="font-size: 12px" class="sorting">Email</th>
        <th style="font-size: 12px" class="sorting">Участник</th>
        <th style="font-size: 12px" class="sorting">Дата рождения</th>
        <th style="font-size: 12px" class="sorting">Телефон</th>
        <th style="font-size: 12px" class="sorting">Форма участия</th>
        <th style="font-size: 12px" class="sorting">Категория</th>
        <th style="font-size: 12px" class="sorting">Должность</th>
        <th style="font-size: 12px" class="sorting">Субъект Рф</th>
        <th style="font-size: 12px" class="sorting">Стаж</th>
        <th style="font-size: 12px" class="sorting">Спортивное звание</th>
        <th style="font-size: 12px" class="sorting">Ведомственные награды и звания</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $user_get)
        <tr role="row" class="odd">
            <td style="font-size: 12px">{{ $key + 1 }}</td>
            <td style="font-size: 12px">
                @if(!is_null($user_get->avatar))
                    {{ 'public/storage/' . $user_get->avatar }}
                @endif
            </td>
            <td style="font-size: 12px">{{ $user_get->name }} </td>
            <td style="font-size: 12px">{{ $user_get->email }}@if(is_null($user_get->email_verified_at))<div class="text-secondary">Email не подтвержден</div>@endif</td>
            <td style="font-size: 12px"> @if($user_get->form == 2) <span class="fw-bold text-secondary">Да</span> @else <span class="text-muted">Нет</span>  @endif</td>
            <td style="font-size: 12px">{{ date('d.m.Y', strtotime($user_get->birth_day)) }} - {{ \App\Services\ForumServices::showAge($user_get->birth_day) }} лет</td>
            <td style="font-size: 12px">{{ $user_get->phone }}</td>
            <td style="font-size: 12px">{{ \App\Services\ForumServices::$forum_forms[$user_get->form] }}</td>
            <td style="font-size: 12px">{{ \App\Services\ForumServices::$forum_categories[$user_get->category] }}</td>
            <td style="font-size: 12px">{{ $user_get->seat }}</td>
            <td style="font-size: 12px">{{ $user_get->region }}</td>
            <td style="font-size: 12px">{{ \App\Services\ForumServices::$forum_standing[$user_get->standing] }}</td>
            <td style="font-size: 12px"><?php
                $d = json_decode($user_get->rank, true);
                if(!empty($d)) {
                    foreach ($d as $t) {
                        echo \App\Services\ForumServices::$forum_rank[$t] . ', ';
                    }
                } else {
                    echo 'Не указано';
                }
            ?></td>
            <td style="font-size: 12px"><?php
            $d = json_decode($user_get->awards, true);
            if(!empty($d)) {
                foreach ($d as $t) {
                    echo \App\Services\ForumServices::$forum_awards[$t] . ', ';
                }
            } else {
                echo 'Не указано';
            }
            ?></td>

        </tr>
    @endforeach
    </tbody>
</table>
