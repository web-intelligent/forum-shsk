<?php
    $main_arr = [];

    foreach ($results as $result) {
        $first_test_points = 0;

        $first_test_data = json_decode($result->test_data, true);
        foreach ($first_test_data as $question_id => $answer_id) {
            $test = \Illuminate\Support\Facades\DB::table('answers')->where('id', $answer_id)->first('right');
            if(!empty($test)) {
                if($test->right == 1) {
                    $first_test_points += 1;
                }
            }
        }

        $main_arr[$result->user_id]['name'] = $result->name;
        $main_arr[$result->user_id]['email'] = $result->email;
        $main_arr[$result->user_id]['phone'] = $result->phone;
        $main_arr[$result->user_id]['first_test_points'] = $first_test_points;

        if(!isset($main_arr[$result->user_id]['second_test_points'])) {
            $main_arr[$result->user_id]['second_test_points'] = 0;
        }

        $main_arr[$result->user_id]['second_test_points'] += $result->points;
    }

?>
<table id="test_table" class="table table-striped table-hover" style="font-size: 10px">
    <thead>
        <tr role="row">
            <th style="font-size: 12px" data-sortas="numeric" class="sorting">#</th>
            <th style="font-size: 12px" class="">ФИО</th>
            <th style="font-size: 12px" class="sorting">Email</th>
            <th style="font-size: 12px" class="sorting">Телефон</th>
            <th style="font-size: 12px" class="sorting">Тест №1</th>
            <th style="font-size: 12px" class="sorting">Тест №2</th>
        </tr>
    </thead>
    <tbody>
        <?php $num = 1?>
        @foreach($main_arr as $datum)
            <tr>
                <td>{{ $num }}</td>
                <td>{{ $datum['name'] }}</td>
                <td>{{ $datum['email'] }}</td>
                <td>{{ $datum['phone'] }}</td>
                <td>{{ $datum['first_test_points'] }}</td>
                <td>{{ $datum['second_test_points'] }}</td>
            </tr>
            <?php $num++?>
        @endforeach
    </tbody>
</table>
