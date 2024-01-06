<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class TenantController extends Controller
{


    /**
     * Get Tenant
     */
    public function index()
    {
        return [
            'tenant' => tenant(),
            'user' => User::get(),
        ];
    }

    /**
     * Create Company
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCompany(Request $request)
    {
        $request->validate([
            'domain' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $randomString = Str::random(5); //

        $tid = $request->domain . '-' . $randomString;

        // Create Tenant Database
        $tenant = Tenant::create(['id' => $tid]);

        // Create Tenant Domain
        $tenant->domains()->create([
            'domain' => $request->domain . '.' .env('APP_DOMAIN'),
            //'domain' => $request->domain,
            'name' => $request->name,
        ]);
        $tenant->run(function() use ($request, $tid){
            // Create User
            $company = User::create([
                'tenant_id' => $tid,
                'name' => $request->name,
                'contact' => $request->contact,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $permissions = [
                'create-user',
                'edit-user',
                'delete-user',
                // Add more permissions as needed
            ];
            
            foreach ($permissions as $permission) {
                // Check if the permission already exists
                if (!Permission::where('name', $permission)->exists()) {
                    Permission::create(['name' => $permission, 'guard_name' => 'api']);
                }
            }
        
            // Create roles if they don't exist
            $role = Role::firstOrCreate(['name' => 'company-admin']);
            $role->givePermissionTo($permissions);
    
            $company->assignRole('company-admin');
        });
        return response()->json([
            'message' => 'Company created successfully',
            'company' => $tenant,
            'success' => true,
        ]);
    }

    /**
     * Get All Domains
     *  @return \Illuminate\Http\JsonResponse
     */
    public function getDomains()
    {
       // GET THE DOMAINS
       $data = Tenant::with('domains')->orderBy('created_at', 'desc')->get()->toArray();

        $response = [
            'success' => true,
            'data' => $data,
        ];
        return response()->json($response, 200);
    }

    /**
     * Delete the tenent database user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCompanyUser($userId)
    {
        $tenant  = tenant();
        $tenant->run(function() use ($userId, $tenant){
            // delete the user
            $user = User::where('id', $userId)->where('tenant_id', $tenant->id)->first();
            if($user){
                $user->delete();
            }
        });
        return response()->json([
            'message' => 'User deleted successfully',
            'success' => true,
        ], 200);
    }

    /**
     * Get All Users
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllUsers()
    {
        // GET THE USERS
        $data = Tenant::first()->toArray();
        $data['users'] = User::where('tenant_id', $data['id'])
        ->whereHas('roles', function ($query) {
            $query->where('name', 'company-user');
        })->get()->toArray();

        // return the users
        $response = [
            'success' => true,
            'data' => $data,
        ];
        return response()->json($response, 200);
    }

    /**
     * Get By Id
     */
    public function getUserById($id)
    {
        $tenant = tenant();
        $tid = $tenant->id;
        $user = User::where('id', $id)->where('tenant_id', $tid)->first();
        $user->created_date = $user->created_at->format('Y-m-d H:i:s');
        $user->company = $tenant->domains()->first()->name;

        return response()->json([
            'user' => $user,
            'success' => true,
        ], 200);
    }

    /**
     * Create User
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        // Create Tenant Database
        $tenant = tenant();

        $tid = $tenant->id;

        $tenant->run(function() use ($request, $tid){
            // Create User
            $user = User::create([
                'tenant_id' => $tid,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Create roles if they don't exist
            $role = Role::firstOrCreate(['name' => 'company-user']);
        
            $user->assignRole('company-user');
        });

        return response()->json([
            'message' => 'User created successfully',
            'success' => true,
        ], 200);
    }
}
