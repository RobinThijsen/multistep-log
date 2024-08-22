<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
    'middleware' => [ 'localize', 'localeSessionRedirect' ]
], function() {
    // LIVEWIRE ROUTES
    \Livewire\Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });

    // LOGIN ROUTE
    Route::get('', [\App\Http\Controllers\PageController::class, 'home'])->name('app.home');
    Route::get(__('route.register'), \App\Livewire\MultistepRegister::class)->name('app.register');
    Route::get(__('route.login'), \App\Livewire\Login::class)->name('app.login');
    Route::get(__('route.dashboard'), \App\Livewire\Dashboard::class)->middleware('auth')->name('app.dashboard');
});
