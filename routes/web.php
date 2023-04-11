<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RequestsController;
use App\Http\Middleware\AuthUserMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::controller(IndexController::class)->group(function () {
    Route::middleware(['authusercheck'])->group(function () {
        Route::get('/', 'main')->name('main');
        Route::get('/add', 'add')->name('add'); // Добавление заявки
    });
    Route::get('/signin', 'signin')->name('signin');
    Route::get('/signup', 'signup')->name('signup');
});

Route::controller(AuthController::class)->prefix('/auth')->as('auth.')->group(function () {
    Route::post('/singin', 'signin')->name('signin-form'); // Авторизация
    Route::post('/signup', 'signup')->name('signup'); // Регистрация
    Route::get('/logout', 'logout')->name('logout'); // Выход из учетки
});

Route::controller(RequestsController::class)->prefix('/requests')->as('requests.')->group(function () {
    Route::middleware(['authusercheck'])->group(function () {
        Route::get('/{station:id}', 'listRequest')->name('listRequest'); // Список заявок
        Route::get('/list/sort', 'sort')->name('sort');
        Route::post('/add', 'add')->name('add');
        Route::get('/single/{getRequest:id}', 'single')->name('single');
        Route::get('/take-to-work/{SingleRequest:id}', 'towork')->name('towork');
    });
});
