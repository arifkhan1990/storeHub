<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeOptionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\DeliveryInfoController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryServiceProviderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\GainPointHistoryController;
use App\Http\Controllers\AccessPointHistoryController;
use App\Http\Controllers\PointCurrencyController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route
Route::prefix('v1')->group(function () {
    Route::resource('accounts', AccountController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('stores', StoreController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('sub-categories', SubCategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('vendors', VendorController::class);
    Route::resource('attributes', AttributeController::class);
    Route::resource('attribute-options', AttributeOptionController::class);
    Route::resource('products', ProductController::class);
    Route::resource('product-details', ProductDetailController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order-details', OrderDetailController::class);
    Route::resource('delivery-infos', DeliveryInfoController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('delivery-service-providers', DeliveryServiceProviderController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('events', EventController::class);
    Route::resource('points', PointController::class);
    Route::resource('gain-point-histories', GainPointHistoryController::class);
    Route::resource('access-point-histories', AccessPointHistoryController::class);
    Route::resource('point-currencies', PointCurrencyController::class);
});
