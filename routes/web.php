<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{UserName}', function (string $UserName) {
    return "Hello, " . $UserName;
});

Route::get('/about', function () {
    return "Страница с информацией о проекте";
});

Route::get('/news', function () {
    return "Список всех новостей";
});

Route::get('/news/{id}', function (int $id) {
    return "Вывод новости №" . $id;
});
