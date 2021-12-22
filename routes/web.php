<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\LoginAdminController; 
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\SinhVienController; 
use App\Http\Controllers\SinhVienAdminController; 
use App\Http\Controllers\LichHocController; 
use App\Http\Controllers\GiaoVienAdminController; 
use App\Http\Controllers\AjaxController; 
use App\Http\Controllers\TrangChuController; 
use App\Http\Controllers\GiaoVienController; 
use App\Http\Controllers\DSSVDiemDanhController; 

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

Route::get('asd', function () {
    DB::insert('insert into toan_billgates (idLichHoc, MaSV) values (1, 1)');
    echo public_path();
    
});

Route::prefix('')->group(function () {
    Route::get('/', [TrangChuController::class, 'view']);
});

Route::get('login', [LoginController::class, 'getLogin']);
Route::post('login', [LoginController::class, 'postLogin']);

Route::prefix('admin')->group(function () { 
    Route::get('/', [AdminController::class, 'index']);
    Route::get('login', [LoginAdminController::class, 'getLogin']);
    Route::post('login', [LoginAdminController::class, 'postLogin']);
    Route::get('logout',[LoginAdminController::class, 'logout']);
    Route::prefix('sinhvien')->group(function () {
        Route::get('/', [SinhVienAdminController::class, 'dsSinhVien']);
        Route::get('them', [SinhVienAdminController::class, 'viewThem']);
        Route::post('them', [SinhVienAdminController::class, 'add']);
        Route::get('xoa/{id}', [SinhVienAdminController::class, 'xoaSV']);
    });
    Route::prefix('giaovien')->group(function () {
        Route::get('/', [GiaoVienAdminController::class, 'dsGiaoVien']);
        Route::get('them', [GiaoVienAdminController::class, 'viewThem']);
        Route::post('them', [GiaoVienAdminController::class, 'add']);
        Route::get('xoa/{id}', [GiaoVienAdminController::class, 'xoaGV']);
        
    });
    Route::prefix('lichhoc')->group(function () {
        Route::get('/', [LichHocController::class, 'dsLichHoc']);
        Route::get('them', [LichHocController::class, 'viewThem']);
        Route::post('them', [LichHocController::class, 'add']);
        Route::get('xoa/{id}', [LichHocController::class, 'xoaLH']);
        Route::post('sinhvien', [LichHocController::class, 'dssv']);
        Route::prefix('load')->group(function () {
            Route::get('giaovien/{idMonHoc}', [AjaxController::class, 'giaovien']);
            Route::get('dssv/{idLH}', [AjaxController::class, 'dssv']);
        });
    });
});
Route::prefix('giaovien')->group(function () {
    Route::get('login', [GiaoVienController::class, 'viewLogin']);
    Route::get('logout', [GiaoVienController::class, 'logout']);
    Route::post('login', [GiaoVienController::class, 'postLogin']);
    Route::get('/', [GiaoVienController::class, 'view']);
    Route::get('diemdanh/{id}', [GiaoVienController::class, 'diemdanh']);
    
});
Route::prefix('diemdanh')->group(function () {
   Route::get('dssv/{id}', [DSSVDiemDanhController::class, 'view']); 
});