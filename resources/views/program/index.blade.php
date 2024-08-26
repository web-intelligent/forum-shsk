@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel">
        @include('includes.profile_main_header')

        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Программа форума ШСК</h4>
                </div>
                <div class="page-category">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-stats card-round">
                                <div class="card-body position-relative">
                                    <h4 class="mb-4 text-center">Программа Всероссийского форума школьных спортивных клубов</h4>
                                    <a class="btn btn-sm btn-primary" style="position: absolute; top: 20px; right: 20px;" href="{{ route('program.create') }}"><i class="fa-regular fa-calendar-plus"></i> Добавить элемент программы</a>
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
                                                        <td colspan="4" class="bg-primary-subtle text-center fs-6">{{ date('d.m.Y', strtotime($date)) }}</td>
                                                    </tr>
                                                    @foreach($elements as $element)
                                                        <tr>
                                                            <td>{{ $element['address'] }}</td>
                                                            <td>{{ $element['start_time'] }} @if(!is_null($element['end_time'])) - {{ $element['end_time'] }} @endif</td>
                                                            <td><a href="{{ route('program.edit', ['program' => $element['id']]) }}">{{ $element['name'] }}</a></td>
                                                            <td>{{ $element['description'] }}</td>
                                                        </tr>
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
