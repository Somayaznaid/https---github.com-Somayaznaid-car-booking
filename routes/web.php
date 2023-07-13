<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LessorController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

///////////////////////////////////////////////////////////////
// user 
//////////////////////////////////////////////////////////////


Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/car', function () {
    return view('car');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/car_single', function () {
    return view('car_single');
});

Route::get('/blog_single', function () {
    return view('blog_single');
});

Route::get('/sign_up', function () {
    return view('sign_up');
});

Route::post('/sign_up', [SignController::class, 'create'])->name('create');

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [SignController::class, 'log'])->name('log');


Route::get('/car_single/{id}', [BookController::class, 'carSinglePage'])->name('car_single');

Route::post('/logout', [SignController::class , 'logout'])->name('logout');

Route::post('/bookings', [BookController::class, 'storeBooking'])->name('bookings.storeBooking');

Route::post('/car_single/{id}', [BookController::class, 'rating'])->name('rating');

Route::post('index', [BookController::class, 'showAvailableCars'])->name('showAvailableCars.index');

Route::get('/car', [BookController::class, 'showAllCars'])->name('showAllCars');

///////////////////////////////////////////////////////////////
// admin 
//////////////////////////////////////////////////////////////


Route::get('/admin', function () {
    return view('index_admin');
});

Route::get('/admin_table', function () {
    return view('table_admin');
});


Route::get('/admin_profile', function () {
    return view('admin_profile');
});

Route::get('admin_table' , [AdminController::class , 'index']);

Route::post('admin_table/add-user' , [AdminController::class , 'addUser'])->name('addUser');

Route::post('admin_table/add-lessor' , [AdminController::class , 'addlessor'])->name('addlessor');

Route::get('admin_table/delete/{id}' , [AdminController::class , 'deleteUser'])->name('deleteUser');

Route::get('admin_table/delete/{id}' , [AdminController::class , 'deleteLessor'])->name('deleteLessor');

Route::get('edit/{id}' , [AdminController::class , 'showUser'])->name('showUser');

Route::post('update_user_admin', [AdminController::class, 'editUser'])->name('editUser');



///////////////////////////////////////////////////////////////
// lessor 
//////////////////////////////////////////////////////////////

Route::get('/sign_lessor', function () {
    return view('sign_lessor');
});

Route::post('/sign_lessor', [SignController::class, 'createLessor'])->name('createLessor');


Route::get('/add_product', function () {
    return view('add_product_lessor');
});

Route::get('/product', function () {
    return view('product_lessor');
});

Route::get('/edit_product', function () {
    return view('edit_product');
});

Route::match(['GET', 'POST'], 'add_product_lessor', [LessorController::class, 'addCar'])->name('addCar');

Route::get('index' , [LessorController::class , 'showCars'])->name('showCars');

Route::get('/product' , [LessorController::class , 'showCarsLessor'])->name('showCarsLessor');

Route::get('product/delete/{id}' , [LessorController::class , 'deleteProduct'])->name('deleteProduct');

Route::get('product/edit/{id}' , [LessorController::class , 'showCarEdit'])->name('showCarEdit');

Route::post('product/edit' , [LessorController::class , 'editCar'])->name('editCar');
