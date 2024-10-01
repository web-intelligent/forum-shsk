<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;


class TestResultExport implements FromView
{
    public function view(): View
    {
        return view('exports.tests_results', [
            'results' => DB::table('test_user_answers')
                ->select(
                    'test_user_answers.user_id as user_id',
                    'users.name as name',
                    'users.email as email',
                    'users.phone as phone',
                    'test_user_answers.test_data',
                    'test_result.points',
                    'test_result.question_id'
                )
                ->where('test_user_answers.test_id', '=', 1)
                ->Leftjoin('test_result', 'test_result.user_id', '=', 'test_user_answers.user_id')
                ->Leftjoin('users', 'users.id', '=', 'test_user_answers.user_id')
                ->get()
        ]);
    }
}
