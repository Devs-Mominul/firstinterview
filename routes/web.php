<?php

use App\Http\Controllers\PaymentGateways\FlutterwaveController;
use App\Http\Controllers\PaymentGateways\MollieController;
use App\Http\Controllers\PaymentGateways\RazorpayController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentGateways\PaypalController;
use App\Http\Controllers\PaymentGateways\SSLCommerzController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\SubcategoryController;
use App\Subcategory;

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

// Route::get('/', function () {
//     return view('landing');
// })->name('landing');

Route::get('/', function () {
    return view('admin.pages.course.course_category');
})->name('category-page');

Route::get('/add-category', function () {
    $view = view('admin.components.category-form-modal')->render();
    return response()->json([
        'view' => $view
    ]);
})->name('course_category.create');

Route::get('/sub-category', function () {
    return view('admin.pages.course.course_sub_category');
})->name('subcategory-page');

Route::get('/add-sub-category', function () {
    $view = view('admin.components.sub-category-form-modal')->render();
    return response()->json([
        'view' => $view
    ]);
})->name('course_sub_category.create');
//category
Route::get('/category',[CategoryController::class,'categories'])->name('category');
Route::post('/category/store',[CategoryController::class,'categories_store'])->name('category.store');
Route::get('/category/edit/{id}',[CategoryController::class,'categories_edit'])->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class,'categories_update'])->name('category.update');
Route::get('/category/delete/{id}',[CategoryController::class,'categories_delete'])->name('category.delete');
//subcategory
Route::get('/subcategory',[SubcategoryController::class,'subcategory'])->name('subcategory');
Route::post('/subcategory/store',[SubcategoryController::class,'subcategory_store'])->name('subcategory.store');
Route::get('/subcategory/{id}',[SubcategoryController::class,'subcategory_delete'])->name('subcategory.delete');
Route::get('/product',[SubcategoryController::class,'product'])->name('product');
Route::post('/GetCategory',[SubcategoryController::class,'GetCategory']);
