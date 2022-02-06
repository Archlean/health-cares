<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeedsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MedicineController;
use Faker\Guesser\Name;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/feeds', [FeedsController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authentication'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'save'])->middleware('guest');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/recipe', [RecipeController::class, 'index'])->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::get('/new-recipe', [RecipeController::class, 'recipeMixer'])->middleware('auth');
Route::get('/medicine-list', [MedicineController::class, 'index'])->middleware('auth');
Route::get('/medicine-list/search', [MedicineController::class, 'findMedicine'])->middleware('auth');
