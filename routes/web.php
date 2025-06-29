<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Models\User;



//Role Management
Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function(){
        Route::get('/redirects', 'index')->name('redirects');
        
    });
});




Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::post('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//PageController

Route::controller(PageController::class)->group(function(){
    Route::get('/', 'HomePage')->name('homePage'); 
    Route::get('/pages/message-confirmation', 'messageConfirmation')->name('pages.message-confirmation');
    Route::get('/pages/categoryPage/{id}/{slug}', 'categoryPage')->name('pages.categoryPage');
    
     
});



// CategoryController for category
Route::middleware('auth')->group(function () {
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category/index', 'index')->name('category.index');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/store', 'store')->name('category.store');
        Route::get('/category/edit/{id}', 'edit')->name('category.edit');
        Route::post('/category/update', 'update')->name('category.update');
        Route::get('/category/delete/{id}', 'delete')->name('category.delete');

    });
});



// ContactController for Patient
Route::middleware('auth')->group(function () {
    Route::controller(ContactController::class)->group(function(){
        Route::get('/contact/index', 'index')->name('contact.index');
        Route::get('/contact/view/{id}', 'view')->name('contact.view');
        Route::get('/contact/delete/{id}', 'delete')->name('contact.delete');

    });
});


// ContactController without middieware for Patient
    Route::controller(ContactController::class)->group(function(){
        Route::get('/contact/create', 'create')->name('contact.create');
        Route::post('/contact/store', 'store')->name('contact.store');


 });


// PostController
Route::middleware('auth')->group(function () {
    Route::controller(PostController::class)->group(function(){
        Route::get('/post/index', 'index')->name('post.index');
        Route::get('/post/create', 'create')->name('post.create');
        Route::post('/post/store', 'store')->name('post.store');
        Route::get('/post/edit/{id}', 'edit')->name('post.edit');
        Route::post('/post/update', 'update')->name('post.update');
        Route::get('/post/delete/{id}', 'delete')->name('post.delete');

    });
});

Route::get('/category/{id}/products', [PostController::class, 'productsByCategory']);






require __DIR__.'/auth.php';
