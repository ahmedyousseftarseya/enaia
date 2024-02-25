<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        // create admin
        $admin = $this->createAdmin();

        // create role admin role
        $role = $this->createRole();

        // sync all permissions
        $permissions = DB::table('permissions')->where('slug', 'admin')->pluck('id')->toArray();
        $role->permissions()->sync($permissions);

        // attach admin role
        $admin->syncRoles([$role->id]);

        DB::commit();
    }


    /**
     * Create an admin user with the given data.
     * @return Admin The newly created admin user
     */
    public function createAdmin()
    {
        $data = [
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt(123456),
            'phone' => '01159472369',
        ];

        $admin = Admin::where('email', $data['email'])->first();

        DB::beginTransaction();
        if (!$admin) {
            $admin = Admin::create($data);
        }

        return $admin;
    }

    /**
     * Creates a role with the given data if it does not already exist and returns the role.
     * @return Role
     */
    public function createRole()
    {
        $data = [
            'name'          =>  'admin',
            'display_name'  => 'Admin',
            'description'   => 'Admin Role For All Permissions In admin dashboard',
            'slug'          => 'admin',
        ];

        $role = Role::where('slug', $data['slug'])->first();
        if (!$role) {
            $role = Role::create($data);
        }

        return $role;
    }
}
