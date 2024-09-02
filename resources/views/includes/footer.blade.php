<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-12">
                <div class="mb-5">
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-6 col-xl-8">
                            <div class="footer-item">
                                <a href="{{ route('home') }}" class="p-0">
{{--                                    <h3 class="text-white"><i class="fab fa-slack me-3"></i> ZA ШСК</h3>--}}
                                    {{ \App\Services\ForumServices::showLogo(200, true) }}
                                </a>
                                <p class="text-white mb-4">Всероссийский форум школьных спортивных клубов - это уникальное мероприятие, где участники могут общаться, делиться опытом и идеями, находить новых друзей и партнеров. Объединение профессионального потенциала педагогического сообщества физкультурно-спортивного профиля, осуществляющего деятельность по реализации приоритетного направления - развития школьных спортивных клубов в общеобразовательных организациях Российской Федерации</p>
                                <div class="footer-btn d-flex">
                                    <a class="btn btn-md-square rounded-circle me-3" target="_blank" href="https://vk.com/public211630206"><i class="fab fa-vk"></i></a>
                                    <a class="btn btn-md-square rounded-circle me-3" target="_blank" href="https://t.me/fcomofv"><i class="fab fa-telegram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="footer-item">
                                <h4 class="text-white mb-4">Ссылки</h4>
                                <a href="{{ route('home') }}"><i class="fas fa-angle-right me-2"></i> Главная</a>
                                <a href="{{ route('home') }}"><i class="fas fa-angle-right me-2"></i> Программа</a>
                                <a href="{{ route('home') }}"><i class="fas fa-angle-right me-2"></i> Трансляции</a>
                                @if(!\Illuminate\Support\Facades\Auth::check())
                                    <a href="{{ route('login') }}"><i class="fas fa-angle-right me-2"></i> Войти</a>
                                @endif
                                <a href="https://еип-фкис.рф/forum" target="_blank"><i class="fas fa-angle-right me-2"></i> Форум 2022</a>
                                <a href="https://forum.еип-фкис.рф" target="_blank"><i class="fas fa-angle-right me-2"></i> Форум 2023</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-5" style="border-top: 1px solid rgba(255, 255, 255, 0.08);">
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                            <i class="fas fa-map-marker-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Адрес</h4>
                                            <p class="mb-0">ФГБОУ «МДЦ «Артек», Гурзуф, Ленинградская улица, дом 41</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                            <i class="fas fa-envelope fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Поддержка</h4>
                                            <p class="mb-0">contact@еип-фкис.рф</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="d-flex">
                                        <div class="btn-xl-square bg-primary text-white rounded p-4 me-4">
                                            <i class="fa fa-phone-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white">Даты проведения</h4>
                                            <p class="mb-0">19-21 сентября</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-12 text-center">
                <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Всероссийский форум школьных спортивных клубов, 2022 - {{ date('Y') }} гг.</a></span>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('public/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('public/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('public/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('public/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('public/lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('public/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/js/masked_input.js') }}"></script>


<!-- Template Javascript -->
<script src="{{ asset('public/js/main.js?ver=1.0.0') }}"></script>
<script src="{{ asset('public/js/forum_script.js?ver=1.0.0') }}"></script>
</body>

</html>
