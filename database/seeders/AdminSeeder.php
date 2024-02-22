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
     *
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
        $role->permissions()->attach($permissions);

        // attach admin role
        $admin->syncRoles([$role->id]);

        DB::commit();
    }


    public function createAdmin()
    {
        $data = [
            'username' => 'test',
            'email' => 'test@test.com',
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

    public function createRole()
    {
        return Role::create([
            'name'          =>  'admin',
            'display_name'  => 'Admin',
            'description'   => 'Admin Role For All Permissions In admin dashboard',
            'slug'          => 'admin',
        ]);
    }
}
