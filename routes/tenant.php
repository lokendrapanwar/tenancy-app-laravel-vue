<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TenantController;
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
])->prefix('api')->group(function () 
{

    // Login user in tenant
    Route::post('/login', [UserController::class, 'login']);

    // logout
    Route::get('/logout', [UserController::class, 'logout']);

    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    // Resend link to verify email
    Route::post('/email/verify/resend', function (Request $request) 
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth:api', 'throttle:6,1'])->name('verification.send');

    // Authorized routes
    Route::middleware(['auth:api'])->group(function () 
    {

        // Single User data in company
        Route::get('/user', [UserController::class, 'userData']);

        // get all users in the company 
        Route::get('/all-users', [TenantController::class, 'getAllUsers']);

        // get by id
        Route::get('/user/{id}', [TenantController::class, 'getUserById']);

        // Register new user in tenant
        Route::post('/create-user', [TenantController::class, 'createUser']);

        // Register new user in tenant
        ///api/users/${id}
        Route::delete('/delete-user/{id}', [TenantController::class, 'deleteCompanyUser']);

        // update user in tenant
        Route::post('/update-user', [TenantController::class, 'updateUser']);

    });

});

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () 
{
    Route::get('/', function () 
    {
        $tenant = tenant()->toArray();
        //return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
        return view('welcome')->withTenant($tenant);
    });
});