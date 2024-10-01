@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel position-relative">
        @include('includes.profile_main_header')

        <div class="container ">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">@if(!empty($t)) Результат тестирования @else Выполнение теста @endif</h4>
                </div>
                <div class="page-category">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="mb-4 text-center">{{ $test->name }}</h4>
                                    <p class="text-muted">{{ $test->description }}</p>
                                    @if(!empty($t) && $t->id == 1)
                                        <div class="btn btn-secondary my-3">Результат тестирования (баллов): {{ $points }}</div>
                                    @else
                                        <div><small class="text-secondary">Внимание! Если Вы проходили тестирование открытого типа, результаты будут известны после проверки членами жюри</small></div>
                                    @endif
                                    @if(empty($t))
                                    <div style="position: fixed; z-index: 5; top: 143px; right: 30px;" class="bg-white shadow-lg rounded-2 p-3">
                                        <div id="countdown" class="fw-bold fs-1" data-value="{{ $test->timeout }}"><span id="timerText">{{ $test->timeout }}:00</span> мин.</div>
                                        <small class="text-muted">Время на выполнение теста</small>
                                    </div>
                                    <div class="btn-group" style="position: absolute; top: -52px; right: 3px;">
                                        <a class="btn btn-primary start_test" href=""><i class="fa-solid fa-clock"></i> Начать тестирование</a>
                                    </div>
                                    @endif
                                    <form action="{{ route('test.send') }}" method="POST" class="position-relative test_form needs-validation" novalidate>
                                        <input type="hidden" name="test_id" value="{{ $test->id }}">
                                        @if(empty($t))
                                        <div class="test-overlay" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background: #fff;">
                                            <div class="fs-1 text-center">Тестирование начнётся после нажатия кнопки "Начать тестирование"</div>
                                        </div>

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
                                        @endif()
                                        <?php
                                            if(!empty($t)) {
                                                $test_data = json_decode($t->test_data, true);
                                            }
                                        ?>
                                        @php($num = 1)
                                        @foreach($arr as $question => $answers)
                                            <div class="fw-bold mb-3 text-muted">№{{ $num }}. {{ $question }} *</div>
                                            @foreach($answers as $type => $answer)
                                                @if($type == 1)
                                                    @foreach($answer as $a => $attr)
                                                        <?php
                                                            $right = \Illuminate\Support\Facades\DB::table('answers')
                                                                ->where('id', '=', $attr['answer_id'])
                                                                ->first('right');

                                                        ?>
                                                        <div class="form-check">
                                                            <input @if(!empty($t)) disabled
                                                                        @if($test_data[$attr['question_id']] == $attr['answer_id'] ) checked @endif
                                                                   @endif required value="{{ $attr['answer_id'] }}" class="form-check-input" type="radio" name="{{ $attr['question_id'] }}" id="{{ $attr['question_id'] }}_{{ $attr['answer_id'] }}">
                                                            <label class="form-check-label text-wrap <?php
                                                            if(!empty($t) && $right->right == 1) echo 'text-success';
                                                            ?>" for="{{ $attr['question_id'] }}_{{ $attr['answer_id'] }}">
                                                                {{ $a }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                @elseif($type == 3)
                                                    <div class="mb-3">
                                                        <textarea @if(!empty($t)) disabled @endif() required class="form-control" name="{{ $answer['question_id'] }}" placeholder="Запишите ответ сюда">@if(!empty($test_data)) {{ $test_data[$answer['question_id']] }} @endif</textarea>
                                                        @foreach($second_test_result as $res)
                                                            @if($res->question_id == $answer['question_id'])
                                                                <div class="my-3 fw-bold">Результат оценивания: {{ $res->points }} баллов</div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endforeach
                                            @php($num++)
                                            <div class="valid-feedback">
                                                <i class="fa-solid fa-check"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Выберите один вариант ответа
                                            </div>
                                        @endforeach
                                        @if(empty($t))
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Закончить тестирование</button>
                                        </div>
                                        @endif()
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('includes.profile_footer')
