<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

// - Laravel có 1 vài route cơ bản sau, route Laravel tuân theo chuẩn
// API RESTFul
// get: dùng cho chức năng hiển thị dữ liệu
// post: dùng cho chức năng thêm mới dữ liệu vào db
// put: update dữ liệu
// delete: xóa dữ liệu
// - Với Url thêm mới sản phẩm, có 2 route:
    Route::get('them-moi-sp', [ProductController::class, 'create']);
//    RewriteRule them-moi-sp index.php?controller=product&action=create
Route::post('insert-data', [ProductController::class, 'insert']);

// Route liệt kê sp
Route::get('ds-sp', [ProductController::class, 'index']);
