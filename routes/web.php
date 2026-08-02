<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Admin\OrderController;


Auth::routes();
// home route
Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);
Route::get('/contact',[App\Http\Controllers\Frontend\FrontendController::class,'contact']);
Route::get('/collections',[App\Http\Controllers\Frontend\FrontendController::class,'catagories']);

// Featured Products (must come before {catagory_slug} route)
Route::get('/collections/featured', [App\Http\Controllers\Frontend\FrontendController::class, 'featuredProducts']);

// Collections by category (more general route, must come after specific routes)
Route::get('/collections/{catagory_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'products']);
Route::get('/collections/{catagory_slug}/{product_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'productView']);

// New Arrivals
Route::get('/new-arrivals',[App\Http\Controllers\Frontend\FrontendController::class,'newArrivals']);

Route::post('/contact', function (Request $request) {
    // You can log or store contact form data here
    // For now, just return back with success message
    return back()->with('message', 'Thank you for contacting us!');
});


Route::middleware(['auth'])->group(function(){
    Route::get('/wishlist',[App\Http\Controllers\Frontend\WishlistController::class,'index']);
    Route::get('/cart',[App\Http\Controllers\Frontend\CartController::class,'index']);
    Route::get('/checkout',[App\Http\Controllers\Frontend\CheckoutController::class,'index']);
    Route::get('/orders',[App\Http\Controllers\Frontend\OrderController::class,'index']);
    Route::get('orders/{orderId}',[App\Http\Controllers\Frontend\OrderController::class,'show']);

});

// 
Route::get('thank-you',[App\Http\Controllers\Frontend\FrontendController::class,'thankyou']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
     route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);
     // Settings page
     Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.settings.index');
     Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'store'])->name('admin.settings.store');
     // User management
     Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
         Route::get('users', 'index')->name('admin.users.index');
         Route::get('users/create', 'create')->name('admin.users.create');
         Route::post('users', 'store')->name('admin.users.store');
         Route::get('users/{user_id}/edit', 'edit')->name('admin.users.edit');
         Route::put('users/{user_id}', 'update')->name('admin.users.update');
         Route::delete('users/{user_id}', 'destroy')->name('admin.users.destroy');
     });

    //Catagory group route
    Route::controller(App\Http\Controllers\Admin\CatagoryController::class)->group(function () {
        Route::get('/catagory','index');
        Route::get('/catagory/create','create');
        Route::post('/catagory', 'store');
        Route::get('/catagory/{catagory}/edit', 'edit');
        Route::put('/catagory/{catagory}', 'update');
    });
    //Product group route
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products','index');
        Route::get('/products/create','create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/products/{product_id}/delete', 'destroy');

        Route::get('product-image/{product_image_id}/delete','destroyImage');

        Route::post('product-color/{prod_color_id}','updateProductColorQty');
        Route::get('product-color/{prod_color_id}/delete','deleteProdColor');

    });
    //Color group route
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors','index');
        Route::get('/colors/create','create');
        Route::post('/colors', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color}', 'update');
        Route::get('/colors/{color_id}/delete', 'destroy');
    });
    //Sliders group route
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/sliders','index');
        Route::get('/sliders/create','create');
        Route::post('/sliders/create', 'store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::put('/sliders/{slider}', 'update');
        Route::get('/sliders/{slider_id}/delete', 'destroy');

    });

    



    Route::get('/brands',App\Livewire\Admin\Brand\Index::class);

});
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
});
