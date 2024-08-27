@include('includes.header')

<!-- Team Start -->
<style>
    @media print {
        nav,
        .btn,
        .footer,
        #footer,
        footer,
        header,
        .header,
        #header,
        /*div > div:not(.to-print),*/
        /*div + div:not(.to-print),*/
        /*.navbar-nav,*/
        .nav-btn, .navbar-collapse, .navbar-toggler {
            display: none !important;
        }
    }
</style>
<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">QR-Code</h4>
            <h1 class="display-4 mb-4">Распечатать QR-код</h1>
        </div>
        <div class="mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s">
            <div class="container py-5 position-relative">
                <div id="print_btn" class="btn btn-primary" style="position: absolute; top: 20px; right: 20px;"><i class="fa-solid fa-print"></i> Распечатать</div>
                <h1 class="mb-5 text-center">Используйте нужный Вам размер QR-кода</h1>
                @php($i = 1)
                @while($i <= 4)
                    <div class="row align-items-center justify-content-center mb-3">
                        <div class="col-12 mb-3">
                            <div class="text-center">{{ \SimpleSoftwareIO\QrCode\Facades\QrCode::size($i . '00')->generate(route('scan.user', ['id' => $user_id])) }}</div>
                        </div>
                        <div class="col-12 mb-3 text-center">
                            <h2 class="fw-bold">{{ $i . '00x' . $i . '00' }}</h2>
                        </div>
                    </div>
                    @php($i++)
                @endwhile
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

<script>
    var btn = document.getElementById('print_btn');
    btn.onclick = function () {
        window.print()
    }
</script>

@include('includes.footer')
