<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Models\User;
use App\Models\booktbl;
use App\Models\categorytbl;
use App\Models\authortbl;
use App\Models\shoppingcarttbl;

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
    $items =shoppingcarttbl::all();
    $allrecord = User::all();
    $category = categorytbl::all();
    $book = booktbl::all();  
       return view('home',compact('book','category','allrecord','items'));
});

Auth::routes();

Route::get('/clienthome', [App\Http\Controllers\HomeController::class, 'clientfunction'])->name('clienthome');
Route::get('/adminhome', [App\Http\Controllers\HomeController::class, 'adminindex'])->name('adminhome');



Route::get('/bookpdf',[AdminController::class,'bookpdffunction']);
Route::get('/userprofile',[AdminController::class,'userprofile']);
Route::get('/userlist',[AdminController::class,'fetchfunction']);
Route::post('/userlist',[AdminController::class,'calender']);
Route::get('/delete/{id}',[AdminController::class,'deletefunction']);
Route::get('/update/{id}',[AdminController::class,'updatefunction']);
Route::post('/edit/{id}',[AdminController::class,'edit']);
Route::get('/importexport',[AdminController::class,'importexporty']);
Route::post('/import',[AdminController::class,'import']);
Route::get('/export',[AdminController::class,'exporty']);



Route::get('/addbook',[AdminController::class,'addbookfunction']);
Route::post('/addbook',[AdminController::class,'addbook']);
Route::post('/generatepdf/{id}',[AdminController::class,'generatePDF']);
Route::get('/fetchbook', [App\Http\Controllers\AdminController::class, 'fetchbookfunction'])->name('fetchbook');
Route::get('/bookdelete/{id}',[AdminController::class,'deletebookfunction']);
Route::post('/bookupdate',[AdminController::class,'bookupdatefunction']);
Route::post('/bookedit',[AdminController::class,'bookedit']);


Route::get('/clientsbook', [App\Http\Controllers\ClientController::class, 'clientsbookfunction'])->name('clientsbook');
Route::get('/clientaddbook',[ClientController::class,'clientaddbookfunction']);
Route::post('/clientaddbook',[ClientController::class,'clientaddbook']);
Route::get('/orderlist', [App\Http\Controllers\ClientController::class, 'orderlistfunction'])->name('orderlist');
Route::get('/checkout',[ClientController::class,'checkoutfunction']);
Route::post('/checkout',[ClientController::class,'checkoutpost']);

Route::get('/addtocart/{id}',[ClientController::class,'addtocart']);
Route::get('/viewdelete/{id}',[ClientController::class,'deletecart']);