<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ReportController;

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


//isGuest
// Route::middleware(['isGuest'])->group(function(){
// Route::get('/', [LandingPageController::class, 'index'])->name('landing_page');
// });

Route::get('/', [LandingPageController::class, 'index'])->name('landing_page');
Route::get('/home', [ReportController::class, 'index'])->name('home');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::get('register',[UserController::class,'register'])->name('register');


Route::post('/store-report', [ReportController::class, 'store'])->name('report.store');
Route::get('/create-report', [ReportController::class, 'create'])->name('report.create');








