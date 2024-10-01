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
            <h4 class="text-primary">Фотогалерея</h4>
            <h1 class="display-4 mb-4">{{$meta['title']}}</h1>
        </div>
        <div class="mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s">
            @foreach($gallery as $date => $imgages)
                <h2 class="display-6 mb-4 pb-2 border-bottom">{{ $date }}</h2>
                <div class="masonry-layout gallery">
                    @foreach($imgages as $img_name)
                        <div class="masonry-layout__panel">
                            <div class="masonry-layout__panel-content">
                                <a class="gallery_image_link" href="{{ 'public/img/gallery/' . $img_name.'.jpg' }}"><img style="width: 100%; object-fit: cover" class="rounded-2" src="{{ asset('public/img/gallery/' . $img_name.'.jpg') }}" alt=""></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->

@include('includes.footer')
