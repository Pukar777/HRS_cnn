<?php

use App\Mail\VerificationMail;
use Illuminate\Foundation\Auth\User;
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

Route::get('welcome', function () {
    return view('welcome');
});





Route::get('', function () {
    return view('frontend.index');
})->name('index');

Route::get('about', function () {
    return view('frontend.about');
})->name('about');

Route::get('contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::get('pass', function () {
    return view('auth.password_set');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/user.php';
require __DIR__ . '/admin.php';
