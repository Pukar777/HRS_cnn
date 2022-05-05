<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use GuzzleHttp\Psr7\Request;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
    'namespace' => 'App\Https\Controllers\Auth',
    'middleware' => ['guest']
], function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);


    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::get('password_set/{token}', [RegisterController::class, 'password_set'])->name('password.token');
    Route::post('password_set', [RegisterController::class, 'update_password'])->name('password.update');

    Route::get('password_reset', [LoginController::class, 'reset_index'])->name('password.reset');
    Route::post('password_reset', [LoginController::class, 'reset_mail'])->name('password.reset.mail');

    // Route::get('change_password/{token}', [RegisterController::class, 'change_password']);
    // Route::get('change_password/{token}', [RegisterController::class, 'change_password']);
});

Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
    'namespace' => 'App\Https\Controllers\Auth',
    'middleware' => ['auth']
], function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

// Route::group(
//     [
//         'prefix' => 'auth',
//         'as' => 'auth.',
//         'namespace' => 'App\Https\Controllers\Auth',
//         'middleware' => ['auth:api']
//     ],
//     function () {
//         Route::get('password_set', function (Request $request) {
//             dd($request);
//         });
//         // Route::get('password_set', 
//         // function(Request $request){ 
//         //     return $request->user();
//         // }
//     }
// );
