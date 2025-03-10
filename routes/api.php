<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\SubscriptionFormController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserAdditionAddressController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\QuickBooksOnlineController;
use App\Http\Controllers\ShipStationController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\SocialMediaController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [UserController::class, 'register']);
Route::get('/register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('/user',[UserController::class, 'getUser'])->middleware('auth:api');
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:api');
Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->middleware('auth:api');
    Route::match(['post','get'],'add', [UserController::class, 'add'])->middleware('auth:api');
    Route::get('edit/{id}', [UserController::class, 'edit'])->middleware('auth:api');
    Route::post('update/{id}', [UserController::class, 'update']);
    Route::post('updatebillingdefalutaddress/{id}', [UserController::class, 'updateBillingDefalutAddress']);
    Route::delete('delete/{id}', [UserController::class, 'delete']);
    Route::post('updateadminprofile/{id}', [UserController::class, 'updateadminprofile']);
    Route::get('count_users', [UserController::class, 'count_users']);
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::match(['post','get'],'add', [CategoryController::class, 'add']);
    Route::get('edit/{id}', [CategoryController::class, 'edit']);
    Route::post('update/{id}', [CategoryController::class, 'update']);
    Route::delete('delete/{id}', [CategoryController::class, 'delete']);
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::match(['post','get'],'add', [ProductController::class, 'add']);
    Route::get('edit/{id}', [ProductController::class, 'edit']);
    Route::post('update/{id}', [ProductController::class, 'update']);
    Route::delete('delete/{id}', [ProductController::class, 'delete']);
    Route::get('/get_products_on_home_page', [ProductController::class, 'get_products_on_home_page']);
    Route::get('count_products', [ProductController::class, 'count_products']);
});

Route::group(['prefix' => 'pages'], function () {
    Route::get('/', [PageController::class, 'index']);
    Route::match(['post','get'],'add', [PageController::class, 'add']);
    Route::get('edit/{id}', [PageController::class, 'edit']);
    Route::post('update/{id}', [PageController::class, 'update']);
    Route::delete('delete/{id}', [PageController::class, 'delete']);
});

Route::group(['prefix' => 'blogcategories'], function () {
    Route::get('/', [BlogCategoryController::class, 'index']);
    Route::match(['post','get'],'add', [BlogCategoryController::class, 'add']);
    Route::get('edit/{id}', [BlogCategoryController::class, 'edit']);
    Route::post('update/{id}', [BlogCategoryController::class, 'update']);
    Route::delete('delete/{id}', [BlogCategoryController::class, 'delete']);
});

Route::group(['prefix' => 'blogs'], function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::match(['post','get'],'add', [BlogController::class, 'add']);
    Route::get('edit/{id}', [BlogController::class, 'edit']);
    Route::post('update/{id}', [BlogController::class, 'update']);
    Route::delete('delete/{id}', [BlogController::class, 'delete']);
    Route::get('/recentblogs/{id}', [BlogController::class, 'recent_blogs']);
});

Route::group(['prefix' => 'contactforms'], function () {
    Route::get('/', [ContactFormController::class, 'index']);
    Route::match(['post','get'],'add', [ContactFormController::class, 'add']);
    Route::get('edit/{id}', [ContactFormController::class, 'edit']);
    Route::post('update/{id}', [ContactFormController::class, 'update']);
    Route::delete('delete/{id}', [ContactFormController::class, 'delete']);
});

Route::group(['prefix' => 'subscriptionforms'], function () {
    Route::get('/', [SubscriptionFormController::class, 'index']);
    Route::match(['post','get'],'add', [SubscriptionFormController::class, 'add']);
    Route::get('edit/{id}', [SubscriptionFormController::class, 'edit']);
    Route::post('update/{id}', [SubscriptionFormController::class, 'update']);
    Route::delete('delete/{id}', [SubscriptionFormController::class, 'delete']);
});

Route::group(['prefix' => 'carts'], function () {
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    // Route::delete('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    Route::post('getsubtotal', [CartController::class, 'getSubTotal'])->name('cart.getsubtotal');
    Route::post('gettotal', [CartController::class, 'getTotal'])->name('cart.gettotal');
});
Route::group(['prefix' => 'user_addition_addresses'], function () {
    Route::get('/', [UserAdditionAddressController::class, 'index']);
    Route::match(['post','get'],'add', [UserAdditionAddressController::class, 'add']);
    Route::get('edit/{id}', [UserAdditionAddressController::class, 'edit']);
    Route::post('update/{id}', [UserAdditionAddressController::class, 'update']);
    Route::delete('delete/{id}', [UserAdditionAddressController::class, 'delete']);
});
Route::group(['prefix' => 'promocodes'], function () {
    Route::get('/', [PromoCodeController::class, 'index']);
    Route::match(['post','get'],'add', [PromoCodeController::class, 'add']);
    Route::get('edit/{id}', [PromoCodeController::class, 'edit']);
    Route::post('update/{id}', [PromoCodeController::class, 'update']);
    Route::delete('delete/{id}/{code}', [PromoCodeController::class, 'delete']);
    Route::post('apply', [PromoCodeController::class, 'apply']);
});
Route::group(['prefix' => 'orders'], function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::match(['post','get'],'add', [OrderController::class, 'add']);
    Route::get('edit/{id}', [OrderController::class, 'edit']);
    Route::post('update/{id}', [OrderController::class, 'update']);
    Route::delete('delete/{id}/{code}', [OrderController::class, 'delete']);
    Route::get('orderdetail/{id}', [OrderController::class, 'orderdetail']);
    Route::get('orders-file-export', [OrderController::class, 'OrderfileExport'])->name('orders-file-export');
    Route::get('OrderTotalPaymentReceived', [OrderController::class, 'OrderTotalPaymentReceived']);
    Route::get('myorders', [OrderController::class, 'myorders']);
});
Route::group(['prefix' => 'orderitems'], function () {
    Route::get('/', [OrderItemController::class, 'index']);
    Route::match(['post','get'],'add', [OrderItemController::class, 'add']);
    Route::get('edit/{id}', [OrderItemController::class, 'edit']);
    Route::post('update/{id}', [OrderItemController::class, 'update']);
    Route::delete('delete/{id}/{code}', [OrderItemController::class, 'delete']);
});
Route::group(['prefix' => 'quickbooksonline'], function () {
    Route::get('/quickbooks_test', [QuickBooksOnlineController::class, 'quickbooks_test']);
    // Route::get('/', [QuickBooksOnlineController::class, 'index']);
    Route::match(['post','get'],'create_charge', [QuickBooksOnlineController::class, 'create_charge']);
    // Route::get('edit/{id}', [QuickBooksOnlineController::class, 'edit']);
    // Route::post('update/{id}', [QuickBooksOnlineController::class, 'update']);
    // Route::delete('delete/{id}/{code}', [QuickBooksOnlineController::class, 'delete']);
});
Route::group(['prefix' => 'shipstation'], function () {
    Route::get('/', [ShipStationController::class, 'index']);
    Route::match(['post','get'],'create_order', [ShipStationController::class, 'create_order']);
    Route::match(['post','get'],'getUSShippingRates', [ShipStationController::class, 'getUSShippingRates']);
    // Route::get('edit/{id}', [ShipStationController::class, 'edit']);
    // Route::post('update/{id}', [ShipStationController::class, 'update']);
    // Route::delete('delete/{id}/{code}', [ShipStationController::class, 'delete']);
});

Route::group(['prefix' => 'settings'], function () {
    Route::get('/', [SocialMediaController::class, 'index']);
    // Route::match(['post','get'],'add', [SocialMediaController::class, 'add']);
    Route::get('edit/{id}', [SocialMediaController::class, 'edit']);
    Route::post('update/{id}', [SocialMediaController::class, 'update']);
    // Route::delete('delete/{id}', [SocialMediaController::class, 'delete']);
});