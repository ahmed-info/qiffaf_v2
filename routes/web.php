<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\CoverController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageproductController;
use App\Http\Controllers\ModeelController;
use App\Http\Controllers\ModeeldetailController;
use App\Http\Controllers\SocialmediaController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ContactController;
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
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'index'])->name('mainHome');
Route::get('aboutUs', [MainController::class, 'aboutUs'])->name('aboutUs');
Route::get('globalPartener', [MainController::class, 'globalPartener'])->name('globalPartener');
Route::get('eventNews', [MainController::class, 'eventNews'])->name('eventNews');
Route::get('contactUs', [MainController::class, 'contactUs'])->name('contactUs');
Route::get('categoryItem', [MainController::class, 'categoryItem'])->name('categoryItem');
Route::get('old', [MainController::class, 'old'])->name('old');
Route::get('/dashboard', [DepartmentController::class, 'dashboard'])->name('dashboard');
Route::get('department/{id}',[MainController::class, 'departmentShow'])->name('department.show');
Route::get('product/{id}',[MainController::class, 'productShow'])->name('product.show');
Route::get('company/{id}',[MainController::class, 'companyShow'])->name('company.show');
Route::get('modeel/{id}',[MainController::class, 'modeelShow'])->name('modeel.show');
Route::get('event/{id}',[MainController::class, 'eventShow'])->name('event.show');
// Route::get('pdf/{pp}',function($pp){
//     return "my ok";
// })->name('mypdf');


Route::get('dashboard/slide/list',[SlideController::class,'list'])->name('dashboard.slide.list');
Route::get('dashboard/slide/create',[SlideController::class,'create'])->name('dashboard.slide.create');
Route::post('dashboard/slide/store',[SlideController::class,'store'])->name('dashboard.slide.store');
Route::get('dashboard/slide/edit/{id}',[SlideController::class, 'edit'])->name('dashboard.slide.edit');
Route::put('dashboard/slide/update/{id}',[SlideController::class, 'update'])->name('dashboard.slide.update');
Route::delete('dashboard/slide/destroy/{id}',[SlideController::class, 'destroy'])->name('dashboard.slide.destroy');

Route::get('dashboard/cover/list',[CoverController::class,'list'])->name('dashboard.cover.list');
Route::get('dashboard/cover/create',[CoverController::class,'create'])->name('dashboard.cover.create');
Route::post('dashboard/cover/store',[CoverController::class,'store'])->name('dashboard.cover.store');
Route::get('dashboard/cover/edit',[CoverController::class, 'edit'])->name('dashboard.cover.edit');
Route::put('dashboard/cover/update/{id}',[CoverController::class, 'update'])->name('dashboard.cover.update');
Route::delete('dashboard/cover/destroy/{id}',[CoverController::class, 'destroy'])->name('dashboard.cover.destroy');

Route::get('dashboard/aboutus/list',[AboutusController::class,'list'])->name('dashboard.aboutus.list');
Route::get('dashboard/aboutus/create',[AboutusController::class,'create'])->name('dashboard.aboutus.create');
Route::post('dashboard/aboutus/store',[AboutusController::class,'store'])->name('dashboard.aboutus.store');
Route::get('dashboard/aboutus/edit',[AboutusController::class, 'edit'])->name('dashboard.aboutus.edit');
Route::put('dashboard/aboutus/update/{id}',[AboutusController::class, 'update'])->name('dashboard.aboutus.update');
Route::delete('dashboard/aboutus/destroy/{id}',[AboutusController::class, 'destroy'])->name('dashboard.aboutus.destroy');

Route::get('dashboard/event/list',[EventController::class,'list'])->name('dashboard.event.list');
Route::get('dashboard/event/create',[EventController::class,'create'])->name('dashboard.event.create');
Route::post('dashboard/event/store',[EventController::class,'store'])->name('dashboard.event.store');
Route::get('dashboard/event/edit/{id}',[EventController::class, 'edit'])->name('dashboard.event.edit');
Route::put('dashboard/event/update/{id}',[EventController::class, 'update'])->name('dashboard.event.update');
Route::delete('dashboard/event/destroy/{id}',[EventController::class, 'destroy'])->name('dashboard.event.destroy');

Route::get('dashboard/customer/list',[CustomerController::class,'list'])->name('dashboard.customer.list');
Route::get('dashboard/customer/create',[CustomerController::class,'create'])->name('dashboard.customer.create');
Route::post('dashboard/customer/store',[CustomerController::class,'store'])->name('dashboard.customer.store');
Route::get('dashboard/customer/edit/{id}',[CustomerController::class, 'edit'])->name('dashboard.customer.edit');
Route::put('dashboard/customer/update/{id}',[CustomerController::class, 'update'])->name('dashboard.customer.update');
Route::delete('dashboard/customer/destroy/{id}',[CustomerController::class, 'destroy'])->name('dashboard.customer.destroy');

Route::get('dashboard/department/list',[DepartmentController::class,'list'])->name('dashboard.department.list');
Route::get('dashboard/department/create',[DepartmentController::class,'create'])->name('dashboard.department.create');
Route::post('dashboard/department/store',[DepartmentController::class,'store'])->name('dashboard.department.store');
Route::get('dashboard/department/edit/{id}',[DepartmentController::class, 'edit'])->name('dashboard.department.edit');
Route::put('dashboard/department/update/{id}',[DepartmentController::class, 'update'])->name('dashboard.department.update');
Route::delete('dashboard/department/destroy/{id}',[DepartmentController::class, 'destroy'])->name('dashboard.department.destroy');

Route::get('dashboard/company/list',[CompanyController::class,'list'])->name('dashboard.company.list');
Route::get('dashboard/company/create',[CompanyController::class,'create'])->name('dashboard.company.create');
Route::post('dashboard/company/store',[CompanyController::class,'store'])->name('dashboard.company.store');
Route::get('dashboard/company/edit/{id}',[CompanyController::class, 'edit'])->name('dashboard.company.edit');
Route::put('dashboard/company/update/{id}',[CompanyController::class, 'update'])->name('dashboard.company.update');
Route::delete('dashboard/company/destroy/{id}',[CompanyController::class, 'destroy'])->name('dashboard.company.destroy');

Route::get('dashboard/product/list',[ProductController::class,'list'])->name('dashboard.product.list');
Route::get('dashboard/product/create',[ProductController::class,'create'])->name('dashboard.product.create');
Route::post('dashboard/product/store',[ProductController::class,'store'])->name('dashboard.product.store');
Route::get('dashboard/product/edit/{id}',[ProductController::class, 'edit'])->name('dashboard.product.edit');
Route::put('dashboard/product/update/{id}',[ProductController::class, 'update'])->name('dashboard.product.update');
Route::delete('dashboard/product/destroy/{id}',[ProductController::class, 'destroy'])->name('dashboard.product.destroy');

Route::get('dashboard/imageproduct/list',[ImageproductController::class,'list'])->name('dashboard.imageproduct.list');
Route::get('dashboard/imageproduct/create',[ImageproductController::class,'create'])->name('dashboard.imageproduct.create');
Route::post('dashboard/imageproduct/store',[ImageproductController::class,'store'])->name('dashboard.imageproduct.store');
Route::get('dashboard/imageproduct/edit/{id}',[ImageproductController::class, 'edit'])->name('dashboard.imageproduct.edit');
Route::put('dashboard/imageproduct/update/{id}',[ImageproductController::class, 'update'])->name('dashboard.imageproduct.update');
Route::delete('dashboard/imageproduct/destroy/{id}',[ImageproductController::class, 'destroy'])->name('dashboard.imageproduct.destroy');

Route::get('dashboard/modeel/list',[ModeelController::class,'list'])->name('dashboard.modeel.list');
Route::get('dashboard/modeel/create',[ModeelController::class,'create'])->name('dashboard.modeel.create');
Route::post('dashboard/modeel/store',[ModeelController::class,'store'])->name('dashboard.modeel.store');
Route::get('dashboard/modeel/edit/{id}',[ModeelController::class, 'edit'])->name('dashboard.modeel.edit');
Route::put('dashboard/modeel/update/{id}',[ModeelController::class, 'update'])->name('dashboard.modeel.update');
Route::delete('dashboard/modeel/destroy/{id}',[ModeelController::class, 'destroy'])->name('dashboard.modeel.destroy');



Route::get('dashboard/modeeldetail/list',[ModeeldetailController::class,'list'])->name('dashboard.modeeldetail.list');
Route::get('dashboard/modeeldetail/create',[ModeeldetailController::class,'create'])->name('dashboard.modeeldetail.create');
Route::post('dashboard/modeeldetail/store',[ModeeldetailController::class,'store'])->name('dashboard.modeeldetail.store');
Route::get('dashboard/modeeldetail/edit/{id}',[ModeeldetailController::class, 'edit'])->name('dashboard.modeeldetail.edit');
Route::put('dashboard/modeeldetail/update/{id}',[ModeeldetailController::class, 'update'])->name('dashboard.modeeldetail.update');
Route::delete('dashboard/modeeldetail/destroy/{id}',[ModeeldetailController::class, 'destroy'])->name('dashboard.modeeldetail.destroy');

Route::get('dashboard/visit/list',[VisitController::class,'list'])->name('dashboard.visit.list');
Route::post('dashboard/visit/store',[VisitController::class,'store'])->name('visit.store');
Route::delete('dashboard/visit/destroy/{id}',[VisitController::class, 'destroy'])->name('dashboard.visit.destroy');

Route::get('dashboard/socialMedia/list',[SocialmediaController::class,'list'])->name('dashboard.socialmedia.list');
Route::get('dashboard/socialMedia/create',[SocialmediaController::class,'create'])->name('dashboard.socialmedia.create');
Route::post('dashboard/socialMedia/store',[SocialmediaController::class,'store'])->name('dashboard.socialmedia.store');
Route::get('dashboard/socialMedia/edit',[SocialmediaController::class, 'edit'])->name('dashboard.socialmedia.edit');
Route::put('dashboard/socialMedia/update/{id}',[SocialmediaController::class, 'update'])->name('dashboard.socialmedia.update');
Route::delete('dashboard/socialMedia/destroy/{id}',[SocialmediaController::class, 'destroy'])->name('dashboard.socialmedia.destroy');

Route::get('dashboard/address/list',[AddressController::class,'list'])->name('dashboard.address.list');
Route::get('dashboard/address/create',[AddressController::class,'create'])->name('dashboard.address.create');
Route::post('dashboard/address/store',[AddressController::class,'store'])->name('dashboard.address.store');
Route::get('dashboard/address/edit/{id}',[AddressController::class, 'edit'])->name('dashboard.address.edit');
Route::put('dashboard/address/update/{id}',[AddressController::class, 'update'])->name('dashboard.address.update');
Route::delete('dashboard/address/destroy/{id}',[AddressController::class, 'destroy'])->name('dashboard.address.destroy');

Route::get('contact-us', [ContactController::class, 'index']);
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us.store');


Route::get('product-list', [MainController::class,'productListAjax']);
Route::post('searchProduct', [MainController::class,'searchProduct'])->name('search.product');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
