<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditorAndAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) return redirect()->route('home')->with('wrong', 'Доступ закрыт, авторизуйтесь как администратор');

        $user = Auth::user();
        if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2) return $next($request);

        return redirect()->route('home')->with('wrong', 'Доступ закрыт, авторизуйтесь как администратор');

    }
}
