<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PageController;
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
    'prefix' => 'user',
    'as' => 'user.',
    'namespace' => 'App\Https\Controllers\User',
    'middleware' => ['auth']
], function () {
    Route::get('', function () {
        return redirect()->route('user.dashboard');
    });
    Route::get('/user', function () {
        return redirect()->route('user.dashboard');
    });
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
});
