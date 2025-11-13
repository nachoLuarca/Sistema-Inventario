<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
Route::get('/', function(){ return redirect()->route('dashboard'); });

# Auth routes (si manual)
Route::get('login', [LoginController::class,'show'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout'])->name('logout');

Route::get('register', [RegisterController::class,'show'])->name('register');
Route::post('register', [RegisterController::class,'register']);

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::post('stock-movements', [StockMovementController::class,'store'])->name('stock-movements.store');
    Route::get('stock-movements', [StockMovementController::class,'index'])->name('stock-movements.index');
});
