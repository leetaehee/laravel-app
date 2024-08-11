<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // 라라벨 인덱스
    echo date('Y-m-d H:i:s');
    return view('welcome');
});

Route::get('/ip', function(Request $request) {
   // 아이피 확인하기
    echo "ip = " . $request->ip();
});

// 대시보드 (향후 인덱스 페이지가 될 예정)
Route::get('/dashboard', DashboardController::class);

// 유저 정보
Route::controller(UserController::class)->prefix('users')->group(function () {
   route::get('/', 'index');
   route::get('/create', 'create');
   route::get('/show/{id}', 'show');
   route::get('/edit/{id}', 'edit');
   route::post('/store', 'store');
   route::post('/update/{id}', 'update');
   route::post('/destroy/{id}', 'destroy');
});
