@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel position-relative">
        @include('includes.profile_main_header')

        <div class="container ">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Добавление вопроса</h4>
                </div>
                <div>
                    <a href="{{ route('question.index', ['test_id' => $test_id]) }}"><i class="fa-solid fa-arrow-left-long"></i> Назад</a>
                </div>
                <div class="page-category">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6 offset-sm-0 offset-lg-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="mb-4 text-center">Новый вопрос к тесту "{{ $test->name }}"</h4>
                                    <form action="{{ route('question.store') }}" method="POST" class="mt-3 needs-validation" novalidate>
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
                                        <input type="hidden" name="test_id" value="{{ $test_id }}">
                                        <div class="form-group">
                                            <label for="name">Новый вопрос *</label>
                                            <input name="question" value="{{ old('question') }}" required type="text" class="form-control" id="name" placeholder="Вопрос теста">
                                            <div class="invalid-feedback">
                                                Укажите вопрос теста
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-2">Укажите тип вопроса *</div>
                                            <div class="form-check">
                                                <input @if(old('type') == 1) checked @endif required class="form-check-input" type="radio" name="type" value="1" id="type_1">
                                                <label class="form-check-label" for="type_1">
                                                    Выбор одного ответа
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input @if(old('type') == 2) checked @endif required class="form-check-input" type="radio" name="type" value="2" id="type_2">
                                                <label class="form-check-label" for="type_2">
                                                    Выбор нескольких ответов
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input @if(old('type') == 3) checked @endif required class="form-check-input" type="radio" name="type" value="3" id="type_3">
                                                <label class="form-check-label" for="type_3">
                                                    Свободная форма ответа
                                                </label>
                                            </div>
                                            <div class="invalid-feedback">
                                                Укажите тип вопроса
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-square-plus"></i> Создать</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('includes.profile_footer')
