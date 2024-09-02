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
                        <div class="col-sm-12 col-md-6 col-lg-6 offset-sm-0 offset-md-3 offset-lg-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="mb-4 text-center">Сертификат участника форума</h4>
                                    <p>Сертификат участника форума будет доступен по окончанию форума</p>
                                    <form class="needs-validation" action="" method="POST" novalidate>
                                        @csrf
                                        @if ($errors->any())
                                            <div class="response-message-register">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                <small style="font-size: 10px" class="text-white">Нажмите, чтобы скрыть</small>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('includes.profile_footer')
