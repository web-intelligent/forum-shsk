@include('includes.header')

<!-- Team Start -->
<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Укажите логин и новый пароль</h4>
            <h1 class="display-4 mb-4">Восстановление пароля</h1>
        </div>
        <div class="col-sm-12 col-lg-6 offset-sm-0 offset-lg-3">
            <div class="mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <div class="card mb-3">
                    <div class="card-body">
                        <form class="row g-3 needs-validation" method="POST" action="{{ route('password.reset.request') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->token }}">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Логин (адрес электронной почты)</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" name="email" class="form-control" id="yourUsername" value="{{ old('email', $request->email) }}" placeholder="my-email@domain.ru" required>
                                    <div class="invalid-feedback">Введите адрес электронной почты</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Пароль</label>
                                <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Пароль" required>
                                <div class="invalid-feedback">Введите пароль!</div>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Пароль ещё раз</label>
                                <input type="password" name="password_confirmation" class="form-control" id="yourPassword" placeholder="Пароль ещё раз" required>
                                <div class="invalid-feedback">Введите пароль ещё раз!</div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Сбросить пароль</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">Нет личного кабинета? <a href="{{ route('register.form') }}">Станьте участником форума</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

@include('includes.footer')
