@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel position-relative">
        @include('includes.profile_main_header')

        <div class="container ">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Тестирование</h4>
                </div>
                <div class="page-category">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="mb-4 text-center">Список тестов</h4>
                                    <div class="btn-group" style="position: absolute; top: -52px; right: 3px;">
{{--                                        <a target="_blank" class="btn btn-sm btn-label-primary" href="{{ route('show.program') }}"><i class="fa-solid fa-book-open-reader"></i> Посмотреть на сайте</a>--}}
                                        @if($user->is_admin == 1 || $user->is_admin == 2)
                                            <a class="btn btn-sm btn-label-primary" href="{{ route('test.create') }}"><i class="fa-solid fa-square-plus"></i> Создать новый тест</a>
                                        @endif
                                    </div>
                                    @if(count($tests))
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th style="text-align: center; vertical-align: middle">#</th>
                                                    <th style="text-align: center; vertical-align: middle">Наименование</th>
                                                    <th style="text-align: center; vertical-align: middle">Описание</th>
                                                    <th style="text-align: center; vertical-align: middle">Дата открытия</th>
                                                    <th style="text-align: center; vertical-align: middle">Продолжительность, мин</th>
                                                    <th style="text-align: center; vertical-align: middle">@if($user->form != 2) Статус @else Результат @endif</th>
                                                    <th style="text-align: center; vertical-align: middle">Действия</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($tests as $key => $test)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        @if(\Illuminate\Support\Facades\Auth::id() == 2234 || \Illuminate\Support\Facades\Auth::id() == 102020)
                                                            <td><a href="@if($user->form != 2) {{ route('test.show', ['test' => $test]) }} @else {{ route('test.show.for.user', ['test_id' => $test->id]) }} @endif" >{{ $test->name }}</a></td>
                                                        @else
                                                            <td>{{ $test->name }}</td>
                                                        @endif
                                                        <td>@if(!is_null($test->description)) {{ $test->description }} @else Нет описания @endif</td>
                                                        <td>@if(!is_null($test->open_date)) {{ date('d.m.Y', strtotime($test->open_date)) }} @else Дата не указана @endif</td>
                                                        <td>@if(!is_null($test->timeout)) {{ $test->timeout }} @else Время не указано @endif</td>
                                                        <td>
                                                            @php($status = '<span class="text-primary">Тест не пройден</span>')
                                                            @if($user->form == 2)
                                                                <?php
                                                                $status_test = \Illuminate\Support\Facades\DB::table('test_user_answers')->where([
                                                                    ['test_id', '=', $test->id],
                                                                    ['user_id', '=', \Illuminate\Support\Facades\Auth::id()],
                                                                ])->first('id');
                                                                if(!empty($status_test)) {
                                                                    $status = '<span class="text-success">Тест пройден</span>';
                                                                }
                                                                echo $status;
                                                                ?>
                                                            @else
                                                                @if($test->publish == 0)
                                                                    <span class="text-warning">Не опубликован</span>
                                                                @else
                                                                    <span class="text-success">Опубликован</span>
                                                                @endif
                                                            @endif

                                                        </td>
                                                        <td style="text-align: center; vertical-align: middle">
                                                            @if($user->form != 2)
                                                                <div class="btn-group">
                                                                    @if($test->publish == 0)
                                                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Опубликовать" href="{{ route('test.publish', ['test_id' => $test->id]) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px"><i class="fa-solid fa-upload"></i></a>
                                                                    @else
                                                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Снять с публикации" href="{{ route('test.unpublish', ['test_id' => $test->id]) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px"><i class="fa-solid fa-eraser"></i></a>
                                                                    @endif
                                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Просмотр теста" href="{{ route('test.show', ['test' => $test]) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px"><i class="fa-solid fa-eye"></i></a>
                                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Вопросы" href="{{ route('question.index', ['test_id' => $test->id]) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px"><i class="fa-solid fa-file-circle-question"></i></a>
                                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Редактировать" href="{{ route('test.edit', ['test' => $test]) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Удалить" class="btn btn-outline-primary btn-sm" href="{{ route('my.test.destroy', ['test_id' => $test->id]) }}"><i class="fa-solid fa-trash"></i></a>
                                                                </div>
                                                            @else
                                                                @if(date('Y-m-d') == '2024-09-25' || date('Y-m-d') == '2024-09-26')
                                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="<?php
                                                                    if(empty($status_test)) {
                                                                        echo 'Пройти тестирование';
                                                                    } else {
                                                                        echo 'Посмотреть результат';
                                                                    }
                                                                    ?>" href="{{ route('test.show.for.user', ['test_id' => $test->id]) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px"><i class="fa-solid fa-graduation-cap"></i></a>
                                                                @else
                                                                    Доступ откроется c 25 сентября
                                                                @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="text-muted text-center">Тестов не добавлено</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('includes.profile_footer')
