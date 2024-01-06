<?php

namespace Database\Seeders;
use Database\Seeders\PassportSeeder;
use App\Models\User;
use Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            /**
             * Seed the application's database.
             */
                // \App\Models\User::factory(10)->create();

                // \App\Models\User::factory()->create([
                //     'name' => 'Test User',
                //     'email' => 'test@example.com',
                // ]);

                // Create super admin
                // $superAdmin = new User();
                // $superAdmin->name = 'Super Admin';
                // $superAdmin->email = 'super@admin.com';
                // $superAdmin->password = Hash::make('12345');
                // $superAdmin->save();

                $this->call([
                    PassportSeeder::class,
                ]);
    }
}
