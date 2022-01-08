<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/detail', function () {
    return view('detail');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [HomeController::class, 'detail']);
Route::get('/profile', [HomeController::class, 'view_profile'])->name('view_profile');
Route::post('/profile/personal', [HomeController::class, 'update_personal_data'])->name('update_personal_data');
Route::post('/profile/contact', [HomeController::class, 'update_contact_data'])->name('update_contact_data');
Route::get('/profile/address', [HomeController::class, 'view_address_book'])->name('view_address_book');
Route::get('/profile/address/new', [HomeController::class, 'create_address'])->name('create_address');
Route::post('/profile/address', [HomeController::class, 'store_address'])->name('store_address');
Route::get('/profile/address/{address}/edit', [HomeController::class, 'edit_address'])->name('edit_address');
Route::patch('/profile/address/{address}/edit', [HomeController::class, 'update_address'])->name('update_address');
Route::delete('/profile/address/{address}/delete', [HomeController::class, 'delete_address'])->name('delete_address');
Route::get('/profile/settings', [HomeController::class, 'view_settings'])->name('view_settings');
Route::post('/change-password', [HomeController::class, 'change_password'])->name('change_password');
Route::delete('/profile/delete', [HomeController::class, 'delete_account'])->name('delete_account');
