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
                        <td style="text-align: center; vertical-align: middle" colspan="4" class="bg-info text-white text-center fs-6 fw-bold">{{ date('d сентября Y года', strtotime($date)) }}</td>
                        <tr>
                        </tr>
                        @foreach($elements as $element)
                            <tr>
                                <td style="vertical-align: middle">{{ $element['address'] }}</td>
                                <td style="vertical-align: middle">{{ $element['start_time'] }} @if(!is_null($element['end_time'])) - {{ $element['end_time'] }} @endif</td>
                                <td style="vertical-align: middle">{{ $element['name'] }}</td>
                                <td style="vertical-align: middle">{{ $element['description'] }}</td>
                            </tr>
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
