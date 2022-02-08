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
Route::get('/recipe', [RecipeController::class, 'recipeMixer'])->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::get('/new-recipe', [RecipeController::class, 'index'])->middleware('auth');
Route::get('/new-recipe/include/{obatalkes_id}', [RecipeController::class, 'recipeMixerData'])->middleware('auth');
Route::get('/new-recipe/recipe-non-concoction', [RecipeController::class, 'createRecipeNconcoction'])->middleware('auth');
Route::get('/new-recipe/recipe-concoction', [RecipeController::class, 'createRecipeConcoction'])->middleware('auth');

Route::get('/medicine-list', [MedicineController::class, 'index'])->middleware('auth');
Route::get('/medicine-list/search', [MedicineController::class, 'findMedicine'])->middleware('auth');
Route::get('/medicine-list/config-medicine/{obatalkes_id}', [MedicineController::class, 'configMedicine'])->middleware('auth');
Route::get('/medicine-list/find-receipt', [MedicineController::class, 'findMedicine'])->middleware('auth');
Route::get('/medicine-list/info/{obatalkes_id}', [MedicineController::class, 'singleMedicineInfo'])->middleware('auth');
Route::post('/medicine-list/info/order-save/', [MedicineController::class, 'MedicineResolver'])->middleware('auth');
Route::post('/medicine-list/info/order-save/medicine', [MedicineController::class, 'SaveOrderMedicineOnly'])->middleware('auth');

Route::post('/new-recipe/save/{category}', [RecipeController::class, 'saveRecipe'])->middleware('auth');
Route::post('/new-recipe/save', [RecipeController::class, 'saveRecipeOnly'])->middleware('auth');
Route::post('/medicine/save-new', [MedicineController::class, 'saveSchema'])->middleware('auth');
