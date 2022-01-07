<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

/**Category */
Route::get('/addCategory', function () {
    return view('addCategory');
});
Route::post('/addCategory/store',[App\Http\Controllers\CategoryController::class, 'add'])->name('addCategory');

Route::get('/viewCategory',[App\Http\Controllers\CategoryController::class, 'view'])->name('viewCategory');


/**Procduct */
Route::get('/addProduct', function () {
    return view('addProduct',['categoryID'=>App\Models\Category::all()]);
});
Route::post('/addProduct/store',[App\Http\Controllers\ProductController::class, 'add'])->name('addProduct');

Route::get('/viewProduct',[App\Http\Controllers\ProductController::class, 'view'])->name('viewProduct');

Route::get('/editProduct/{id}',[App\Http\Controllers\ProductController::class, 'edit'])->name('editProduct');
Route::post('/updateProduct',[App\Http\Controllers\ProductController::class, 'update'])->name('updateProduct');

Route::get('/deleteProduct/{id}',[App\Http\Controllers\ProductController::class, 'delete'])->name('deleteProduct');

Route::get('/productDetail/{id}',[App\Http\Controllers\ProductController::class, 'productDetail'])->name('productDetail');

Route::get('/showProduct',[App\Http\Controllers\ProductController::class, 'show'])->name('showProduct');

Route::post('/products',[App\Http\Controllers\ProductController::class, 'searchProduct'] ) ->name('search.products');

// Cart
Route::post('/addCart',[App\Http\Controllers\CartController::class, 'add'])->name('add.to.cart');
Route::get('/myCart',[App\Http\Controllers\CartController::class, 'view'])->name('viewCart');
Route::post('\checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');

//order
Route::get('/myOrders',[App\Http\Controllers\OrderController::class, 'view'])->name('viewOrder');

Route::get('/pdfReport',[App\Http\Controllers\OrderController::class,'pdfReport'])->name('pdfReport');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
