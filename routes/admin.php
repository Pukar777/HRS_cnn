<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\admin\HRSController;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => ['auth', 'admin']
], function () {
    Route::get('', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('report', [PageController::class, 'report'])->name('reports');
    // Route::get('user_manage', [UserController::class, 'index'])->name('user_manage');

    Route::post('hrs', [HRSController::class, 'store'])->name('hrs.store');

    Route::resource('user_manage', UserController::class);
    Route::resource('role_manage', RoleController::class);
    Route::resource('permission_manage', PermissionController::class);

    // Route::get('/email', function () {
    //     Mail::to('pukarkhatri777@gmail.com')->send(new VerificationMail);
    //     return new VerificationMail();
    // });

    Route::resource('transaction_manage', TransactionController::class);
});
