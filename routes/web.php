<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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
    return view('home');
})->name('home')->defaults('hideSide', true);

//Route::get('/join', function() {
//    // 회원가입 
//    return view('users.join');
//})->name('join')->defaults('hideSide', true);

// 대시보드 (향후 인덱스 페이지가 될 예정)
Route::get('/dashboard', DashboardController::class);

// sidebar 없는 정적 페이지들
Route::group([], function() {
    Route::view('/privacy-policy', 'privacy')
        ->name('privacy')
        ->defaults('hideSide', true);
    Route::view('/terms-of-service', 'terms')
        ->name('terms')
        ->defaults('hideSide', true);
});

Route::prefix("users")->name("users.")->group(function() {
    Route::get("/", [UserController::class, 'index'])->name('index'); // 회원목록 (관리자 권한 필수)

    Route::get("/register", [UserController::class, 'create'])->name('create')->defaults('hideSide', true); // 회원가입 폼
    Route::post("/register", [UserController::class, 'register'])->name('register'); // 회원가입 처리
    Route::get("/login", [UserController::class, 'login'])->name('login')->defaults('hideSide', true); // 로그인 폼
    Route::post("/login", [UserController::class, 'authenticate'])->name('authenticate'); // 로그인 처리 

    Route::get("/{idx}", [UserController::class, 'show'])->name('show');
    Route::get("/{idx}/edit", [UserController::class, 'edit'])->name("edit");
    Route::put("/{idx}", [UserController::class, 'update'])->name('update');
    Route::patch("/{idx}/soft-delete", [UserController::class, 'destroy'])->name('destroy');
});

Route::prefix("posts")->name("posts.")->group(function() {
    Route::get("/", [PostController::class, 'index'])->name('index');
    Route::get("/create", [PostController::class, 'create'])->name('create');
    Route::get("/{idx}", [PostController::class, 'show'])->name('show');
    Route::post("/", [PostController::class, 'store'])->name('store');
    Route::get("/{idx}/edit", [PostController::class, 'edit'])->name("edit");
    Route::put("/{idx}", [PostController::class, 'update'])->name('update');
    Route::patch("/{idx}/soft-delete", [PostController::class, 'destroy'])->name('destroy');
});

Route::prefix("comments")->name("comments.")->group(function() {
    Route::get("/", [CommentController::class, 'index'])->name('index');
    Route::get("/create", [CommentController::class, 'create'])->name('create');
    Route::get("/{idx}", [CommentController::class, 'show'])->name('show');
    Route::post("/", [CommentController::class, 'store'])->name('store');
    Route::get("/{idx}/edit", [CommentController::class, 'edit'])->name("edit");
    Route::put("/{idx}", [CommentController::class, 'update'])->name('update');
    Route::patch("/{idx}/soft-delete", [CommentController::class, 'destroy'])->name('destroy');
});

// 사진 라우팅
Route::prefix('photo')->name('photo.')->group(function () {
    Route::get('/{slug?}', function ($slug = null) {
        return view('photo.index');
    })->name('index');
});

// 영상 라우팅
Route::prefix('video')->name('video.')->group(function () {
    Route::get('/{slug?}', function ($slug = null) {
        return view('video.index');
    })->name('index');
});

// 정보 라우팅
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/{slug?}', function ($slug = null) {
        return view('blog.index');
    })->name('index');
});

// 장소 라우팅
Route::prefix('map')->name('map.')->group(function () {
    Route::get('/{slug?}', function ($slug = null) {
        return view('map.index');
    })->name('index');
});

// 장소 라우팅
Route::prefix('document')->name('document.')->group(function () {
    Route::get('/{slug?}', function ($slug = null) {
        return view('document.index');
    })->name('index');
});

Route::post('/send', [ChatController::class, 'send']);
Route::view('/chat', 'chat');
