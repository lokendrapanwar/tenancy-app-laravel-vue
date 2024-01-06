<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TenantController;
use App\Http\Controllers\Api\SuperAdminController;

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

Route::middleware(['auth:api'])->group(function () {
    Route::post('/create-company', [TenantController::class, 'createCompany']);
    Route::get('/domains', [TenantController::class, 'getDomains']);

    // logout
    Route::get('/admin/logout', [SuperAdminController::class, 'logout']);
});

Route::post('/adminlogin', [SuperAdminController::class, 'login']);
