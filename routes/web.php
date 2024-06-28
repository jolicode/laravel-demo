<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\BlogController as AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Requirement\Requirement;

Route::get('/', function () {
    return redirect(app()->getLocale());
})->name('homepage');

Route::prefix('{_locale?}')
    ->where(['_locale' => '[a-zA-Z]{2}'])
    ->middleware('SetAppLocale')
    ->group(function () {
        Route::get('/', function () {
            return view('homepage');
        })->name('homepage');

        Route::prefix('blog')->name('blog.')->controller(BlogController::class)->group(function () {
            Route::get('/', 'index')
                ->defaults('page', 1)
                ->defaults('_format', 'html')
                ->name('index');
            Route::get('/rss.xml', 'index')
                ->defaults('page', 1)
                ->defaults('_format', 'xml')
                ->name('rss');

            Route::get('/search', 'search')
                ->name('search');

            Route::get('/posts/{post}', 'show')
                ->where('post', Requirement::ASCII_SLUG) // Thank you Symfony :p
                ->name('post');

            Route::post('comments/{post}/new', 'newComment')
                ->can('create', Comment::class)
                ->where('post', Requirement::ASCII_SLUG)
                ->name('comment.new');
        });

        Route::prefix('admin/posts')->name('admin.')->controller(AdminController::class)->middleware('can:admin')->group(function () {
            Route::get('/', 'index')->name('index');

            Route::get('/new', 'create')->name('post_new');
            Route::post('/store', 'store')->name('post_store');

            Route::get('/{post}', 'show')->name('post_show');

            Route::get('/{post}/edit', 'edit')->name('post_edit');
            Route::patch('/{post}/update', 'update')->name('post_update');

            Route::delete('/{post}/delete', 'destroy')->name('post_delete');
        });

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    });

require __DIR__.'/auth.php';
