<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VerifyEmailController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

// Route::middleware([
//     'web',
//     InitializeTenancyByDomain::class,
//     PreventAccessFromCentralDomains::class,
// ])->group(function () {
//     Route::get('/', function () {
//         return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
//     });
// });


Route::middleware([
    'api',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
    ])->prefix('api')->group(function () {

    // Register new user in tenant
    Route::post('/register', [AuthController::class, 'register']);
    // Login user in tenant
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['signed','throttle:6,1'])
    ->name('verification.verify');

    // Resend link to verify email
    Route::post('/email/verify/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
    })->middleware(['auth:api', 'throttle:6,1'])->name('verification.send');

    // Authorized routes
    Route::middleware(['auth:api'])->group(function(){
        // Single User data in tenant
        Route::get('/user', [AuthController::class, 'userData']);
    });

    // Route::get('/', function () {
    //     return [
    //         'tenant' => tenant(),
    //         'user' => User::get(),
    //     ];
    // });
 });


Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
});