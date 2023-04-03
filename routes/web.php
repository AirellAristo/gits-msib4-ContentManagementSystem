<?php

use App\Http\Controllers\categoriesControllerAdmin;
use App\Http\Controllers\productController;
use App\Http\Controllers\keranjangController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
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

//test page
Route::get('/test', function () {
    return view('tester/testview');
});
//END test page

//Registrasi Page
Route::get('/register',[registerController::class,'index'])->middleware('guest');
Route::post('/register',[registerController::class,'register']);
//END Registrasi Page

//Login Page
Route::get('/', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/',[loginController::class,'authenticate']);
//END Login Page

//Logout
Route::post('/logout', [loginController::class, 'logout'])->middleware('auth');
//END Logout

//Digunakan Untuk Menunjukkan Data dari database
Route::get('/admin',[productController::class, 'indexAdmin'])->middleware('auth');
Route::get('/admin/editHapus',[productController::class, 'data'])->middleware('auth');
Route::get('/admin/tambah',[productController::class, 'create'])->middleware('auth');
Route::get('/admin/editHapus/edit/{id}',[productController::class, 'edit'])->middleware('auth');
Route::get('/admin/tambahKategori',[categoriesControllerAdmin::class, 'create'])->middleware('auth');
Route::get('/admin/editHapusKategori',[categoriesControllerAdmin::class, 'data'])->middleware('auth');
Route::get('/admin/editHapusKategori/editKategori/{id}',[categoriesControllerAdmin::class, 'edit'])->middleware('auth');
Route::get('/admin/beli/{id}',[keranjangController::class,'transaksi'])->middleware('auth');
Route::get('/admin/keranjang',[keranjangController::class,'keranjang'])->middleware('auth');
Route::get('/admin/keranjang/editKeranjang/{id}',[keranjangController::class, 'edit'])->middleware('auth');
//END digunakan Untuk Menunjukkan Data dari database

// digunakan untuk memasukkan data ke dalam database
Route::post('/admin/tambah',[productController::class, 'store']);
Route::post('/admin/tambahKategori',[categoriesControllerAdmin::class, 'store']);
Route::post('/admin/beli/{id}',[keranjangController::class,'store']);
// END digunakan untuk memasukkan data ke dalam database

// digunakan untuk mengupdate data di database
Route::put('/admin/editHapus/edit/{id}',[productController::class, 'update']);
Route::put('/admin/editHapusKategori/editKategori/{id}',[categoriesControllerAdmin::class, 'update']);
Route::put('/admin/keranjang/editKeranjang/{id}',[keranjangController::class, 'update']);
// END digunakan untuk mengupdate data di database

// digunakan untuk menghapus data di database
Route::delete('/admin/editHapus/{id}',[productController::class, 'destroy']);
Route::delete('admin/editHapusKategori/{id}',[categoriesControllerAdmin::class, 'destroy']);
Route::delete('/admin/keranjang/hapusKeranjang/{id}',[keranjangController::class, 'destroy']);
// END digunakan untuk menghapus data di database
