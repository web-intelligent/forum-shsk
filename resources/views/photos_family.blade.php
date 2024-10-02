@include('includes.header')

<style>
    .masonry-layout {
        column-count: 5;
        column-gap: 0;
    }
    .masonry-layout__panel {
        break-inside: avoid;
        padding: 0px;
    }
    .masonry-layout__panel-content {
        padding: 10px;
        border-radius: 10px;
    }

</style>


<!-- Team Start -->
<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Фотовыставка</h4>
            <h1 class="display-7 mb-4">{{$meta['title']}}</h1>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="p-5">
                    <p class="">Фотовыставка «Активная дружная семья» представляет собой коллекцию фотографий, демонстрирующих разнообразие семейных активностей и традиций.<br>
                        В фотовыставке представлены фотографии победителей и призеров Конкурсных мероприятий 2024 года, проводимых ФГБУ «ФЦОМОФВ», таких как Всероссийской заочной Акции «О спорт-ты мир!» в номинации «Семья – здоровье – спорт», Конкурс «Спортивная династия» в рамках марафона «Я горжусь своей семьей»,  Всероссийской акции «Физическая культура и спорт - альтернатива пагубным привычкам» в номинации «Одна семья-одна команда».<br>
                        Каждый снимок, каждая фотография передает теплоту и радость семейной жизни, показывая, как близкие люди проводят время вместе, наслаждаясь обществом друг друга. Выставка также включает фотографии семей, занимающихся спортом, путешествующих, участвующих в культурных мероприятиях и просто проводящих время дома. Фотографии наполнены искренними эмоциями и улыбками, подчеркивая важность поддержки и взаимопонимания внутри семьи.  Выставка позволила участникам увидеть историю успеха других семей, а также их активное участие в различных мероприятиях и событиях, увидеть поддержку друг друга в трудные моменты и конечно увидеть самые яркие эмоции лучших моментов жизни.<br>
                        Выставка вдохновляет каждого участника на создание своих семейных традиций и укрепление связей между поколениями.
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 mb-3">
                <div class="text-center">
                    <img style="width: 40%" src="{{ asset('public/img/god_semi_logo_2.png') }}" alt="">
                </div>
                <div class="text-center">
                    <img style="width: 80%" src="{{ asset('public/img/photo_2024-10-01_14-11-02.jpg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s">
            <div class="text-center mx-auto pb-5 " style="max-width: 800px;">
                <h1 class="display-6 mb-4">Фотографии победителей и призеров Конкурсных мероприятий 2024 года</h1>
            </div>
            <div class="masonry-layout gallery">
                @foreach($images as $img_name)
                    <div class="masonry-layout__panel">
                        <div class="masonry-layout__panel-content">
                            <a class="gallery_image_link" href="{{ 'public/img/' . $img_name.'.jpg' }}"><img style="width: 100%; object-fit: cover" class="rounded-2" src="{{ asset('public/img/' . $img_name.'.jpg') }}" alt=""></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <h2 class="text-center display-4 my-5">Семья Богдановых г. Химки Московской области</h2>
            <h6 class="text-center mb-4 text-muted">Победители Всероссийской акции "Физическая культура и спорт - альтернатива пагубным привычкам" в номинации "Одна семья - одна команда" Богданова Анастасия, обучающаяся 8 класса "Г" Муниципального бюджетного общеобразовательного учреждения школа "Триумф"</h6>
            <div class="masonry-layout gallery">
                @foreach($bogdanovi as $img_name)
                    <div class="masonry-layout__panel">
                        <div class="masonry-layout__panel-content">
                            <a class="gallery_image_link" href="{{ 'public/img/' . $img_name.'.jpeg' }}"><img style="width: 100%; object-fit: cover" class="rounded-2" src="{{ asset('public/img/' . $img_name.'.jpeg') }}" alt=""></a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
<!-- Team End -->

@include('includes.footer')
