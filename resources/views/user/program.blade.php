@include('includes.profile_header')
<div class="wrapper">
    @include('includes.profile_sidebar')

    <div class="main-panel">
        @include('includes.profile_main_header')
        <div class="container">
            @if ($errors->any())
                <div class="response-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <small style="font-size: 10px" class="text-white">Нажмите, чтобы скрыть</small>
                </div>
            @endif
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Составление программы</h4>
                </div>
                <div class="page-category">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Ваша программа форума ШСК</h4>
                                    <p class="text-muted mb-3">Здесь Вы можете составить свою индивидуальную программу, выбрав мероприятие</p>


                                    @if(!empty($program_arr))
                                        <form action="{{ route('user.program.submit') }}" method="POST">
                                            @csrf
                                            <table class="table table-bordered table-striped table-sm">
                                                <thead>
                                                <tr>
                                                    <th>Адрес и место проведения</th>
                                                    <th>Время</th>
                                                    <th>Мероприятие</th>
                                                    <th>Описание и комментарий</th>
                                                    <th>Выбрать</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($program_arr as $date => $arr)
                                                    <tr>
                                                        <td colspan="5" class="bg-primary text-center fs-6" style="vertical-align: middle; color: white; font-weight: bold">{{ date('d сентября Y', strtotime($date)) }}</td>
                                                    </tr>
                                                    @foreach($arr as $key => $elements)
                                                        <tr>
                                                            <td colspan="5" class="bg-danger text-center " style="vertical-align: middle; color: white; font-weight: bold">Начало в {{ $key }}. Внимание! Выбрать можно только одно мероприятие во временной группе</td>
                                                        </tr>
                                                        @foreach($elements as $el_key => $element)
                                                            @if($element['long'] == 1)
                                                                <tr>
                                                                    <td class="bg-secondary" style="text-align: center; vertical-align: middle; color: white; font-weight: bold" colspan="5">
                                                                        <div>{{ $element['name'] }}</div><br>
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
                                                                    <td>{!! htmlspecialchars_decode($element['description']) !!}</td>
                                                                    <td style="width: 200px">
{{--                                                                        <div class="form-check">--}}
{{--                                                                            <input class="form-check-input" type="radio" name="choose_{{ str_replace(':', '', $key) }}" id="flexRadioDefault_{{ str_replace(':', '', $key) }}_{{ $el_key }}">--}}
{{--                                                                            <label class="form-check-label" for="flexRadioDefault_{{ str_replace(':', '', $key) }}_{{ $el_key }}">--}}
{{--                                                                                Выбрать--}}
{{--                                                                            </label>--}}
{{--                                                                        </div>--}}

                                                                        <div class="form_toggle">
                                                                            <div class="form_toggle-item item-2">
                                                                                <input @if(in_array($element['id'], $user_program_data_arr)) checked @endif id="fid_1_{{ str_replace(':', '', $key) }}_{{ $el_key }}" type="radio" name="choose_{{ str_replace(':', '', $key) }}" value="{{ $element['id'] }}">
                                                                                <label for="fid_1_{{ str_replace(':', '', $key) }}_{{ $el_key }}">Да</label>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="my-3">
                                            @if(empty($user_program_data_arr))
                                                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-puzzle-piece"></i> Создать программу</button>
                                            @else
                                                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-pen-to-square"></i> Редактировать</button>
                                            @endif
                                            </div>
                                        </form>
                                    @else
                                        <div class="mb-3 text-secondary">Элементы, доступные для выбора ещё не были добавлены администратором</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('includes.profile_footer')
