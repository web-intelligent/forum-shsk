@include('includes.header')

<!-- Team Start -->
<div class="container-fluid team pb-5">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                <i class="fa-solid fa-bug display-1 text-primary mb-4" style="width: 80px; height: 80px;"></i>
                <h1 class="display-1">500</h1>
                <h1 class="mb-4">Ошибка на сервере</h1>
                <p class="mb-4">Что-то пошло не так! Сообщите об ошибке в службу поддержки</p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('home') }}"><i class="fa-solid fa-house"></i> На главную</a>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

@include('includes.footer')
