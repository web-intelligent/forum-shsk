<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Распечатать QR-Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</text-align-left<body>

<div class="container py-5 position-relative">
    <div id="print_btn" class="btn btn-sm btn-primary" style="position: absolute; top: 20px; right: 20px;"><i class="fa-solid fa-print"></i> Распечатать</div>
    <h1 class="mb-5 text-center">Используйте нужный Вам размер QR-кода</h1>
    @php($i = 1)
    @while($i <= 4)
        <div class="row align-items-center justify-content-center mb-3">
            <div class="col-6 mb-3">
                <div class="text-align-right">{{ \SimpleSoftwareIO\QrCode\Facades\QrCode::size($i . '00')->generate(route('scan.user', ['id' => $user_id])) }}</div>
            </div>
            <div class="col-6 mb-3">
                <h2 class="fw-bold text-align-right">{{ $i . '00x' . $i . '00' }}</h2>
            </div>
        </div>
        @php($i++)
    @endwhile
{{--    <div class="row align-items-center justify-content-center">--}}
{{--        <div class="col-6 mb-3">--}}
{{--            <div class="text-align-right"><img src="data:image/png;base64, {{base64_encode(\SimpleSoftwareIO\QrCode\Facades\QrCode::size(150)->backgroundColor(0, 25, 205)->color(0, 0, 0)->format('png')->merge(public_path('/img/logo-8-white.png'), 0.8, true)->generate(route('scan.user', ['id' => $user_id]))) }}" alt=""></div>--}}
{{--        </div>--}}
{{--        <div class="col-6 mb-3">--}}
{{--            <h2 class="fw-bold text-align-left">150x150</h2>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row align-items-center justify-content-center">--}}
{{--        <div class="col-6 mb-3">--}}
{{--            <div class="text-align-right"><img src="data:image/png;base64, {{base64_encode(\SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->backgroundColor(0, 25, 205)->color(0, 0, 0)->format('png')->merge(public_path('/img/logo-8-white.png'), 0.8, true)->generate(route('scan.user', ['id' => $user_id]))) }}" alt=""></div>--}}
{{--        </div>--}}
{{--        <div class="col-6 mb-3">--}}
{{--            <h2 class="fw-bold text-align-left">200x200</h2>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row align-items-center justify-content-center">--}}
{{--        <div class="col-6 mb-3">--}}
{{--            <div class="text-align-right"><img src="data:image/png;base64, {{base64_encode(\SimpleSoftwareIO\QrCode\Facades\QrCode::size(250)->backgroundColor(0, 25, 205)->color(0, 0, 0)->format('png')->merge(public_path('/img/logo-8-white.png'), 0.8, true)->generate(route('scan.user', ['id' => $user_id]))) }}" alt=""></div>--}}
{{--        </div>--}}
{{--        <div class="col-6 mb-3">--}}
{{--            <h2 class="fw-bold text-align-left">250x250</h2>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row align-items-center justify-content-center">--}}
{{--        <div class="col-6 mb-3">--}}
{{--            <div class="text-align-right"><img src="data:image/png;base64, {{base64_encode(\SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(0, 25, 205)->color(0, 0, 0)->format('png')->merge(public_path('/img/logo-8-white.png'), 0.8, true)->generate(route('scan.user', ['id' => $user_id]))) }}" alt=""></div>--}}
{{--        </div>--}}
{{--        <div class="col-6 mb-3">--}}
{{--            <h2 class="fw-bold text-align-left">300x300</h2>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>


<script>
    var btn = document.getElementById('print_btn');
    btn.onclick = function () {
        window.print()
    }
</script>

</body>
</html>
