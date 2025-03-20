<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhongBanController;
use App\Http\Controllers\LuongController;
use App\Http\Controllers\NhanVienPhongBanController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('nhanvien')->group(function () {
    Route::get('/', [NhanVienController::class, 'index']); // Lấy danh sách nhân viên
    Route::get('/{id}', [NhanVienController::class, 'show']); // Lấy 1 nhân viên theo ID
    Route::post('/', [NhanVienController::class, 'store']); // Thêm nhân viên
    Route::get('/edit/{id}', [NhanVienController::class, 'edit']);
    Route::put('/{id}', [NhanVienController::class, 'update']); // Cập nhật nhân viên
    Route::delete('/{id}', [NhanVienController::class, 'destroy']); // Xóa nhân viên
});

Route::prefix('luong')->group(function () {
    Route::get('/', [LuongController::class, 'index']);
    Route::get('/{id}', [LuongController::class, 'show']);
    Route::post('/', [LuongController::class, 'store']);
    Route::put('/{id}', [LuongController::class, 'update']);
    Route::delete('/{id}', [LuongController::class, 'destroy']);
});



Route::prefix('phongban')->group(function () {
    Route::get('/', [PhongBanController::class, 'index']);
    Route::get('/{id}', [PhongBanController::class, 'show']);
    Route::post('/', [PhongBanController::class, 'store']);
    Route::put('/{id}', [PhongBanController::class, 'update']);
    Route::delete('/{id}', [PhongBanController::class, 'destroy']);
});



Route::prefix('nhanvienphongban')->group(function () {
    Route::get('/', [NhanVienPhongBanController::class, 'index']);
    Route::post('/', [NhanVienPhongBanController::class, 'store']);
    Route::delete('/{id_phong_ban}/{id_nhan_vien}', [NhanVienPhongBanController::class, 'destroy']);
});
