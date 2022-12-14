<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Livewire\Admin\Brand\Index;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Frontend
 Route::get('/', [FrontendController::class, 'index']);
 Route::get('collections', [FrontendController::class, 'categories']);
 Route::get('/collections/{category_slug}', [FrontendController::class, 'products']);
 Route::get('/collections/{category_slug}/{product_slug}', [FrontendController::class, 'productsView']);

//Frontend wishlist
 Route::middleware(['auth'])->group(function (){
     Route::get('wishlist', [WishlistController::class, 'index'] );
     Route::get('cart', [CartController::class, 'index']);
 });


//HomeController
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Sliders

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){

    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::controller(SliderController::class)->group(function (){
      Route::get('sliders', 'index');
      Route::get('sliders/create', 'create');
      Route::post('sliders/create', 'store');
      Route::get('sliders/{slider}/edit', 'edit');
      Route::put('sliders/{slider}', 'update');
      Route::get('sliders/{slider}/delete', 'destroy');
    });


   //Category

    Route::controller(CategoryController::class)->group(function (){
        Route::get('/category','index');
        Route::get('/category/create','create');
        Route::post('/category','store');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}','update');
    });


   //Product
    Route::controller(ProductController::class)->group(function (){
        Route::get('/products','index');
        Route::get('/products/create', 'create');
        Route::post('/products','store');
        Route::get('/products/{product}/edit','edit');
        Route::put('/products/{product}', 'update');
        Route::get('products/{product_id}/delete', 'destroy');
        Route::get('product-image/{product_image_id}/delete','destroyImage');

        Route::post('product-color/{prod_color_id}', 'updateProdColorQuantity');
        Route::get('product-color/{prod_color_id}/delete', 'deleteProdColor');
    });

  // Brands
   Route::get('/brands', Index::class );


    // Color
    Route::controller(ColorController::class)->group(function (){
        Route::get('/colors','index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit','edit');
        Route::put('/colors/{color_id}','update');
        Route::get('/colors/{color_id}/delete', 'destroy');


    });

});
