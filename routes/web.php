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
    echo date('Y-m-d H:i:s') . "=>" . phpversion();
    return view('welcome');
});

Route::get('/ip', function(Request $request) {
   // 아이피 확인하기
    echo "ip = " . $request->ip();
});

// 대시보드 (향후 인덱스 페이지가 될 예정)
Route::get('/dashboard', DashboardController::class);

Route::post('/send', [ChatController::class, 'send']);
Route::view('/chat', 'chat');

Route::prefix("users")->name("users.")->group(function() {
    Route::get("/", [UserController::class, 'index'])->name('index');
    Route::get("/create", [UserController::class, 'create'])->name('create');
    Route::get("/{idx}", [UserController::class, 'show'])->name('show');
    Route::post("/", [UserController::class, 'store'])->name('store');
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
