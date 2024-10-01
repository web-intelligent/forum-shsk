<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;


class UsersExport implements FromView
{
    public function view(): View
    {
        return view('exports.default', [
            'users' => User::all()->where('is_admin', '=', 0)->where('form', '!=',4)->where('form', '!=',5)
        ]);
    }
}
