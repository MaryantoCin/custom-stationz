<?php

use App\Http\Controllers\AdminController;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('view_mouse_detail');

Route::middleware(['auth'])->group(function () {
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
    Route::post('/detail/add', [HomeController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('/cart', [HomeController::class, 'view_cart'])->name('view_cart');
    Route::post('/order/detail/{order_detail}/increase', [HomeController::class, 'increase_quantity'])->name('increase_quantity');
    Route::post('/order/detail/{order_detail}/decrease', [HomeController::class, 'decrease_quantity'])->name('decrease_quantity');
    Route::post('/order/checkout/start', [HomeController::class, 'start_checkout'])->name('start_checkout');
    Route::post('/order/checkout/finish', [HomeController::class, 'finish_checkout'])->name('finish_checkout');
    Route::get('/order/checkout', [HomeController::class, 'view_checkout'])->name('view_checkout');
    Route::patch('/order/update/{order}', [HomeController::class, 'update_checkout'])->name('update_checkout');
    Route::get('/order/history', [HomeController::class, 'view_transaction_history'])->name('view_transaction_history');
    Route::get('/payment/confirmation', [HomeController::class, 'view_payment_confirmation'])->name('view_payment_confirmation');
    Route::post('/payment/confirmation', [HomeController::class, 'submit_payment_confirmation'])->name('submit_payment_confirmation');
});


Route::middleware(['admin'])->group(function () {
    Route::get('/admin/product', [AdminController::class, 'admin_view_product'])->name('admin_view_product');
    Route::get('/admin/transaction', [AdminController::class, 'admin_view_transaction'])->name('admin_view_transaction');
    Route::get('/admin/payment', [AdminController::class, 'admin_view_payment'])->name('admin_view_payment');
    Route::post('/admin/payment/{payment}', [AdminController::class, 'admin_confirm_payment'])->name('admin_confirm_payment');
});
