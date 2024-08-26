@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel">
        @include('includes.profile_main_header')

        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">{{ $meta['title'] }}</h4>
                </div>
                <div class="mb-3">
                    <a href="{{ route('program.index') }}"><i class="fa-solid fa-arrow-left"></i> Назад</a>
                </div>
                <div class="page-category">


                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 offset-sm-0 offset-md-3 offset-lg-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="mb-4 text-center">Добавление элемента программы</h4>
                                    <form class="needs-validation" action="{{ route('program.store') }}" method="POST" novalidate>
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
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6 mb-3">
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Наименование мероприятия *</div>
                                                    <input required type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Название мероприятия">
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите название мероприятия
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Дата проведения *</div>
                                                    <input required type="date" class="form-control" name="date" min="2024-09-19" max="2024-09-22" value="{{ old('date') }}">
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите дату рождения
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Время начала проведения *</div>
                                                    <input required type="time" class="form-control" name="start_time" value="{{ old('start_time') }}">
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите время начала проведения
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Время окончания проведения</div>
                                                    <input type="time" class="form-control" name="end_time" value="{{ old('end_time') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-6 mb-3">
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Адрес проведения (местоположение) *</div>
                                                    <textarea rows="5" required class="form-control" name="address" placeholder="Республика Крым, г. Алушта">{{ old('address') }}</textarea>
                                                    <div class="valid-feedback">
                                                        Верно!
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Укажите адрес проведения
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Описание</div>
                                                    <textarea rows="5" class="form-control" name="description" placeholder="ФГБУ «ФЦОМОФВ»">{{ old('description') }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Отметьте, если .... (элемент в разработке)
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <small class="text-secondary">* - Поля, обязательные для заполнения</small>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0" type="submit"><i class="fa-solid fa-plus"></i> Добавить</button>
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
