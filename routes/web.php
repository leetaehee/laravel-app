<?php

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
    debug('라라벨 디버그바 설치..');

    Debugbar::info("[info] 라라벨 디버그바");
    Debugbar::error("[error] 라라벨 디버그바");

    Log::debug("[debug] 파일로 로그 남기기..");

    return view('welcome');
});
