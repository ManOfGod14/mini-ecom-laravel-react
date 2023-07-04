<?php

use Illuminate\Support\Facades\Artisan;
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

Route::get('api', function () { 
    return redirect('api/incomplete-url'); 
});

Route::group(['prefix' => 'use-artisan'], function ($route) {
    $route->get('clear-all', function () {
        Artisan::call('cache:clear');
        Artisan::call('route:cache');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        echo "All are cleared !";
    });
    $route->get('optimize-clear', function () {
        Artisan::call('optimize:clear');
        echo "Optimize cleared !";
    });
    $route->get('storage-link', function () {
        // exec('rm -rf public/storage');
        // exec('php artisan storage:link');
        Artisan::call('storage:link');
        echo "Storage link process successfully completed !";
    });
});
