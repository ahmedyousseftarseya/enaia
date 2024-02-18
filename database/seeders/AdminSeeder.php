<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'username' => 'ahmed',
            'email' => 'test@test.com',
            'password' => bcrypt(123456),
            'phone' => '01159472369',
        ];

        $admin = Admin::where('email', 'test@test.com')->first();

        if(!$admin){
            Admin::updateOrCreate($data);
        }
    }
}