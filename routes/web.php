<?php

use App\Http\Controllers\Authentication;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Employe;
use App\Http\Controllers\Admin\Member;
use App\Http\Controllers\Admin\Saving;
use App\Http\Controllers\Admin\Report;
use App\Http\Controllers\Admin\SavingCategory;

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
    return view('authentications.login');
});

Route::post('/login', [Authentication::class, 'login']);
Route::get('/logout', [Authentication::class, 'logout']);

Route::middleware(['admin'])->group(function() {
    Route::get('/admin/dashboard', [Dashboard::class, 'index']);
    Route::get('/admin/setting/karyawan', [Employe::class, 'index']);
    Route::post('/admin/setting/karyawan', [Employe::class, 'store']);
    Route::get('/admin/setting/add-karyawan', [Employe::class, 'new']);
    Route::post('/admin/setting/edit-karyawan/{id}', [Employe::class, 'update']);
    Route::get('/admin/setting/karyawan/{id}', [Employe::class, 'destroy']);

    Route::get('/admin/setting/jamaah', [Member::class, 'index']);
    Route::post('/admin/setting/jamaah', [Member::class, 'store']);
    Route::get('/admin/setting/add-jamaah', [Member::class, 'new']);
    Route::get('/admin/setting/detail-jamaah/{id}', [Member::class, 'detail']);
    Route::post('/admin/setting/edit-jamaah/{id}', [Member::class, 'update']);
    Route::get('/admin/setting/jamaah/{id}', [Member::class, 'destroy']);

    Route::get('/admin/setting/categories', [SavingCategory::class, 'index']);
    Route::post('/admin/setting/categories', [SavingCategory::class, 'store']);
    Route::get('/admin/setting/add-categories', [SavingCategory::class, 'new']);
    Route::post('/admin/setting/edit-categories', [SavingCategory::class, 'update']);
    Route::get('/admin/setting/categories/{id}', [SavingCategory::class, 'destroy']);

    Route::get('/admin/saving', [Saving::class, 'index']);
    Route::get('/admin/saving/preview/{id}', [Saving::class, 'preview']);
    Route::get('/admin/saving/deposit/{id}', [Saving::class, 'deposit']);
    Route::get('/admin/report', [Report::class, 'index']);

});
