<?php
Route::get('/blogs', \App\Http\Controllers\Dashboard\BlogController::class)
    ->name('dashboard.blogs');

Route::get('/subscribers', \App\Http\Controllers\Dashboard\SubscriberController::class)
    ->name('dashboard.subscribers');

Route::get('/subscriptions', \App\Http\Controllers\Dashboard\SubscriptionController::class)
    ->name('dashboard.subscriptions');

Route::get('/comments', \App\Http\Controllers\Dashboard\CommentController::class)
    ->name('dashboard.comments');
