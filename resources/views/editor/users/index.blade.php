@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')
    <div class="main-panel">
        @include('includes.profile_main_header')
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Пользователи</h4>
                </div>

                <div class="row my-3">
                    <div class="btn-group d-block">
                        <a class="btn btn-sm btn-success" href="{{ route('default.export') }}"><i class="fa-solid fa-file-excel"></i> Сохранить в Excel</a>
                        <a href="{{ route('generate.certificates') }}" class="btn btn-sm btn-danger">Выдать сертификаты</a>
                    </div>
                </div>

                <div class="page-category">
                    <div class="row">
                        <div class="col-6 col-sm-4 col-lg-2 mb-3">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <div class="h1 m-0">{{ count($users) }}</div>
                                    <div class="text-muted mb-3">Всего пользователей</div>
                                </div>
                            </div>
                        </div>
                        @foreach($statistic['forms'] as $form => $amount)
                            <div class="col-6 col-sm-4 col-lg-2 mb-3">
                                <div class="card">
                                    <div class="card-body p-3 text-center">
                                        <div class="h1 m-0">{{ $amount }}</div>
                                        <div class="text-muted mb-3">{{ $form }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="mb-4 text-center">Зарегистрированные участники форума</h4>
                                    <div class="table-responsive">
                                        <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="test_table" class="table table-striped table-hover" style="font-size: 10px">
                                                        <thead>
                                                            <tr role="row">
                                                                <th style="font-size: 12px" data-sortas="numeric" class="sorting">#</th>
                                                                <th>Фото</th>
                                                                <th style="font-size: 12px" class="">ФИО</th>
                                                                <th style="font-size: 12px" class="sorting">Email</th>
                                                                <th style="font-size: 12px" class="sorting">Участник <i data-bs-toggle="tooltip" data-bs-placement="top" title="Участник конкурса Профмастерства" class="fa-solid fa-circle-question"></i></th>
                                                                <th style="font-size: 12px" class="sorting">Дата рождения</th>
                                                                <th style="font-size: 12px" class="sorting">Телефон</th>
                                                                <th style="font-size: 12px" class="sorting">Форма участия</th>
                                                                <th style="font-size: 12px" class="sorting">Категория</th>
                                                                <th style="font-size: 12px" class="sorting">Должность</th>
                                                                <th style="font-size: 12px" class="sorting">Субъект Рф</th>
                                                                <th style="font-size: 12px" class="sorting">Действия</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th style="font-size: 12px">#</th>
                                                                <th>Фото</th>
                                                                <th style="font-size: 12px">ФИО</th>
                                                                <th style="font-size: 12px">Email</th>
                                                                <th style="font-size: 12px">Участник <i data-bs-toggle="tooltip" data-bs-placement="top" title="Участник конкурса Профмастерства" class="fa-solid fa-circle-question"></i></th>
                                                                <th style="font-size: 12px">Дата рождения</th>
                                                                <th style="font-size: 12px">Телефон</th>
                                                                <th style="font-size: 12px">Форма участия</th>
                                                                <th style="font-size: 12px">Категория</th>
                                                                <th style="font-size: 12px">Должность</th>
                                                                <th style="font-size: 12px">Субъект Рф</th>
                                                                <th style="font-size: 12px">Действия</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                            @foreach($users as $key => $user_get)
                                                                <tr role="row" class="odd">
                                                                    <td style="font-size: 12px">{{ $key + 1 }}</td>
                                                                    <td style="font-size: 12px">
                                                                        @if(!is_null($user_get->avatar))
                                                                            <a class="image-link" href="{{ 'public/storage/' . $user_get->avatar }}"><img style="width: 50px; height: 50px; object-fit: cover" class="rounded-2" src="{{ asset('public/storage/' . $user_get->avatar) }}" alt=""></a>
                                                                        @else
                                                                            <img style="width: 50px; height: 50px; object-fit: cover" class="rounded-2" src="{{ asset('public/img/user-no-photo.png') }}" alt="">
                                                                        @endif
                                                                    </td>
                                                                    <td style="font-size: 12px"><a href="{{ route('users.show', ['user_id' => $user_get->id]) }}">{{ $user_get->name }}</a> </td>
                                                                    <td style="font-size: 12px">{{ $user_get->email }}@if(is_null($user_get->email_verified_at))<div class="text-secondary">Email не подтвержден</div>@endif</td>
                                                                    <td style="font-size: 12px"> @if($user_get->form == 2) <span class="fw-bold text-secondary">Да</span> @else <span class="text-muted">Нет</span>  @endif</td>
                                                                    <td style="font-size: 12px">{{ date('d.m.Y', strtotime($user_get->birth_day)) }} - {{ \App\Services\ForumServices::showAge($user_get->birth_day) }} лет</td>
                                                                    <td style="font-size: 12px">{{ $user_get->phone }}</td>
                                                                    <td style="font-size: 12px">{{ \App\Services\ForumServices::$forum_forms[$user_get->form] }}</td>
                                                                    <td style="font-size: 12px">{{ \App\Services\ForumServices::$forum_categories[$user_get->category] }}</td>
                                                                    <td style="font-size: 12px">{{ $user_get->seat }}</td>
                                                                    <td style="font-size: 12px">{{ $user_get->region }}</td>
                                                                    <td style="font-size: 12px">
                                                                        <div class="btn-group">
                                                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Подробно" href="{{ route('users.show', ['user_id' => $user_get->id]) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px"><i class="fa-solid fa-info"></i></a>
                                                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Редактировать" href="{{ route('users.edit', ['user_id' => $user_get->id]) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                            @if($user->is_admin == 1)
                                                                                <a class="btn btn-outline-primary btn-sm delete_user" href="{{ route('users.destroy', ['user_id' => $user_get->id]) }}"><i class="fa-solid fa-trash"></i></a>
                                                                            @endif
                                                                        </div>

                                                                        @if($user->is_admin == 1 && is_null($user_get->email_verified_at))
                                                                            <form class="m-3" action="{{ route('verification.send.admin') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" value="{{ $user_get->id }}" name="user_id">
                                                                                <div class="mb-3 text-center">
                                                                                    <button onclick="if(!confirm('Вы уверены, что хотите отправить ссылку для подтверждения адреса электронной почты?')) return flase;" data-bs-toggle="tooltip" data-bs-placement="top" title="Отправить ссылку для подтверждения Email" type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-at"></i></button>
                                                                                </div>
                                                                            </form>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('includes.profile_footer')
