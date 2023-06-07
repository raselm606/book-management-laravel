<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\AuthorsController;
use App\Http\Controllers\backend\BooksController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoriesController;
use App\Http\Controllers\backend\CategoriesTestController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\PublishersController;
use App\Http\Controllers\backend\SubCategoriesTestController;
use App\Http\Controllers\backend\SubSubCategories;
use App\Http\Controllers\backend\SubSubCategoriesController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\UserController;
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

// front pages
Route::get('/',[HomeController::class,'Index'])->name('index');
Route::get('/books/single',[HomeController::class,'bookSingle'])->name('book-single');
Route::get('books/categories/{slug}',[CategoriesController::class,'show'])->name('category.show');
Route::get('books/category/{slug}',[CategoriesTestController::class,'show'])->name('test.category.show');

Route::get('login',[UserController::class,'login'])->name('login');
Route::post('login',[UserController::class,'loginUser'])->name('login');
Route::get('signup',[UserController::class,'signup'])->name('signup');
Route::post('signup',[UserController::class,'signupUser'])->name('signup');

//user dashboard pages
Route::group(['prefix' => '/', 'middleware'=>'isUser'], function(){
    Route::get('logout',[UserController::class,'submitLogout'])->name('logout');
    Route::get('profile',[HomeController::class,'profile'])->name('profile');
    Route::get('order-book',[HomeController::class,'orderbook'])->name('order.book');
    Route::get('upload',[HomeController::class,'uploadbook'])->name('upload.book');
});


//admin pagesss
Route::group(['prefix' => 'admin', 'middleware'=>'isAdmin'], function(){
    Route::get('/',[PageController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[PageController::class,'profile'])->name('admin.profile');
    Route::get('signup',[AdminController::class,'signup'])->name('admin.signup');

    Route::get('books',[BooksController::class,'index'])->name('admin.books');
    Route::get('books/{id}',[BooksController::class,'show'])->name('admin.books.show');

    Route::group(['prefix' => 'authors'], function(){
        Route::get('/',[AuthorsController::class,'index'])->name('admin.authors');
        Route::get('{id}',[AuthorsController::class,'show'])->name('admin.authors.show');
        Route::post('store',[AuthorsController::class,'store'])->name('admin.authors.store');
        Route::post('update/{id}',[AuthorsController::class,'update'])->name('admin.authors.update');
        Route::post('delete/{id}',[AuthorsController::class,'destroy'])->name('admin.authors.destroy');
    });

    Route::group(['prefix'=> 'categories'], function(){
        Route::get('/',[CategoriesController::class,'index'])->name('admin.category');
        Route::post('store',[CategoriesController::class,'store'])->name('admin.category.store');
        Route::post('update/{id}',[CategoriesController::class,'update'])->name('admin.category.update');
        Route::post('delete/{id}',[CategoriesController::class,'destroy'])->name('admin.category.destroy');
    });

    Route::group(['prefix'=> 'publishers'], function(){
        Route::get('/',[PublishersController::class,'index'])->name('admin.publishers');
        Route::get('{id}',[PublishersController::class,'show'])->name('admin.publishers.show');
        Route::post('store',[PublishersController::class,'store'])->name('admin.publishers.store');
        Route::post('update/{id}',[PublishersController::class,'update'])->name('admin.publishers.update');
        Route::post('delete/{id}',[PublishersController::class,'destroy'])->name('admin.publishers.destroy');
    });

    //test category
    Route::group(['prefix'=> 'category'], function(){
        Route::get('/',[CategoriesTestController::class,'index'])->name('admin.test.category');
        Route::post('store',[CategoriesTestController::class,'store'])->name('admin.test.category.store');
        Route::post('update/{id}',[CategoriesTestController::class,'update'])->name('admin.test.category.update');
        Route::post('delete/{id}',[CategoriesTestController::class,'destroy'])->name('admin.test.category.destroy');
    });

    //test sub category
    Route::group(['prefix'=> 'subcategory'], function(){
        Route::get('/',[SubCategoriesTestController::class,'index'])->name('admin.test.subcategory');
        Route::post('store',[SubCategoriesTestController::class,'store'])->name('admin.test.subcategory.store');
        Route::post('update/{id}',[SubCategoriesTestController::class,'update'])->name('admin.test.subcategory.update');
        Route::post('delete/{id}',[SubCategoriesTestController::class,'destroy'])->name('admin.test.subcategory.destroy');
    });
    //test sub sub category
    Route::group(['prefix'=> 'subsubcategory'], function(){
        Route::get('/',[SubSubCategoriesController::class,'index'])->name('admin.test.subsubcategory');
        Route::post('store',[SubSubCategoriesController::class,'store'])->name('admin.test.subsubcategory.store');
        Route::post('update/{id}',[SubSubCategoriesController::class,'update'])->name('admin.test.subsubcategory.update');
        Route::post('delete/{id}',[SubSubCategoriesController::class,'destroy'])->name('admin.test.subsubcategory.destroy');
        Route::get('ajax/{category_id}',[SubSubCategoriesController::class,'getSubCategory']);
    });
    //all brand
    Route::group(['prefix'=> 'brand'], function(){
        Route::get('/',[BrandController::class,'index'])->name('admin.all.brand');
        Route::get('add',[BrandController::class,'create'])->name('admin.add.brand');
        Route::post('add',[BrandController::class,'store'])->name('admin.add.brand');
        Route::get('edit-brand/{id}',[BrandController::class,'editWork'])->name('brand.edit');
        Route::post('update/{id}',[BrandController::class,'update'])->name('admin.update.brand');
        Route::post('delete/{id}',[BrandController::class,'destroy'])->name('admin.delete.brand');
    });





});

Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('admin/login',[AdminController::class,'adminLogin'])->name('admin.login');
Route::get('admin/logout',[AdminController::class,'submitLogout'])->name('admin.logout');
Route::get('admin/reset',[AdminController::class,'forgetPass'])->name('admin.reset');


