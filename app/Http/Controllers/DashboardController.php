<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __invoke()
    {
        echo '단일 액션 컨트롤러';
    }
}
