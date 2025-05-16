<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendProfileController;


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

Route::group(['middleware' => 'auth'] , function(){
    Route::get('/dashboard' , [DashboardController::class , 'index'])->name('dashbaord');
    Route::put('/profile',[FrontendProfileController::class, 'updateProfile'])->name('profile.update');
});


require __DIR__.'/auth.php';



Route::get('/' , [FrontendController::class, 'index'])->name('home');