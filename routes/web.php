<?php

declare(strict_types=1);

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Requirement\Requirement;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::prefix('blog')->name('blog.')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')
        ->defaults('page', 1)
        ->defaults('_format', 'html')
        ->name('index')
    ;
    Route::get('/rss.xml', 'index')
        ->defaults('page', 1)
        ->defaults('_format', 'xml')
        ->name('rss')
    ;

    Route::get('/search', 'search')
        ->name('search')
    ;
    //    Route::get('/page/{page}', 'index')->name('index_paginated');

    Route::get('/posts/{post}', 'show')
        ->where('post', Requirement::ASCII_SLUG) // Thank you Symfony :p
        ->name('post')
    ;

    Route::post('comment/{post}/new', 'newComment')
        ->name('comment.new')
    ;
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::controller(OrderController::class)->group(function () {
//    Route::get('/orders/{id}', 'show');
//    Route::post('/orders', 'store');
// });

require __DIR__ . '/auth.php';
