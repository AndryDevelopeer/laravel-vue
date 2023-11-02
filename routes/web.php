<?php

use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware' => Authenticate::class], function () {
    Route::get('main', function () {
        return redirect()->route('platform.main');
    })->name('main');
});

//Auth::routes();
