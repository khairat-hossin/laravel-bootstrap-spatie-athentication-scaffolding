<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //create admin user
        $user= User::factory()->create();

        $this->call([
            PermissionSeeder::class
        ]);

        $role = Role::create(['name' => "Admin"]);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);

        //create general user

        $user= User::create([
            'name' => "Mr. USer",
            'email' => "user@user.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);


        $role = Role::create(['name' => "User"]);
     
        $permissions =[1,5];
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
