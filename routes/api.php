<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use  App\Http\Controllers\api\authController;
use App\Http\Controllers\ProductImageController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [authController::class,'login']);
    Route::post('logout', [authController::class,'logout']);
    Route::post('refresh', [authController::class,'refresh']);
    Route::post('me', [authController::class,'login']);
    Route::post('register', [authController::class,'register']);

});


Route::get('get/roles',[authController::class,'getRoles']);

Route::post('role/assign',[authController::class,'roleAssign']);

Route::post('visitorcreate',[VisitorController::class, 'visitorcreate']);
Route::get('visitorcount',[VisitorController::class, 'visitorCount']);


//////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/products', [ProductController::class,'index']);
Route::get('/products/{product}', [ProductController::class,'show']);
Route::post('/products', [ProductController::class,'store']);
Route::put('/products/{product}', [ProductController::class,'update']);
Route::delete('/products/{product}', [ProductController::class,'destroy']);

Route::get('/categories', [CategoryController::class,'index']);
Route::get('/categories/{category}', [CategoryController::class,'show']);
Route::post('/categories', [CategoryController::class,'store']);
Route::put('/categories/{category}', [CategoryController::class,'update']);
Route::delete('/categories/{category}', [CategoryController::class,'destroy']);

Route::get('/products/{product}/images', [ProductImageController::class,'index']);
Route::post('/products/{product}/images', [ProductImageController::class,'store']);
Route::delete('/products/{product}/images/{image}', [ProductImageController::class,'destroy']);


Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::post('/cart', [CartController::class,'store'])->name('cart.store');
Route::delete('/cart/{cart}', [CartController::class,'destroy'])->name('cart.destroy');
Route::delete('/empty/cart', [CartController::class,'emptyCart'])->name('cart.empty');





