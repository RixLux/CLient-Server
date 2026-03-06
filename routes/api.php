<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServerController;
use App\Http\Controllers\Api\ProductController; // Tambahkan ini!

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
/*
Route::get('/ping', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Server Laravel aktif',
        'time' => now()
    ]);
});
*/
/*
Route::get('/profile', function () {
    return response()->json([
        'Nama' => 'Afif Irham Nobel',
        'NIM' => '23343025',
        'Program-Studi' => 'Informatika'
    ]);
});

*/
/*
Route::get('/info', function () {
    return response()->json([
        'app' => 'Client Server API ',
        'version' => '1.0',
        'developer' => 'Mahasiswwa Informatika'
    ]);
});
*/
Route::get('/ping', [ServerController::class, 'ping']);
Route::get('/info', [ServerController::class, 'info']);
Route::get('/profile', [ServerController::class, 'profile']);
Route::get('/status', [ServerController::class, 'status']);
Route::apiResource('products', ProductController::class);
