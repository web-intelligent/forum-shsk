@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')
    <div class="main-panel">
        @include('includes.profile_main_header')
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Сертификаты</h4>
                </div>
                <div class="page-category">
                    <div class="row">
                        <div class="col-sm-12 col-lg-8 offset-lg-2 offset-sm-0">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="mb-4 text-center">Сертификат участника форума</h4>
                                    <div>
                                        @if(!empty($certificate))
                                            <img style="width: 100%" src="{{ asset($certificate->link) }}" alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('includes.profile_footer')
