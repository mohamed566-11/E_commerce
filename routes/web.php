<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\dashboard_deliverycontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\websitecontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\admincontactcontroller;
use App\Http\Controllers\contactus;
use App\Http\Controllers\notificationorderscontroller;
use App\Http\Controllers\ordercontroller;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\productReviewcontroller;
use App\Http\Controllers\ReviewsAdmincontroller;
use App\Http\Controllers\sociallogincontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\UserProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){

        Route::group([
            'middleware' => ['isadmin','auth'],
            'prefix' => 'admin',
        ],function(){
            Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
            Route::resource('/categories',CategoryController::class);
            Route::resource('/products',ProductController::class);
            Route::resource('/users',usercontroller::class);
            Route::get('/admins',[usercontroller::class,'admins'])->name('admins');
            Route::get('/admins/create',[usercontroller::class,'adminscreate'])->name('admins.create');
            Route::post('/admins/store',[usercontroller::class,'adminsstore'])->name('admins.store');
            Route::post('/admins/update/{id}',[usercontroller::class,'adminsupdate'])->name('admins.update');
            Route::get('/admins/edit/{id}',[usercontroller::class,'adminsedit'])->name('admins.edit');
            Route::post('/deliveries/update/{id}',[usercontroller::class,'deliveriesupdate'])->name('deliveries.update');
            Route::get('/deliveries/edit/{id}',[usercontroller::class,'deliveriesedit'])->name('deliveries.edit');
            Route::get('/admins/show/{id}',[usercontroller::class,'showadmins'])->name('showadmins');
            Route::get('/deliveries',[usercontroller::class,'deliveries'])->name('deliveries');
            Route::get('/deliveries/create',[usercontroller::class,'deliveriescreate'])->name('deliveries.create');
            Route::post('/delivery/store',[usercontroller::class,'deliverystore'])->name('delivery.store');
            Route::get('/deliveries/show/{id}',[usercontroller::class,'showdeliveries'])->name('showdeliveries');
            Route::get('/deliveryOrders/{id}',[usercontroller::class,'deliveryOrders'])->name('deliveryOrders');
            Route::get('/orders',[ ordercontroller::class,'index'])->name('orders.index');
            Route::resource('/reviews_product', ReviewsAdmincontroller::class);
            Route::get('/orderdetails/{id}',[ ordercontroller::class,'orderdetails'])->name('orderdetails');
            Route::patch('/addToDelivery/{id}',[ ordercontroller::class,'addToDelivery'])->name('order.addToDelivery');

            Route::get('/orderdetailsnotify/{id}',[notificationorderscontroller::class,'orderdetailsfornotification'])->name('orderdetailsfornotification');
            Route::get('/markall',[notificationorderscontroller::class,'markallnotify'])->name('markallnotify');
            Route::patch('/editstatus/{id}',[ ordercontroller::class,'editstatus'])->name('order.edit');
            Route::delete('/destroy/{id}',[ ordercontroller::class,'destroy'])->name('order.destroy');
            Route::get('contact',[admincontactcontroller::class,'index'])->name('contact.index');
            Route::delete('contact/destroy/{id}',[admincontactcontroller::class,'destroy'])->name('contact.destroy');
            Route::patch('contact/update/{id}',[admincontactcontroller::class,'update'])->name('contact.update');
        });

    Route::get('/', [websitecontroller::class,'index'])->name('home');
    Route::get('/categories', [websiteController::class, 'getCategories'])->name('get_categories');
    Route::get('/products', [websiteController::class, 'getproducts'])->name('getproducts');
    Route::get('/category/{slug}', [websiteController::class, 'getCategoryBySlug'])->name('get_category_slug');
    Route::get('/category/{category_slug}/{product_slug}', [websiteController::class, 'getProductBySlug'])->name('get_product_slug');
    Route::post('/product/add_to_cart', [AddToCartController::class, 'addToCart'])->name('product.addToCart');
    Route::resource('/productReview',productReviewcontroller::class);

    Route::group([
        'middleware' => ['auth'],

    ],function(){
          //////////////////////////////
        Route::middleware(['is_delivery'])->group(function () {
            Route::get('dashboard_delivery',[dashboard_deliverycontroller::class,'index'])->name('dashboard_delivery');
            Route::get('/delivery/search', [dashboard_deliverycontroller::class, 'search'])->name('delivery.search');
            Route::get('/delivery/orderdetails/{id}', [dashboard_deliverycontroller::class, 'showmyorders'])->name('delivery.orderdetails');
            Route::get('/delivery/editstatus/{id}',[ dashboard_deliverycontroller::class,'editstatus'])->name('order.editdelivery');
            Route::get('/delivery_orders',[ ordercontroller::class,'delivery_orders'])->name('delivery_orders');

        });
        //////////////////////////////
        Route::get('cart',[AddToCartController::class,'index'])->name('cart.index');
        Route::delete('cart/destroy/{id}',[AddToCartController::class,'destroy'])->name('cart.destroy');
        Route::post('cart/update',[AddToCartController::class,'update'])->name('cart.update');
        Route::get('checkout/',[CheckOutController::class,'index'])->name('checkout.index');
        Route::post('checkout/CreateOrder',[CheckOutController::class,'CreateOrder'])->name('createorder');
        // Route::get('payment',[CheckOutController::class,'payment'])->name('payment');
        Route::get('/website/contact', [contactus::class,'index'])->name('contact');
        Route::post('/website/contact/send', [contactus::class,'store'])->name('contact.store');
        Route::get('Myoreders',[ordercontroller::class,'showmyorders'])->name('showmyorders');
        Route::get('orderdetails/{id}',[ordercontroller::class,'frontorderdetails'])->name('frontorderdetails');
        Route::get('/CancelOrder/{id}',[ ordercontroller::class,'CancelOrder'])->name('CancelOrder');

        ////////////////

Route::get('payment', [paymentController::class, 'payment'])->name('payment');
Route::get('payment-success', [paymentController::class, 'success'])->name('payment.success');
Route::get('payment-cancel', [paymentController::class, 'cancel'])->name('payment.cancel');
    });


    });

    Route::get('auth/{provider}/redirect',[sociallogincontroller::class,'redirect'])
    ->name('auth.socilaite.redirect');
    Route::get('auth/{provider}/callback',[sociallogincontroller::class,'callback'])
    ->name('auth.socilaite.callback');



    Route::get('/website/about-us', function () {
        return view('website.about-us');
    })->name('about');

