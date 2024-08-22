<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $meta['title'] }}</title>
    <meta content="{{ $meta['keywords'] }}" name="keywords">
    <meta content="{{ $meta['description'] }}" name="description">

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
    <meta
        content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
        name="viewport"
    />
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('public/css/all.min.css') }}" />

    <!-- Fonts and icons -->
{{--    <script src="{{ asset('public/profile/assets/js/plugin/webfont/webfont.min.js') }}"></script>--}}
{{--    <script>--}}
{{--        WebFont.load({--}}
{{--            google: { families: ["Public Sans:300,400,500,600,700"] },--}}
{{--            custom: {--}}
{{--                families: [--}}
{{--                    "Font Awesome 5 Solid",--}}
{{--                    "Font Awesome 5 Regular",--}}
{{--                    "Font Awesome 5 Brands",--}}
{{--                    "simple-line-icons",--}}
{{--                ],--}}
{{--                urls: ["assets/css/fonts.min.css"],--}}
{{--            },--}}
{{--            active: function () {--}}
{{--                sessionStorage.fonts = true;--}}
{{--            },--}}
{{--        });--}}
{{--    </script>--}}

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/profile/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/profile/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/profile/assets/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('public/profile/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/profile/assets/css/my-style.css') }}" />
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
