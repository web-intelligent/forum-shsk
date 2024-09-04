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
                <div>
                    <a href="{{ route('test.index') }}"><i class="fa-solid fa-arrow-left-long"></i> Назад</a>
                </div>
                <div class="page-category">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4 offset-sm-0 offset-lg-4">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="mb-4 text-center">Создать новый тест</h4>
                                    <form action="{{ route('test.store') }}" method="POST" class="mt-3 needs-validation" novalidate>
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
                                        <div class="form-group">
                                            <label for="name">Наименование теста *</label>
                                            <input name="name" value="{{ old('name') }}" required type="text" class="form-control" id="name" placeholder="Например, тестирование для конкурса">
                                            <div class="invalid-feedback">
                                                Укажите наименование теста
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Описание</label>
                                            <textarea class="form-control" id="description" name="description" placeholder="Например, тестирование для конкурса">{{ old('description') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="open_date">Дата открытия</label>
                                            <input type="date" value="{{ old('open_date') }}" min="{{ date('Y-m-d') }}" class="form-control" id="open_date" name="open_date">
                                        </div>
                                        <div class="form-group">
                                            <label for="timeout">Время тестирования, мин.</label>
                                            <input value="{{ old('timeout') }}" placeholder="Укажите, время в минутах" type="number" min="0" class="form-control" id="timeout" name="timeout">
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
