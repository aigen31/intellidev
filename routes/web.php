<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language');

Volt::route('/blog/{category?}', 'blog')->name('blog');
Volt::route('/', 'home')->name('home');
Volt::route('/blog/post/{post}', 'post.single')->name('blog.post');

Route::middleware(['auth'])->group(function () {
    Volt::route('/dashboard', 'dashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');
    Volt::route('/profile', 'profile.show')->name('profile.show');
});

// require __DIR__.'/auth.php';

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
