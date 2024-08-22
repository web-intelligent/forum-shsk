@include('includes.header')

<!-- Team Start -->
<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Авторизация</h4>
            <h1 class="display-4 mb-4">Авторизуйтесь, чтобы перейти в личный кабинет</h1>
        </div>
        <div class="mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <form class="needs-validation" action="{{ route('auth.user.submit') }}" method="POST" novalidate>
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
                    <div class="col-sm-12 col-lg-6">
                        <div class="mb-3">
                            <div class="mb-1">Логин (адрес электронной почты) *</div>
                            <input type="email" name="email" class="form-control" required placeholder="contact@mail.ru">
                            <div class="valid-feedback">
                                Логин указан
                            </div>
                            <div class="invalid-feedback">
                                Укажите логин
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="mb-3">
                            <div class="mb-1">Пароль *</div>
                            <input type="password" name="password" class="form-control" required placeholder="**** Ваш пароль">
                            <div class="valid-feedback">
                                Пароль указан
                            </div>
                            <div class="invalid-feedback">
                                Укажите пароль
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input name="remember" class="form-check-input" type="checkbox" value="1" id="2">
                    <label class="form-check-label" for="2">
                        Запомнить меня
                    </label>
                </div>
                <div class="mb-3">
                    <a href="{{ route('password-forgot') }}">Забыли пароль?</a>
                </div>
                <div class="mb-3">
                    <small class="text-secondary">* - Поля, обязательные для заполнения</small>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0" type="submit"><i class="fa-solid fa-right-to-bracket"></i> Авторизоваться</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Team End -->

@include('includes.footer')
