<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\LuongController;
use App\Http\Controllers\PhongBanController;
use App\Http\Controllers\NhanVienPhongBanController;

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


Route::get('/nhanvien', [NhanVienController::class, 'index']);
Route::get('/luong', [LuongController::class, 'index']);
Route::get('/phongban', [PhongBanController::class, 'index']);
Route::get('/nhanvienphongban', [NhanVienPhongBanController::class, 'index']);
Route::get('/nhanvien/create', [NhanVienController::class, 'create']); // Hiển thị form
Route::post('/nhanvien/store', [NhanVienController::class, 'store']); // Xử lý thêm nhân viên

Route::get('/', function () {
    return view('welcome');
});
