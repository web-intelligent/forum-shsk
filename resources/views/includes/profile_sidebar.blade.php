<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a style="color: #fff" href="{{ route('home') }}" class="logo">
                {{ \App\Services\ForumServices::showLogo(150, true) }}
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item">
                    <a href="{{ route('user.profile') }}">
                        <i class="fas fa-user"></i>
                        <p>Личный кабинет</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.program.index') }}">
                        <i class="fa-solid fa-list-check"></i>
                        <p>Программа</p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('poll.form') }}">--}}
{{--                        <i class="fas fa-edit"></i>--}}
{{--                        <p>Опрос</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a href="{{ route('certificates') }}">
                        <i class="fas fa-certificate"></i>
                        <p>Сертификаты</p>
                    </a>
                </li>

                @if($user->form == 2)
                    <li class="nav-item">
                        <a href="{{ route('test.show.for.user.table') }}">
                            <i class="fa-solid fa-quote-left"></i>
                            <p>Тестирование</p>
                        </a>
                    </li>
                @endif

                @if($user->is_admin == 1 || $user->is_admin == 2)
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                          <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Администрирование</h4>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('program.index') }}">
                            <i class="fa-solid fa-file-pen"></i>
                            <p>Программа</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}">
                            <i class="fa-solid fa-users"></i>
                            <p>Пользователи</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('test.index') }}">
                            <i class="fa-solid fa-square-check"></i>
                            <p>Тестирование</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('test.result') }}">
                            <i class="fa-solid fa-square-check"></i>
                            <p>Результаты тестирование</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.income.register.index') }}">
                            <i class="fa-solid fa-user-shield"></i>
                            <p>Регистрация участников<br> форума</p>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
