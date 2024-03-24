<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::any('refined',[App\Http\Controllers\homeController::class,'refined'])->name('refined')->middleware('auth_login');

Route::any('home',[App\Http\Controllers\homeController::class,'home'])->name('home');
Route::any('dummy',[App\Http\Controllers\homeController::class,'dummy'])->name('dummy');

Route::any('add',[App\Http\Controllers\homeController::class,'add'])->name('add');
Route::any('add1',[App\Http\Controllers\homeController::class,'add1'])->name('add1');

Route::any('save',[App\Http\Controllers\homeController::class,'save'])->name('save');
Route::any('save1',[App\Http\Controllers\homeController::class,'save1'])->name('save1');

Route::any('export',[App\Http\Controllers\homeController::class,'export'])->name('export');
Route::any('pdf_export',[App\Http\Controllers\homeController::class,'pdf_export'])->name('pdf_export');
Route::any('import',[App\Http\Controllers\homeController::class,'import'])->name('import');
Route::any('do_import',[App\Http\Controllers\homeController::class,'do_import'])->name('do_import');


Route::any('edit/{id}',[App\Http\Controllers\homeController::class,'edit'])->name('edit');
Route::any('update',[App\Http\Controllers\homeController::class,'update'])->name('update');
Route::any('delete',[App\Http\Controllers\homeController::class,'delete'])->name('delete');



Route::any('login',[App\Http\Controllers\loginController::class,'login'])->name('login');
Route::any('login_access',[App\Http\Controllers\loginController::class,'login_access'])->name('login_access');
Route::any('logout',[App\Http\Controllers\loginController::class,'logout'])->name('logout');


Route::any('forgot_password',[App\Http\Controllers\loginController::class,'forgot_password'])->name('forgot_password');
Route::any('do_forgot_password',[App\Http\Controllers\loginController::class,'do_forgot_password'])->name('do_forgot_password');
Route::any('reset_password/{token}',[App\Http\Controllers\loginController::class,'reset_password'])->name('reset_password');
Route::any('do_reset_password',[App\Http\Controllers\loginController::class,'do_reset_password'])->name('do_reset_password');
