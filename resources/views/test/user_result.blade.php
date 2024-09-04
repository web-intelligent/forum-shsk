@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel position-relative">
        @include('includes.profile_main_header')

        <div class="container ">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Результат теста</h4>
                </div>
                <div class="page-category">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="mb-4 text-center">{{ $test->name }}</h4>
                                    <p class="text-muted">{{ $test->description }}</p>
                                    <div class="btn btn-secondary my-3">Результат тестирования (баллов): {{ $points }}</div>
                                    <div><small class="text-secondary">Внимание! Если Вы проходили тестирование открытого типа, результаты будут известны после проверки членами жюри</small></div>

                                    @foreach($main_arr as $question => $data)
                                        <h4 class="mb-3">{{ $question }}</h4>
                                        @foreach($data as $type => $datum)
                                            @if($type == 'wrong')
                                                @foreach($datum as $value)
                                                    <div class="text-danger mb-3 mx-3">- {{ $value }} <i class="fa-solid fa-xmark"></i></div>
                                                @endforeach
                                            @else
                                                @foreach($datum as $value)
                                                    <div class="text-success mb-3 mx-3">- {{ $value }} <i class="fa-solid fa-check"></i></div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('includes.profile_footer')
