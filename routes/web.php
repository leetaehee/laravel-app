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
    $a = 1;
    $b = 2;
    $c = 3;

    $d = ($a + $b) - 1;

    echo $d . "<br>";

    echo env('APP_NAME') . "<br>";

    echo config('app.name') . "<br>";

    echo "라라벨 테스트.. git에 제대로 올라갔는지.. pull 하시는분은 삭제바랍니다.";
    return view('welcome');
});
