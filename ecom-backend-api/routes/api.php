<?php

use App\Http\Controllers\Api\ApiGlobalController;
use App\Http\Controllers\Auth\ApiAuthUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => '/'], function ($route) {
    #... api front
    $route->group(['prefix' => 'front'], function ($route) {
        $route->group(['prefix' => 'auth'], function ($route) {
            $route->post("login", [ApiAuthUserController::class, 'login']);
            $route->post("register", [ApiAuthUserController::class, 'register']);
        });

        // les routes n'ayant pas besoin d'authentification
        $route->group(['prefix' => 'globals'], function ($route) {
            $route->get('civilities', [ApiGlobalController::class, 'getCivilities']);
            $route->get('countries', [ApiGlobalController::class, 'getCountries']);
        });

        // les routes front protégées
        require_once __DIR__ .'/api/front.php';
    });

    #... api back
    $route->group(['prefix' => 'back'], function ($route) {
        
        // les routes back protégées
        require_once __DIR__ .'/api/back.php';
    });
    
    #... infos php
    $route->get('php-info', function () {
        echo phpinfo();
    });

    #... incomplete url
    $route->get('incomplete-url', function (Request $request) {
        return response()->json([
            'type' => 'error',
            'message' => 'Oops ! URL is incomplete !',
            'path' => $request->path(),
            'result' => null
        ]);
    });

    #... route introuvable
    $route->fallback(function (Request $request) {
        return response()->json([
            'type' => 'error',
            'message' => 'Oops ! Something went wrong, please try again !',
            'path' => $request->path(),
            'result' => null
        ]);
    });
});
