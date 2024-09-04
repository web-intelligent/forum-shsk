@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel position-relative">
        @include('includes.profile_main_header')

        <div class="container ">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Просмотр теста</h4>
                </div>
                <div class="page-category">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="mb-4 text-center">{{ $test->name }}</h4>
                                    <p class="text-muted">{{ $test->description }}</p>
                                    <div style="position: fixed; z-index: 5; top: 143px; right: 30px;" class="bg-white shadow-lg rounded-2 p-3">
                                        <div class="fw-bold fs-1 test_time" data-value="{{ $test->timeout }}">{{ $test->timeout }}:00 мин.</div>
                                        <small class="text-muted">Время на выполнение теста</small>
                                    </div>
                                    <div class="btn-group" style="position: absolute; top: -52px; right: 3px;">
                                        <a class="btn btn-sm btn-label-primary" href="{{ route('test.create') }}"><i class="fa-solid fa-square-plus"></i> Создать новый тест</a>
                                    </div>
                                    <form action="">
                                        @php($num = 1)
                                        @foreach($arr as $question => $answers)
                                            <div class="fw-bold mb-3 text-muted">№{{ $num }}. {{ $question }}</div>
                                            @foreach($answers as $type => $answer)
                                                @if($type == 1)
                                                    @foreach($answer as $a => $attr)
                                                        <div class="form-check">
                                                            <input value="1" class="form-check-input" type="radio" name="name_{{ $attr['question_id'] }}" id="id_{{ $attr['question_id'] }}_{{ $attr['answer_id'] }}">
                                                            <label class="form-check-label text-wrap" for="id_{{ $attr['question_id'] }}_{{ $attr['answer_id'] }}">
                                                                {{ $a }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                @elseif($type == 3)
                                                    <div class="mb-3">
                                                        <textarea class="form-control" placeholder="Запишите ответ сюда"></textarea>
                                                    </div>
                                                @endif
                                            @endforeach
                                            @php($num++)
                                        @endforeach

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('includes.profile_footer')
