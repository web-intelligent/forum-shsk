<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Программа Всероссийского форума школьных спортивных клубов - 2024</title>
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }
        .cellSetting {
            text-align: center;
            vertical-align: middle;
            border: 1px solid #000;
            padding: 10px
        }
    </style>
</head>
<body>
<?php

use App\Models\Program;

$programs = Program::orderBy('date')
        ->orderBy('start_time')
        ->get();
    $program_arr = [];
    $iter = 0;
    foreach ($programs as $program) {
        $program_arr[$program->date][$iter]['id'] = $program->id;
        $program_arr[$program->date][$iter]['name'] = $program->name;
        $program_arr[$program->date][$iter]['description'] = $program->description;
        $program_arr[$program->date][$iter]['address'] = $program->address;
        $program_arr[$program->date][$iter]['start_time'] = $program->start_time;
        $program_arr[$program->date][$iter]['end_time'] = $program->end_time;
        $program_arr[$program->date][$iter]['long'] = $program->long;
        $program_arr[$program->date][$iter]['marked'] = $program->marked;
        $iter++;
    }
?>
    <div style="text-align: center; margin-bottom: 50px;"><img style="width: 200px" src="{{ asset('public/img/logo-8.png') }}" alt=""></div>
    <h5 style="text-align: center; font-size: 24px">Программа Всероссийского форума школьных спортивных клубов - 2024</h5>
    <table>
        <thead>
            <tr>
                <th class="cellSetting">Адрес и место проведения</th>
                <th class="cellSetting">Время</th>
                <th class="cellSetting">Мероприятие</th>
                <th class="cellSetting">Описание и комментарий</th>
            </tr>
        </thead>
        <tbody>
        @foreach($program_arr as $date => $elements)
            <tr>
                <td style="background: #0d6efd; color:#fff; font-weight: bold;" colspan="4" class="cellSetting">{{ date('d сентября Y года', strtotime($date)) }}</td>
            </tr>
            @foreach($elements as $element)
                @if($element['long'] == 1)
                    <tr>
                        <td class="cellSetting" style="background: #015fc9; color: white; font-weight: bold;" colspan="4">
                            {{ $element['name'] }}<br>
                            {{ $element['start_time'] }} @if(!is_null($element['end_time'])) - {{ $element['end_time'] }} @endif<br>
                            @if(!is_null($element['address'])) {{ $element['address'] }}<br> @endif
                            @if(!is_null($element['description'])) {{ $element['description'] }}<br> @endif
                        </td>
                    </tr>

                @else
                    <tr>
                        <td style="border: 1px solid #000; padding: 10px">{{ $element['address'] }}</td>
                        <td style="border: 1px solid #000; padding: 10px">{{ $element['start_time'] }} @if(!is_null($element['end_time'])) - {{ $element['end_time'] }} @endif</td>
                        <td style="border: 1px solid #000; padding: 10px">{{ $element['name'] }}</td>
                        <td style="border: 1px solid #000; padding: 10px">{{ $element['description'] }}</td>
                    </tr>
                @endif
            @endforeach
        @endforeach
        </tbody>
    </table>
</body>
</html>
