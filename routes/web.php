<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsFormController;
use App\Http\Controllers\Admin\ParserController as ParserController;
use App\Http\Controllers\SocialController as SocialController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUsersController;


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

// news

Route::group(['middleware' => 'auth'], function (){
    Route::get('/account', AccountController::class)->name('account');

    Route::get('logout', function() {
        Auth::logout();
        return redirect()->route('login');
    })->name('account.logout');

    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('/parser', ParserController::class)
            ->name('parser');
        Route::view('/', 'admin.index')->name('index');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/users', AdminUsersController::class);
    });
});
Route::view('/about', 'news.about')->name('about');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');

Route::resource('/newsComment', NewsFormController::class);


Route::get('/news/categories', [NewsController::class, 'showAllCategories'])
    ->name('categories');



Route::get('/news/categories/{id}', [NewsController::class, 'showCategories'])
    ->where('id', '\d+')
    ->name('categories.show');

Route::get('sql', function (){
    dump(

        \DB::table('news')
            ->where('id', '>', 5)
            ->where('isImage', '=', false)
            ->get()
    );
});

Route::get('/collection', function () {
    $arr = [
        1,2,3,4
    ];

    $arr2 = [
      'names' => [
          'Tom', 'Steve'
      ],
        'ages' => [
            3, 6
        ]
    ];
    $collection = collect($arr);
    $collection2 = collect($arr2);

    dd($collection);
});

Route::get('/session', function () {
   if(session()->has('test')) {
       dd(session()->all(), session()->get('test'));
       session()->forget('test');
   }

   session(['test' => rand(1,1000)]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::group(['middleware' => 'guest'], function() {
    Route::get('auth/{network}/redirect', [SocialController::class, 'redirect'])
        ->where('network', '\w+')
        ->name('auth.redirect');
    Route::get('auth/{network}/callback', [SocialController::class, 'callback'])
        ->where('network', '\w+')
        ->name('auth.callback');
});

