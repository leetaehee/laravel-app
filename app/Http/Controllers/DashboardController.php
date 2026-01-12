<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

/**
 * 대시보드 (로그인 후 이용 화면 )
 */
class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard');
    }
}
