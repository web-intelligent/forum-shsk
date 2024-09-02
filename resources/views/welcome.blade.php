@include('includes.header')

{{--<!-- Modal Search Start -->--}}
{{--<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-fullscreen">--}}
{{--        <div class="modal-content rounded-0">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--            </div>--}}
{{--            <div class="modal-body d-flex align-items-center bg-primary">--}}
{{--                <div class="input-group w-75 mx-auto d-flex">--}}
{{--                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">--}}
{{--                    <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i class="fa fa-search"></i></span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- Modal Search End -->--}}


<!-- Carousel Start -->
<div class="header-carousel owl-carousel">
    <div class="header-carousel-item bg-primary">
        <div class="carousel-caption">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-7 animated fadeInLeft">
                        <div class="text-sm-center text-md-start">
                            <h4 class="text-white text-uppercase fw-bold mb-4">Добро пожаловать</h4>
                            <h1 class="display-4 text-white mb-4">Всероссийский форум Школьных спортивных клубов</h1>
                            <h5 class="text-white">Место, где спорт объединяет</h5>
                            <p class="mb-5">Уникальное мероприятие, где участники могут общаться, делиться опытом и идеями, находить новых друзей и партнеров. Объединение профессионального потенциала педагогического сообщества физкультурно-спортивного профиля, осуществляющего деятельность по реализации приоритетного направления - развития школьных спортивных клубов в общеобразовательных организациях Российской Федерации
                            </p>
                            <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="{{ route('register.form') }}"><i class="fas fa-user-plus me-2"></i> Принять участие</a>
{{--                                <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#"><i class="fas fa-info me-2"></i>Подробнее</a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 animated fadeInRight">
                        <div class="calrousel-img" style="object-fit: cover;">
{{--                            <img src="public/img/carousel-3.png" class="img-fluid w-100" alt="">--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="header-carousel-item bg-primary">--}}
{{--        <div class="carousel-caption">--}}
{{--            <div class="container">--}}
{{--                <div class="row g-4 align-items-center">--}}
{{--                    <div class="col-lg-7 animated fadeInLeft">--}}
{{--                        <div class="text-sm-center text-md-start">--}}
{{--                            <h4 class="text-white text-uppercase fw-bold mb-4">Добро пожаловать</h4>--}}
{{--                            <h1 class="display-4 text-white mb-4">Всероссийский форум Школьных спортивных клубов</h1>--}}
{{--                            <h5 class="text-white">Место, где спорт объединяет</h5>--}}
{{--                            <p class="mb-5">Уникальное мероприятие, где участники могут общаться, делиться опытом и идеями, находить новых друзей и партнеров. Здесь вы найдете информацию о различных видах спорта, тренировочных методиках, соревнованиях и многом другом. Мы приглашаем всех, кто любит спорт и хочет развиваться в этой области, присоединиться к нашему сообществу--}}
{{--                            </p>--}}
{{--                            <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">--}}
{{--                                <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="{{ route('register.form') }}"><i class="fas fa-user-plus me-2"></i> Принять участие</a>--}}
{{--                                --}}{{--                                <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#"><i class="fas fa-info me-2"></i>Подробнее</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-5 animated fadeInRight">--}}
{{--                        <div class="calrousel-img" style="object-fit: cover;">--}}
{{--                            --}}{{--                            <img src="public/img/carousel-3.png" class="img-fluid w-100" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="header-carousel-item bg-primary">--}}
{{--        <div class="carousel-caption">--}}
{{--            <div class="container">--}}
{{--                <div class="row gy-4 gy-lg-0 gx-0 gx-lg-5 align-items-center">--}}
{{--                    <div class="col-lg-5 animated fadeInLeft">--}}
{{--                        <div class="calrousel-img">--}}
{{--                            <img src="public/img/carousel-2.png" class="img-fluid w-100" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-7 animated fadeInRight">--}}
{{--                        <div class="text-sm-center text-md-end">--}}
{{--                            <h4 class="text-white text-uppercase fw-bold mb-4">Welcome To LifeSure</h4>--}}
{{--                            <h1 class="display-1 text-white mb-4">Life Insurance Makes You Happy</h1>--}}
{{--                            <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy...--}}
{{--                            </p>--}}
{{--                            <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">--}}
{{--                                <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a>--}}
{{--                                <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Learn More</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
<!-- Carousel End -->

<!-- Feature Start -->
<div class="container-fluid feature bg-light py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Цель и задачи проведения форума</h4>
            <h2 class="display-5 mb-4">Развитие системы школьных спортивных клубов</h2>
            <p class="mb-0">
                Развитие системы школьных спортивных клубов (далее – ШСК) в Российской Федерации через консолидацию опыта и ресурсов субъектов Российской Федерации по совершенствованию деятельности ШСК как социокультурной среды и формы личностно-ориентированного обучения с использованием интегративных связей общего и дополнительного образования физкультурно-спортивной направленности
            </p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa-solid fa-gears fa-3x"></i>
                    </div>
                    <h5 class="mb-4">Управление и перспективы</h5>
                    <p style="font-size: 12px" class="mb-4">Обсуждение механизмов эффективного управления и перспектив развития ШСК в общеобразовательных организациях Российской Федерации в соответствии со стратегическими задачами развития системы образования Российской Федерации</p>
{{--                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>--}}
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa-solid fa-user-graduate fa-3x"></i>
                    </div>
                    <h5 class="mb-4">Научно-практические вопросы</h5>
                    <p style="font-size: 12px" class="mb-4">Обсуждение научно-практических вопросов развития физической культуры и спорта в общеобразовательных организациях Российской Федерации</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa-solid fa-id-card-clip fa-3x"></i>
                    </div>
                    <h5 class="mb-4">Организация ШСК</h5>
                    <p style="font-size: 12px" class="mb-4">Трансляция современных подходов к организации ШСК, как формы личностно-ориентированного обучения
                        в сфере физической культуры и спорта, социализации обучающихся, а также ресурса для выявления и профессионального сопровождения одарённых детей в области спорта и обучающихся с особыми образовательными потребностями
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa-solid fa-user-gear fa-3x"></i>
                    </div>
                    <h5 class="mb-4">Лучшие практики</h5>
                    <p style="font-size: 12px" class="mb-4">Трансляция лучших практик общероссийских спортивных федераций, обмен знаниями и опытом внедрения новых методов, технологий обучения, воспитания, оздоровления в рамках деятельности ШСК среди участников Форума
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa-solid fa-user-check fa-3x"></i>
                    </div>
                    <h5 class="mb-4">Компетенции специалистов</h5>
                    <p style="font-size: 12px" class="mb-4">Повышение общих и профессиональных компетенций специалистов в сфере физической культуры и спорта, осуществляющих деятельность в ШСК, в соответствии с национальными целями и реализацией государственной политики и в области образования и в сфере физической культуры и спорта
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa-solid fa-people-roof fa-3x"></i>
                    </div>
                    <h5 class="mb-4">Семейные ценности </h5>
                    <p style="font-size: 12px" class="mb-4">Создание условия для укрепления здоровья подрастающего поколения и членов их семей, а также совершенствование их спортивного досуга и повышение общественного значения традиционных семейных ценностей в рамках деятельности ШСК
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa-solid fa-comments fa-3x"></i>
                    </div>
                    <h5 class="mb-4">Обеспечения деятельности ШСК</h5>
                    <p style="font-size: 12px" class="mb-4">Выявление лучшего опыта и практик по совершенствованию организационного, учебно-методического, материально-технического, кадрового и информационного обеспечения деятельности ШСК, укрепление партнёрских отношений с заинтересованными организациями
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa-solid fa-handshake fa-3x"></i>
                    </div>
                    <h5 class="mb-4">Значимость ШСК</h5>
                    <p style="font-size: 12px" class="mb-4">Выявление лучшего опыта и практик по совершенствованию организационного, учебно-методического, материально-технического, кадрового и информационного обеспечения деятельности ШСК, укрепление партнёрских отношений с заинтересованными организациями
                    </p>
                </div>
            </div>
{{--            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">--}}
{{--                <div class="feature-item p-4 pt-0">--}}
{{--                    <div class="feature-icon p-4 mb-4">--}}
{{--                        <i class="fa fa-ruble-sign fa-3x"></i>--}}
{{--                    </div>--}}
{{--                    <h4 class="mb-4">Бесплатное участие</h4>--}}
{{--                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...--}}
{{--                    </p>--}}
{{--                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">--}}
{{--                <div class="feature-item p-4 pt-0">--}}
{{--                    <div class="feature-icon p-4 mb-4">--}}
{{--                        <i class="fa fa-bullseye fa-3x"></i>--}}
{{--                    </div>--}}
{{--                    <h4 class="mb-4">Flexible Plans</h4>--}}
{{--                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...--}}
{{--                    </p>--}}
{{--                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">--}}
{{--                <div class="feature-item p-4 pt-0">--}}
{{--                    <div class="feature-icon p-4 mb-4">--}}
{{--                        <i class="fa fa-headphones fa-3x"></i>--}}
{{--                    </div>--}}
{{--                    <h4 class="mb-4">Поддержка</h4>--}}
{{--                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...--}}
{{--                    </p>--}}
{{--                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
<!-- Feature End -->

<!-- About Start -->
<div class="container-fluid bg-light about pb-5">
    <div class="container pb-5">
        <div class="row g-5">
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100">
                    <h4 class="text-primary">Участники форума</h4>
                    <h2 class="display-8 mb-4 fw-bold">Представители органов власти и работники образовательных организаций</h2>
{{--                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt debitis sint tempora. Corporis consequatur illo blanditiis voluptates aperiam quos aliquam totam aliquid rem explicabo,--}}
{{--                    </p>--}}
{{--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae praesentium recusandae eligendi modi hic--}}
{{--                    </p>--}}
                    <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>Представители федеральных органов исполнительной власти Российский Федерации</p>
                    <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>Представители органов исполнительной власти субъектов Российской Федерации, осуществляющие государственное управление в сфере образования</p>
                    <p class="text-dark mb-4"><i class="fa fa-check text-primary me-3"></i>Руководители и заместители руководителей общеобразовательных организаций</p>
                    <p class="text-dark mb-4"><i class="fa fa-check text-primary me-3"></i>Учителя по физической культуре, руководители ШСК, педагоги дополнительного образования и другие категории педагогических работников в области физической культуры и спорта   в общеобразовательных организациях</p>
                    <p class="text-dark mb-4"><i class="fa fa-check text-primary me-3"></i>Представители общероссийских общественных организаций и Всероссийских спортивных федераций</p>
{{--                    <a class="btn btn-primary rounded-pill py-3 px-5" href="#">More Information</a>--}}
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-white rounded p-5 h-100">
                    <div class="row g-4 justify-content-center">
                        <div class="col-12">
                            <div class="rounded bg-light">
                                <img src="public/img/parttaker-1.jfif" class="img-fluid rounded w-100" alt="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="counter-item bg-light rounded p-3 h-100">
                                <div class="counter-counting">
                                    <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">350</span>
                                    <span class="h1 fw-bold text-primary">+</span>
                                </div>
                                <h4 class="mb-0 text-dark">Очное участие</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="counter-item bg-light rounded p-3 h-100">
                                <div class="counter-counting">
                                    <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">10000</span>
                                    <span class="h1 fw-bold text-primary">+</span>
                                </div>
                                <h4 class="mb-0 text-dark">Дистанционное участие</h4>
                            </div>
                        </div>
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="counter-item bg-light rounded p-3 h-100">--}}
{{--                                <div class="counter-counting">--}}
{{--                                    <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">556</span>--}}
{{--                                    <span class="h1 fw-bold text-primary">+</span>--}}
{{--                                </div>--}}
{{--                                <h4 class="mb-0 text-dark">Skilled Agents</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="counter-item bg-light rounded p-3 h-100">--}}
{{--                                <div class="counter-counting">--}}
{{--                                    <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">967</span>--}}
{{--                                    <span class="h1 fw-bold text-primary">+</span>--}}
{{--                                </div>--}}
{{--                                <h4 class="mb-0 text-dark">Team Members</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Service Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
{{--            <h4 class="text-primary">Our Services</h4>--}}
            <h2 class="display-6 mb-4">Коммуникация в рамках форума</h2>
            <p class="mb-0">Всероссийский форум школьных спортивных клубов - это уникальная площадка для обмена опытом и идеями в области развития школьного спорта. Коммуникации в рамках форума позволяют участникам установить новые контакты, поделиться своими достижениями и получить ценные советы от коллег
            </p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="public/img/vlad-10.PNG" class="img-fluid rounded-top w-100" alt="">
                        <div class="service-icon p-3">
                            <i class="fa fa-users fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Стратегическая сессия</a>
                            <p class="mb-4">Разработка стратегии развития, текущий анализ, определение целей и задач</p>
{{--                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Read More</a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="public/img/vlad-11.PNG" class="img-fluid rounded-top w-100" alt="">
                        <div class="service-icon p-3">
                            <i class="fa-solid fa-school fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Образовательные площадки</a>
                            <p class="mb-4">Участникам предоставляется возможность получить новые знания и навыки</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="public/img/vlad-12.PNG" class="img-fluid rounded-top w-100" alt="">
                        <div class="service-icon p-3">
                            <i class="fa-solid fa-briefcase fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Кейс-сессии</a>
                            <p class="mb-4">Рассмотрение конкретных случаев (кейсов) из практики и обсуждение возможных решений</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="public/img/vlad-13.PNG" class="img-fluid rounded-top w-100" alt="">
                        <div class="service-icon p-3">
                            <i class="fa-solid fa-person-circle-question fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Спортивно-образовательный квест</a>
                            <p class="mb-4">Участники проходят различные задания, связанные с физической активностью и интеллектуальными задачами</p>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">--}}
{{--                <a class="btn btn-primary rounded-pill py-3 px-5" href="#">More Services</a>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
<!-- Service End -->

<!-- Blog Start -->
<div class="container-fluid blog pb-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Информационная поддержка форума</h4>
            <h2 class="display-6 mb-4">Медиа-сопровождение Форума</h2>
            <p class="mb-0">Медиа-сопровождение Форума будет обеспечиваться на информационных ресурсах Министерства просвещения Российской Федерации, ФГБУ «Федеральный центр организационно-методического обеспечения физического воспитания». Записи всех мероприятий будут доступны для просмотра на нашем сайте.
            </p>
        </div>
        {{--        <div class="row g-4 justify-content-center">--}}
        {{--            <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">--}}
        {{--                <div class="blog-item">--}}
        {{--                    <div class="blog-img">--}}
        {{--                        <img src="public/img/blog-1.png" class="img-fluid rounded-top w-100" alt="">--}}
        {{--                        <div class="blog-categiry py-2 px-4">--}}
        {{--                            <span>Business</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="blog-content p-4">--}}
        {{--                        <div class="blog-comment d-flex justify-content-between mb-3">--}}
        {{--                            <div class="small"><span class="fa fa-user text-primary"></span> Martin.C</div>--}}
        {{--                            <div class="small"><span class="fa fa-calendar text-primary"></span> 30 Dec 2025</div>--}}
        {{--                            <div class="small"><span class="fa fa-comment-alt text-primary"></span> 6 Comments</div>--}}
        {{--                        </div>--}}
        {{--                        <a href="#" class="h4 d-inline-block mb-3">Which allows you to pay down insurance bills</a>--}}
        {{--                        <p class="mb-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius libero soluta impedit eligendi? Quibusdam, laudantium.</p>--}}
        {{--                        <a href="#" class="btn p-0">Read More  <i class="fa fa-arrow-right"></i></a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">--}}
        {{--                <div class="blog-item">--}}
        {{--                    <div class="blog-img">--}}
        {{--                        <img src="public/img/blog-2.png" class="img-fluid rounded-top w-100" alt="">--}}
        {{--                        <div class="blog-categiry py-2 px-4">--}}
        {{--                            <span>Business</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="blog-content p-4">--}}
        {{--                        <div class="blog-comment d-flex justify-content-between mb-3">--}}
        {{--                            <div class="small"><span class="fa fa-user text-primary"></span> Martin.C</div>--}}
        {{--                            <div class="small"><span class="fa fa-calendar text-primary"></span> 30 Dec 2025</div>--}}
        {{--                            <div class="small"><span class="fa fa-comment-alt text-primary"></span> 6 Comments</div>--}}
        {{--                        </div>--}}
        {{--                        <a href="#" class="h4 d-inline-block mb-3">Leverage agile frameworks to provide</a>--}}
        {{--                        <p class="mb-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius libero soluta impedit eligendi? Quibusdam, laudantium.</p>--}}
        {{--                        <a href="#" class="btn p-0">Read More  <i class="fa fa-arrow-right"></i></a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">--}}
        {{--                <div class="blog-item">--}}
        {{--                    <div class="blog-img">--}}
        {{--                        <img src="public/img/blog-3.png" class="img-fluid rounded-top w-100" alt="">--}}
        {{--                        <div class="blog-categiry py-2 px-4">--}}
        {{--                            <span>Business</span>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="blog-content p-4">--}}
        {{--                        <div class="blog-comment d-flex justify-content-between mb-3">--}}
        {{--                            <div class="small"><span class="fa fa-user text-primary"></span> Martin.C</div>--}}
        {{--                            <div class="small"><span class="fa fa-calendar text-primary"></span> 30 Dec 2025</div>--}}
        {{--                            <div class="small"><span class="fa fa-comment-alt text-primary"></span> 6 Comments</div>--}}
        {{--                        </div>--}}
        {{--                        <a href="#" class="h4 d-inline-block mb-3">Leverage agile frameworks to provide</a>--}}
        {{--                        <p class="mb-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius libero soluta impedit eligendi? Quibusdam, laudantium.</p>--}}
        {{--                        <a href="#" class="btn p-0">Read More  <i class="fa fa-arrow-right"></i></a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
</div>
<!-- Blog End -->

<!-- FAQs Start -->
<div class="container-fluid faq-section bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="h-100">
                    <div class="mb-5">
                        <h4 class="text-primary">Информация</h4>
                        <h1 class="display-4 mb-0">Часто задаваемые вопросы</h1>
                    </div>
                    <div class="accordion" id="accordionExample">
                        @if(count(\App\Services\ForumServices::$questions))
                            @php($num = 1)
                            @foreach(\App\Services\ForumServices::$questions as $question => $answer)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{$num}}">
                                        <button class="accordion-button border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$num}}" aria-expanded="true" aria-controls="collapse{{$num}}">
                                            {{ $question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{$num}}" class="accordion-collapse collapse @if($num == 1) active show @endif" aria-labelledby="heading{{$num}}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body rounded">
                                            {{ $answer }}
                                        </div>
                                    </div>
                                </div>
                                @php($num++)
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                <img src="public/img/vlad-14.PNG" class="img-fluid w-100" alt="">
            </div>
        </div>
    </div>
</div>
<!-- FAQs End -->

<!-- Team Start -->
{{--<div class="container-fluid team pb-5">--}}
{{--    <div class="container pb-5">--}}
{{--        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">--}}
{{--            <h4 class="text-primary">Our Team</h4>--}}
{{--            <h1 class="display-4 mb-4">Meet Our Expert Team Members</h1>--}}
{{--            <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="row g-4">--}}
{{--            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">--}}
{{--                <div class="team-item">--}}
{{--                    <div class="team-img">--}}
{{--                        <img src="public/img/team-1.jpg" class="img-fluid rounded-top w-100" alt="">--}}
{{--                        <div class="team-icon">--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-facebook-f"></i></a>--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-twitter"></i></a>--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-linkedin-in"></i></a>--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i class="fab fa-instagram"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="team-title p-4">--}}
{{--                        <h4 class="mb-0">David James</h4>--}}
{{--                        <p class="mb-0">Profession</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">--}}
{{--                <div class="team-item">--}}
{{--                    <div class="team-img">--}}
{{--                        <img src="public/img/team-2.jpg" class="img-fluid rounded-top w-100" alt="">--}}
{{--                        <div class="team-icon">--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-facebook-f"></i></a>--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-twitter"></i></a>--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-linkedin-in"></i></a>--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i class="fab fa-instagram"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="team-title p-4">--}}
{{--                        <h4 class="mb-0">David James</h4>--}}
{{--                        <p class="mb-0">Profession</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">--}}
{{--                <div class="team-item">--}}
{{--                    <div class="team-img">--}}
{{--                        <img src="public/img/team-3.jpg" class="img-fluid rounded-top w-100" alt="">--}}
{{--                        <div class="team-icon">--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-facebook-f"></i></a>--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-twitter"></i></a>--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-linkedin-in"></i></a>--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i class="fab fa-instagram"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="team-title p-4">--}}
{{--                        <h4 class="mb-0">David James</h4>--}}
{{--                        <p class="mb-0">Profession</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">--}}
{{--                <div class="team-item">--}}
{{--                    <div class="team-img">--}}
{{--                        <img src="public/img/team-4.jpg" class="img-fluid rounded-top w-100" alt="">--}}
{{--                        <div class="team-icon">--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-facebook-f"></i></a>--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-twitter"></i></a>--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-linkedin-in"></i></a>--}}
{{--                            <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i class="fab fa-instagram"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="team-title p-4">--}}
{{--                        <h4 class="mb-0">David James</h4>--}}
{{--                        <p class="mb-0">Profession</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- Team End -->

<!-- Testimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Отзывы</h4>
            <h1 class="display-4 mb-4">Что говорят участники форума прошлых лет</h1>
            <p class="mb-0">Участники предыдущих Всероссийских форумов Школьных и Студенческих спортивных клубов поделились о своих впечатлениях</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
            @if(count($testimonials))
                @foreach($testimonials as $testimonial)
                    <div class="testimonial-item bg-light rounded">
                        <div class="row g-0">
                            <div class="col-4  col-lg-4 col-xl-3">
                                <div class="h-100">
                                    <img src="https://forum.xn----itbjbj2arv.xn--p1ai/user_photos/{{ $testimonial['id'] }}/{{ $testimonial['user_photo'] }}" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-8 col-lg-8 col-xl-9">
                                <div class="d-flex flex-column my-auto text-start p-4">
                                    <h4 class="text-dark mb-0">{{ $testimonial['fio'] }}</h4>
                                    <p class="mb-3">{{ $testimonial['seat'] }}</p>
                                    <p class="mb-0">{{ $testimonial['six'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
{{--            <div class="testimonial-item bg-light rounded">--}}
{{--                <div class="row g-0">--}}
{{--                    <div class="col-4  col-lg-4 col-xl-3">--}}
{{--                        <div class="h-100">--}}
{{--                            <img src="public/img/testimonial-2.jpg" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-8 col-lg-8 col-xl-9">--}}
{{--                        <div class="d-flex flex-column my-auto text-start p-4">--}}
{{--                            <h4 class="text-dark mb-0">Client Name</h4>--}}
{{--                            <p class="mb-3">Profession</p>--}}
{{--                            <div class="d-flex text-primary mb-3">--}}
{{--                                <i class="fas fa-star"></i>--}}
{{--                                <i class="fas fa-star"></i>--}}
{{--                                <i class="fas fa-star"></i>--}}
{{--                                <i class="fas fa-star"></i>--}}
{{--                                <i class="fas fa-star text-body"></i>--}}
{{--                            </div>--}}
{{--                            <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="testimonial-item bg-light rounded">--}}
{{--                <div class="row g-0">--}}
{{--                    <div class="col-4  col-lg-4 col-xl-3">--}}
{{--                        <div class="h-100">--}}
{{--                            <img src="public/img/testimonial-3.jpg" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-8 col-lg-8 col-xl-9">--}}
{{--                        <div class="d-flex flex-column my-auto text-start p-4">--}}
{{--                            <h4 class="text-dark mb-0">Client Name</h4>--}}
{{--                            <p class="mb-3">Profession</p>--}}
{{--                            <div class="d-flex text-primary mb-3">--}}
{{--                                <i class="fas fa-star"></i>--}}
{{--                                <i class="fas fa-star"></i>--}}
{{--                                <i class="fas fa-star"></i>--}}
{{--                                <i class="fas fa-star text-body"></i>--}}
{{--                                <i class="fas fa-star text-body"></i>--}}
{{--                            </div>--}}
{{--                            <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim error molestiae aut modi corrupti fugit eaque rem nulla incidunt temporibus quisquam,--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
<!-- Testimonial End -->

@include('includes.footer')
