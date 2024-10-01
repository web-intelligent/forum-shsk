@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel position-relative">
        @include('includes.profile_main_header')

        <div class="container ">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Результаты тестирования</h4>
                </div>
                <div class="page-category">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    @if(count($main_arr))
                                        <div class="d-flex align-items-center justify-content-between my-5">
                                            <div class="fw-bold">Всего: {{ count($main_arr) }} участников</div>
                                            <div><a class="btn btn-sm btn-secondary" href="{{ route('test.result.export') }}">Посмотреть итог</a></div>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th style="text-align: center; vertical-align: middle">Наименование теста</th>
                                                <th style="text-align: center; vertical-align: middle">Результат</th>
                                                <th style="text-align: center; vertical-align: middle">Действия</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($main_arr as $user_id => $data)
                                                    @foreach($data as $key => $value)
                                                        @if($key == 'user_name')
                                                            <tr>
                                                                <td class="fw-bold" colspan="3">{{ $value }}</td>
                                                            </tr>
                                                        @endif
                                                        @if($key == 'Тестирование для участников конкурса №1')
                                                            <tr>
                                                                <td class="" colspan="">{{ $key }}</td>
                                                                <td class="" colspan="2">{{ $value }} баллов</td>
                                                            </tr>
                                                        @endif
                                                        @if($key == 'Тестирование для участников конкурса №2')
                                                            <tr>
                                                                <td rowspan="3">{{ $key }}</td>
                                                            </tr>
                                                            @foreach($value as $q_id => $arr)
                                                                @foreach($arr as $question => $answer)
                                                                    <tr>
                                                                        <td>
                                                                            <small class="text-secondary">{{ $question }}</small>
                                                                            <div>{{ $answer }}</div>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                                $points = \Illuminate\Support\Facades\DB::table('test_result')
                                                                                    ->where('user_id', '=', $user_id)
                                                                                    ->where('question_id', '=', $q_id)
                                                                                    ->first('points');
                                                                            ?>
                                                                            <form action="{{ route('test.note.result') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                                                                                <input type="hidden" name="question_id" value="{{ $q_id }}">
                                                                                <div class="mb-3">
                                                                                    <input @if(!is_null($points)) value="{{ $points->points }}" @endif name="points" placeholder="Кол-во баллов" type="number" min="0" max="15" class="form-control form-control-sm">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <button class="btn btn-sm btn-primary" type="submit">Оценить</button>
                                                                                </div>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endforeach

                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
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
