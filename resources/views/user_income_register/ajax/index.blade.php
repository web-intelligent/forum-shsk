<div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
    <div class="row">
        <div class="col-sm-12">
            <table id="test_table" class="table table-striped table-hover" style="font-size: 10px">
                <thead>
                <tr role="row">
                    <th style="font-size: 12px" data-sortas="numeric" class="sorting">#</th>
                    <th>Фото</th>
                    <th style="font-size: 12px" class="">ФИО</th>
                    <th style="font-size: 12px" class="sorting">Участник <i data-bs-toggle="tooltip" data-bs-placement="top" title="Участник конкурса Профмастерства" class="fa-solid fa-circle-question"></i></th>
                    <th style="font-size: 12px" class="sorting">Телефон</th>
                    <th style="font-size: 12px" class="sorting">Форма участия</th>
                    <th style="font-size: 12px" class="sorting">Субъект Рф</th>
                    <th style="font-size: 12px" class="sorting">Действия</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th style="font-size: 12px">#</th>
                    <th>Фото</th>
                    <th style="font-size: 12px">ФИО</th>
                    <th style="font-size: 12px">Участник <i data-bs-toggle="tooltip" data-bs-placement="top" title="Участник конкурса Профмастерства" class="fa-solid fa-circle-question"></i></th>
                    <th style="font-size: 12px">Телефон</th>
                    <th style="font-size: 12px">Форма участия</th>
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
                        <td style="font-size: 12px"> @if($user_get->form == 2) <span class="fw-bold text-secondary">Да</span> @else <span class="text-muted">Нет</span>  @endif</td>
                        <td style="font-size: 12px">{{ $user_get->phone }}</td>
                        <td style="font-size: 12px">{{ \App\Services\ForumServices::$forum_forms[$user_get->form] }}</td>
                        <td style="font-size: 12px">{{ $user_get->region }}</td>
                        <td style="font-size: 12px">
                            <div class="btn-group">
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Подробно" href="{{ route('users.show', ['user_id' => $user_get->id]) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px"><i class="fa-solid fa-info"></i></a>
                                @if($user_get->income == 1)
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Отменить подтверждение приезда" href="{{ route('user.income.register.income', ['user_id' => $user_get->id]) }}" class="btn btn-outline-success btn-sm" style="font-size: 10px"><i class="fa-solid fa-check-circle"></i></a>
                                @else
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Подтверждение приезда" href="{{ route('user.income.register.income', ['user_id' => $user_get->id]) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px"><i class="fa-solid fa-car"></i></a>
                                @endif

                                @if($user_get->docs == 1)
                                    <a data-user-id="{{ $user_get->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Отмена выдачи комплекта документов" href="#" class="btn btn-outline-success btn-sm " style="font-size: 10px"><i class="fa-solid fa-check-circle"></i></a>
                                @else
                                    <a data-user-id="{{ $user_get->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Выдача комплекта документов" href="#" class="btn btn-outline-primary btn-sm docs_confirm" style="font-size: 10px"><i class="fa-solid fa-file"></i></a>
                                @endif


                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
