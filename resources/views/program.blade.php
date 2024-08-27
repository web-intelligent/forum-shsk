@include('includes.header')

<!-- Team Start -->
<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Информация</h4>
            <h1 class="display-4 mb-4">{{$meta['title']}}</h1>
            <p class="mb-0">Здесь вы найдёте всю необходимую информацию о предстоящем мероприятии. Мы подробно описываем все мероприятия форума. Вы узнаете о том, какие секции будут проходить в течение дня, кто будет выступать в качестве спикеров и какие темы будут обсуждаться. Также предоставляется информация о месте проведения мероприятий форума ШСК
            </p>
        </div>
        <div class="mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s">
            <div class="d-flex justify-content-end mb-3">
                <div><a class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0" href="{{ route('pdf.program.generate') }}"><i class="fa-solid fa-file-pdf"></i> Скачать в PDF</a> </div>
            </div>
            @if(!empty($program_arr))
                <table class="table table-bordered table-striped" style="font-size: 12px">
                    <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle">Адрес и место проведения</th>
                        <th style="text-align: center; vertical-align: middle">Время</th>
                        <th style="text-align: center; vertical-align: middle">Мероприятие</th>
                        <th style="text-align: center; vertical-align: middle">Описание и комментарий</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($program_arr as $date => $elements)
                        <td style="text-align: center; vertical-align: middle" colspan="4" class="bg-primary text-white text-center fw-bold fs-5">{{ date('d сентября Y года', strtotime($date)) }}</td>
                        <tr>
                        </tr>
                        @foreach($elements as $element)
                            @if($element['long'] == 1)
                                <tr>
                                    <td style="text-align: center; vertical-align: middle; background: #015fc9; color: white; font-weight: bold" colspan="4">
                                        {{ $element['name'] }}<br>
                                        {{ $element['start_time'] }} @if(!is_null($element['end_time'])) - {{ $element['end_time'] }} @endif<br>
                                        @if(!is_null($element['address'])) {{ $element['address'] }}<br> @endif
                                        @if(!is_null($element['description'])) {{ $element['description'] }}<br> @endif
                                    </td>
                                </tr>

                            @else
                                <tr>
                                    <td>{{ $element['address'] }}</td>
                                    <td>{{ $element['start_time'] }} @if(!is_null($element['end_time'])) - {{ $element['end_time'] }} @endif</td>
                                    <td>{{ $element['name'] }}</td>
                                    <td>{{ $element['description'] }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
<!-- Team End -->

@include('includes.footer')
