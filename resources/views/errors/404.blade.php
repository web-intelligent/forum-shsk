<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Всероссийский форум школьных спортивных клубов - 404</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="404, ошибка 404" name="keywords">
    <meta content="Ошибка 404. По указанному адресу ничего не найдено" name="description">

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(98128615, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/98128615" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/lib/animate/animate.min.css') }}"/>
    <link href="{{ asset('public/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
</head>

<body>

@if(session()->has('success'))
    <div class="response-message alert-dismissible fade show" style="top: 72px; right: 5px; position: fixed; z-index: 100; font-size: 12px; width: 300px; display: block; background: #108066" role="alert" data-tor="show:[rotateX.from(90deg) @--tor-translateZ(-5rem; 0rem) pull.down(full)] slow">
        {{ session('success') }}
        <br>
        <div style="font-size: 8px">Нажмите, чтобы скрыть</div>
    </div>
@endif
@if(session()->has('wrong'))
    <div class="response-message alert-dismissible fade show" style="top: 72px; right: 5px; position: fixed; z-index: 100; font-size: 12px; width: 300px; display: block; background: #ba2541" role="alert" data-tor="show:[rotateX.from(90deg) @--tor-translateZ(-5rem; 0rem) pull.down(full)] slow">
        {{ session('wrong') }}
        <br>
        <div style="font-size: 8px">Нажмите, чтобы скрыть</div>
    </div>
@endif


<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Загрузка...</span>
    </div>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
<div class="container-fluid topbar px-0 px-lg-4 bg-light py-2 d-none d-lg-block">
    <div class="container">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="ministers">
                        <ul>
                            <li><a href="https://edu.gov.ru" target="_blank"><img src="https://еип-фкис.рф/wp-content/global_scripts/new_design/images/1.png" alt=""></a></li>
                            <li><a href="http://minsport.gov.ru" target="_blank"><img src="https://еип-фкис.рф/wp-content/global_scripts/new_design/images/2.png" alt=""></a></li>
                            <li><a href="https://rosstat.gov.ru" target="_blank"><img src="https://еип-фкис.рф/wp-content/global_scripts/new_design/images/3.png" alt=""></a></li>
                            <li><a href="https://www.rospotrebnadzor.ru" target="_blank"><img src="https://еип-фкис.рф/wp-content/global_scripts/new_design/images/4.png" alt=""></a></li>
                            <li><a href="https://minzdrav.gov.ru" target="_blank"><img src="https://еип-фкис.рф/wp-content/global_scripts/new_design/images/5.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="border-end border-primary pe-3">
                        <a href="https://artek.org" target="_blank" class="text-muted small"><i class="fas fa-map-marker-alt text-primary me-2"></i> Детский лагерь отдыха "Артек"</a>
                    </div>
                    <div class="border-end border-primary ps-3 pe-3">
                        <a href="#" class="text-muted small"><i class="fas fa-calendar text-primary me-2"></i> 19-21 сентября </a>
                    </div>
                    <div class="ps-3">
                        <a href="mailto:example@gmail.com" class="text-muted small"><i class="fas fa-envelope text-primary me-2"></i>contact@еип-фкис.рф</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-flex justify-content-end align-items-center">
                    <div class="d-flex">
                        <a class="btn p-0 text-primary me-3" target="_blank" href="https://vk.com/public211630206"><i class="fab fa-vk"></i></a>
                        <a class="btn p-0 text-primary me-3" target="_blank" href="https://t.me/fcomofv"><i class="fab fa-telegram"></i></a>
                    </div>
                    <div><a class="btn p-0 text-primary me-3" target="_blank" href="https://edu.gov.ru/family_year"><img style="width: 60px;" src="{{ asset('public/img/famaly_logo.png') }}" alt=""></a></div>
                    {{--                    <div class="dropdown ms-3">--}}
                    {{--                        <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown"><small><i class="fas fa-globe-europe text-primary me-2"></i> English</small></a>--}}
                    {{--                        <div class="dropdown-menu rounded">--}}
                    {{--                            <a href="#" class="dropdown-item">English</a>--}}
                    {{--                            <a href="#" class="dropdown-item">Bangla</a>--}}
                    {{--                            <a href="#" class="dropdown-item">French</a>--}}
                    {{--                            <a href="#" class="dropdown-item">Spanish</a>--}}
                    {{--                            <a href="#" class="dropdown-item">Arabic</a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{ route('home') }}" class="navbar-brand pb-4">
                {{--                <div class="text-primary mb-0 fw-bold fs-1"><i class="fab fa-slack me-2"></i> ZA ШСК</div>--}}
                {{ \App\Services\ForumServices::showLogo(200) }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link">Главная</a>
                    <a href="{{ route('home') }}" class="nav-item nav-link">Программа</a>
                    <a href="{{ route('home') }}" class="nav-item nav-link">Трансляции</a>
                    @if(!\Illuminate\Support\Facades\Auth::check())
                        <a href="{{ route('login') }}" class="nav-item nav-link">Войти</a>
                    @endif
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">
                            <span class="dropdown-toggle">Форум</span>
                        </a>
                        <div class="dropdown-menu p-4">
                            <a href="https://еип-фкис.рф/forum" target="_blank" class="nav-item nav-link mb-4">Форум 2022</a>
                            <a href="https://forum.еип-фкис.рф" target="_blank" class="nav-item nav-link mb-4">Форум 2023</a>
                        </div>
                    </div>
                    {{--                    <a href="contact.html" class="nav-item nav-link">Contact</a>--}}

                </div>
            </div>
            <div class="nav-btn px-3">
                {{--                        <button class="btn-search btn btn-primary btn-md-square rounded-circle flex-shrink-0" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>--}}
                @if(!\Illuminate\Support\Facades\Auth::check())
                    <a href="{{ route('register.form') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0"><i class="fas fa-user-plus me-2"></i> Принять участие</a>
                @else
                    <a href="{{ route('register.form') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0"><i class="fa-solid fa-user"></i> Личный кабинет</a>
                @endif
            </div>
            {{--            <div class="d-none d-xl-flex flex-shrink-0 ps-4">--}}
            {{--                <a href="#" class="btn btn-light btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">--}}
            {{--                    <i class="fa fa-phone-alt fa-2x"></i>--}}
            {{--                    <div class="position-absolute" style="top: 7px; right: 12px;">--}}
            {{--                        <span><i class="fa fa-comment-dots text-secondary"></i></span>--}}
            {{--                    </div>--}}
            {{--                </a>--}}
            {{--                <div class="d-flex flex-column ms-3">--}}
            {{--                    <span>Call to Our Experts</span>--}}
            {{--                    <a href="tel:+ 0123 456 7890"><span class="text-dark">Free: + 0123 456 7890</span></a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </nav>
    </div>
</div>
<!-- Navbar & Hero End -->

<div class="container-fluid bg-light py-5">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <i class="far fa-frown-open display-1 text-primary mb-4" style="width: 80px; height: 80px;"></i>
                <h1 class="display-1">404</h1>
                <h1 class="mb-4">Страница не найдена</h1>
                <p class="mb-4">Похоже, что Вы указали не существующий адрес</p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('home') }}"><i class="fa-solid fa-house"></i> На главную</a>
            </div>
        </div>
    </div>
</div>

@include('includes.footer')
