<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\SimpleuserController;

// Admin route
Route::get('/categorie',[CategorieController::class,'index'])->name('categorie');
Route::post('/categorie',[CategorieController::class,'store']);

Route::delete('/destroy/{categorie}',[CategorieController::class,'destroy'])->name('destroy');
Route::post('/categorie_update/{id}', [CategorieController::class,'get_update_cat'])->name('categorie_update');
Route::post('/update_cat/{categorie}', [CategorieController::class,'update_cat'])->name('update_cat');

Route::get('/items',[ItemsController::class,'index'])->name('items');
Route::post('/items',[ItemsController::class,'store']);

// likes

Route::post('/like/{item}',[LikeController::class,'store'])->name('like');
Route::post('/unlike/{item}',[LikeController::class,'unlike'])->name('unlike');

// ommetsc
Route::post('/comment/{item}',[CommentController::class,'store'])->name('comment');

// excel

Route::get('/excel',[ItemsController::class,'excel_get_test'])->name('excel');

// stripe

Route::get('stripe', [StripeController::class, 'stripe'])->name('stripe');
Route::post('stripepay/{price}', [StripeController::class, 'stripePost'])->name('stripepay');

// panier
Route::post('panier/{items}',[PanierController::class,'store'])->name('panier');
Route::get('mon_panier',[PanierController::class,'index'])->name('mon_panier');

Route::get('/show_cat/{categorie}',[ItemsController::class,'show_categ'])->name('show_cat');
Route::delete('/delete_item/{id}', [ItemsController::class,'destroy'])->name('delete');

Route::get('/item_simple',[SimpleuserController::class,'index'])->name('item');
Route::get('/details/{item}',[SimpleuserController::class,'index_details'])->name('details');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('admin.home');
})->name('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';