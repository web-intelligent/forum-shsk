@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel position-relative">
        @include('includes.profile_main_header')

        <div class="container ">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Программа форума ШСК</h4>
                </div>
                <div class="page-category">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="mb-4 text-center">Программа Всероссийского форума школьных спортивных клубов</h4>
                                    <div class="btn-group" style="position: absolute; top: -52px; right: 3px;">
                                        <a target="_blank" class="btn btn-sm btn-label-primary" href="{{ route('show.program') }}"><i class="fa-solid fa-book-open-reader"></i> Посмотреть на сайте</a>
                                        <a class="btn btn-sm btn-label-primary" href="{{ route('program.create') }}"><i class="fa-regular fa-calendar-plus"></i> Добавить элемент программы</a>
                                    </div>
                                    @if(!empty($program_arr))
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Адрес и место проведения</th>
                                                    <th>Время</th>
                                                    <th>Мероприятие</th>
                                                    <th>Описание и комментарий</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($program_arr as $date => $elements)
                                                    <tr>
                                                        <td colspan="4" class="bg-primary text-center fs-6" style="vertical-align: middle; color: white; font-weight: bold">{{ date('d сентября Y', strtotime($date)) }}</td>
                                                    </tr>
                                                    @foreach($elements as $element)
                                                        @if($element['long'] == 1)
                                                            <tr>
                                                                <td class="bg-secondary" style="text-align: center; vertical-align: middle; color: white; font-weight: bold" colspan="4">
                                                                    <a style="color: white" href="{{ route('program.edit', ['program' => $element['id']]) }}">{{ $element['name'] }}</a><br>
                                                                    {{ $element['start_time'] }} @if(!is_null($element['end_time'])) - {{ $element['end_time'] }} @endif<br>
                                                                    @if(!is_null($element['address'])) {{ $element['address'] }}<br> @endif
                                                                    @if(!is_null($element['description'])) {{ $element['description'] }}<br> @endif
                                                                </td>
                                                            </tr>

                                                        @else
                                                            <tr>
                                                                <td>{{ $element['address'] }}</td>
                                                                <td>{{ $element['start_time'] }} @if(!is_null($element['end_time'])) - {{ $element['end_time'] }} @endif</td>
                                                                <td><a href="{{ route('program.edit', ['program' => $element['id']]) }}">{{ $element['name'] }}</a></td>
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
                    </div>
                </div>
            </div>
        </div>

@include('includes.profile_footer')
