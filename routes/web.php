<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

//frontend
Route::group(['middleware' => 'guest'], function(){
    Route::get('/', [App\Http\Controllers\Frontend\homeController::class, 'index'])->name('home');
    // car category
    Route::get('/category/{name}', [App\Http\Controllers\Frontend\homeController::class, 'bodyCategory'])->name('bodycategory'); 
    Route::get('/sale', [App\Http\Controllers\Frontend\saleController::class, 'index'])->name('sale');
    Route::post('/sale', [App\Http\Controllers\Frontend\saleController::class, 'searchResult'])->name('sale.search');

    //car details
    Route::get('/details/{id}', [App\Http\Controllers\Frontend\carListController::class, 'detail'])->name('carDetails'); 

    //company introduce
    Route::get('/companyintro', [App\Http\Controllers\Frontend\companyIntro::class, 'index'])->name('companyIntroduce');
    Route::get('/companyintro/{id}', [App\Http\Controllers\Frontend\companyIntro::class, 'details'])->name('companyIntroduce.details');

    //Recruitment of listed stores
    Route::group(['prefix' => 'membership'], function(){
        Route::get('/', [App\Http\Controllers\Frontend\membership::class, 'index'])->name('membership');
        Route::get('/dealer', [App\Http\Controllers\Frontend\membership::class, 'dealer'])->name('membership.dealer');
        Route::get('/dealer/contact-form', [App\Http\Controllers\Frontend\membership::class, 'dealerShow'])->name('dealer.contact.form');
        Route::post('/dealer/contact-form', [App\Http\Controllers\Frontend\membership::class, 'dealerStoreForm'])->name('dealer.contact.email');

        Route::get('/shipping', [App\Http\Controllers\Frontend\membership::class, 'shipping'])->name('membership.shipping');
        Route::get('/shipping/contact-form', [App\Http\Controllers\Frontend\membership::class, 'shippingShow'])->name('shipping.contact.form');
        Route::post('/shipping/contact-form', [App\Http\Controllers\Frontend\membership::class, 'shippingStoreForm'])->name('shipping.contact.email');
    });

    Route::get('/rent', [App\Http\Controllers\Frontend\rentController::class, 'index'])->name('rent');
    Route::get('/rentflow', [App\Http\Controllers\Frontend\rentController::class, 'rentFlow'])->name('rentFlow');
    Route::get('/bulletinboard', [App\Http\Controllers\Frontend\bulletinController::class, 'index'])->name('bulletinBoard');
    Route::get('/purchase', [App\Http\Controllers\Frontend\purchaseController::class, 'index'])->name('purchase');
    Route::get('/purchaseflow', [App\Http\Controllers\Frontend\purchaseController::class, 'purchaseFlow'])->name('purchaseFlow');
    Route::get('/faq', [App\Http\Controllers\Frontend\faqController::class, 'index'])->name('faq');
    Route::get('/store', [App\Http\Controllers\Frontend\storeController::class, 'index'])->name('store');
});


//admin
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'root'])->name('root')->middleware('checkRole');
    Route::get('/dashboard', [App\Http\Controllers\Admin\dashboardController::class, 'index'])->name('dashboard')->middleware('checkRole');
    
    //user lists
    Route::get('/userlists', [App\Http\Controllers\Admin\userListController::class, 'index'])->name('userlists')->middleware('checkRole');
    Route::post('/userlists/create', [App\Http\Controllers\Admin\userListController::class, 'userCreate'])->name('userlists.create')->middleware('checkRole');
    Route::post('/userlists/edit', [App\Http\Controllers\Admin\userListController::class, 'userEdit'])->name('userlists.edit')->middleware('checkRole');
    Route::post('/userlists/delete', [App\Http\Controllers\Admin\userListController::class, 'userDelete'])->name('userlists.delete')->middleware('checkRole');
    //company lists
    Route::get('/company', [App\Http\Controllers\Admin\companyController::class, 'index'])->name('company.index')->middleware('checkRole');
    Route::get('/company/create', [App\Http\Controllers\Admin\companyController::class, 'create'])->name('company.create');
    Route::get('/company/details/{id}', [App\Http\Controllers\Admin\companyController::class, 'details'])->name('company.details'); 
    Route::get('/company/edit/{id}', [App\Http\Controllers\Admin\companyController::class, 'edit'])->name('company.edit');
    Route::post('/company/store', [App\Http\Controllers\Admin\companyController::class, 'store'])->name('company.store'); 
    Route::post('/company/photo_store', [App\Http\Controllers\Admin\companyController::class, 'photoStore'])->name('company.photo_store'); 
    Route::post('/company/photo_destroy', [App\Http\Controllers\Admin\companyController::class, 'photoDestroy'])->name('company.photo_destroy'); 
    //vehicle lists
    Route::get('/vehicle', [App\Http\Controllers\Admin\vehicleController::class, 'index'])->name('vehicle.index');
    Route::get('/vehicle/create', [App\Http\Controllers\Admin\vehicleController::class, 'create'])->name('vehicle.create');
    Route::get('/vehicle/details/{id}', [App\Http\Controllers\Admin\vehicleController::class, 'details'])->name('vehicle.details');
    Route::get('/vehicle/edit/{id}', [App\Http\Controllers\Admin\vehicleController::class, 'edit'])->name('vehicle.edit');
    Route::post('/vehicle/photo_store/{id}', [App\Http\Controllers\Admin\vehicleController::class, 'photoStore'])->name('vehicle.photo_store');
    Route::post('/vehicle/photo_destroy', [App\Http\Controllers\Admin\vehicleController::class, 'photoDestroy'])->name('vehicle.photo_destroy'); 
    Route::post('/vehicle/create_store', [App\Http\Controllers\Admin\vehicleController::class, 'create_store'])->name('vehicle.create_store'); 
    Route::post('/vehicle/edit_store', [App\Http\Controllers\Admin\vehicleController::class, 'edit_store'])->name('vehicle.edit_store'); 
    Route::post('/vehicle/destroy', [App\Http\Controllers\Admin\vehicleController::class, 'destroy'])->name('vehicle.destroy'); 
    //Bulletin board 
    Route::get('/bulletin', [App\Http\Controllers\Admin\bulletinController::class, 'index'])->name('bulletin.index');
    Route::get('/bulletin/details/{id}', [App\Http\Controllers\Admin\bulletinController::class, 'details'])->name('bulletin.details');
    Route::get('/bulletin/add', [App\Http\Controllers\Admin\bulletinController::class, 'add'])->name('bulletin.add');
    Route::get('/bulletin/edit/{id}', [App\Http\Controllers\Admin\bulletinController::class, 'edit'])->name('bulletin.edit');
    Route::post('/bulletin/store', [App\Http\Controllers\Admin\bulletinController::class, 'store'])->name('bulletin.store');
    Route::post('/bulletin/destroy', [App\Http\Controllers\Admin\bulletinController::class, 'destroy'])->name('bulletin.destroy');
});

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation test1
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
