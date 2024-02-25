<?php

namespace Database\Seeders;

use App\Models\Permission;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AdminPermissionsSeeder extends Seeder
{
    public $permissions = [];

    public function initPermissions()
    {
        $perfix = "admin_";

        $this->permissions = [
            //dashboard
            ['name' => $perfix . 'read-dashboard', 'display_name' => 'Read Dashboard', 'description' => 'عرض لوحة التحكم', 'path' => 'dashboard', 'slug' => 'admin'],

            //doctors
            ['name' => $perfix . 'read-doctors', 'display_name' => 'Read Doctors', 'description' => 'عرض الأطباء', 'path' => 'doctors', 'slug' => 'admin'],
            ['name' => $perfix . 'show-doctors', 'display_name' => 'Show Doctors Details', 'description' => 'عرض تفاصيل الأطباء', 'path' => 'doctors', 'slug' => 'admin'],
            ['name' => $perfix . 'create-doctors', 'display_name' => 'Create Doctors', 'description' => 'اضافة الأطباء', 'path' => 'doctors', 'slug' => 'admin'],
            ['name' => $perfix . 'update-doctors', 'display_name' => 'Update Doctors', 'description' => 'تعديل الأطباء', 'path' => 'doctors', 'slug' => 'admin'],
            ['name' => $perfix . 'delete-doctors', 'display_name' => 'Delete Doctors', 'description' => 'حذف الأطباء', 'path' => 'doctors', 'slug' => 'admin'],
            
            //nursers
            ['name' => $perfix . 'read-nurses', 'display_name' => 'Read Nurses', 'description' => 'عرض الممرضات', 'path' => 'nurses', 'slug' => 'admin'],
            ['name' => $perfix . 'create-nurses', 'display_name' => 'Create Nurses', 'description' => 'اضافة الممرضات', 'path' => 'nurses', 'slug' => 'admin'],
            ['name' => $perfix . 'update-nurses', 'display_name' => 'Update Nurses', 'description' => 'تعديل الممرضات', 'path' => 'nurses', 'slug' => 'admin'],
            ['name' => $perfix . 'delete-nurses', 'display_name' => 'Delete Nurses', 'description' => 'حذف الممرضات', 'path' => 'nurses', 'slug' => 'admin'],
            
            //head-nurses
            ['name' => $perfix . 'read-head-nurses', 'display_name' => 'Read Head Nurses', 'description' => 'عرض رؤساء الممرضات', 'path' => 'head_nurses', 'slug' => 'admin'],
            ['name' => $perfix . 'create-head-nurses', 'display_name' => 'Create Head Nurses', 'description' => 'اضافة رؤساء الممرضات', 'path' => 'head_nurses', 'slug' => 'admin'],
            ['name' => $perfix . 'update-head-nurses', 'display_name' => 'Update Head Nurses', 'description' => 'تعديل رؤساء الممرضات', 'path' => 'head_nurses', 'slug' => 'admin'],
            ['name' => $perfix . 'delete-head-nurses', 'display_name' => 'Delete Head Nurses', 'description' => 'حذف رؤساء الممرضات', 'path' => 'head_nurses', 'slug' => 'admin'],
            
            //customers
            ['name' => $perfix . 'read-customers', 'display_name' => 'Read Customers', 'description' => 'عرض العملاء', 'path' => 'customers', 'slug' => 'admin'],
            ['name' => $perfix . 'show-customers', 'display_name' => 'Show Customers Details', 'description' => 'عرض تفاصيل العملاء', 'path' => 'customers', 'slug' => 'admin'],
            ['name' => $perfix . 'update-customers', 'display_name' => 'Update Customers', 'description' => 'تعديل العملاء', 'path' => 'customers', 'slug' => 'admin'],
            ['name' => $perfix . 'delete-customers', 'display_name' => 'Delete Customers', 'description' => 'حذف العملاء', 'path' => 'customers', 'slug' => 'admin'],
            ['name' => $perfix . 'update-status-customers', 'display_name' => 'Update Status Customers', 'description' => 'تغيير حالة العملاء', 'path' => 'customers', 'slug' => 'admin'],
            
            //services
            ['name' => $perfix . 'read-services', 'display_name' => 'Read Services', 'description' => 'عرض الخدمات', 'path' => 'services', 'slug' => 'admin'],
            ['name' => $perfix . 'create-services', 'display_name' => 'Create Services', 'description' => 'اضافة الخدمات', 'path' => 'services', 'slug' => 'admin'],
            ['name' => $perfix . 'update-services', 'display_name' => 'Update Services', 'description' => 'تعديل الخدمات', 'path' => 'services', 'slug' => 'admin'],
            ['name' => $perfix . 'delete-services', 'display_name' => 'Delete Services', 'description' => 'حذف الخدمات', 'path' => 'services', 'slug' => 'admin'],
            ['name' => $perfix . 'update-status-services', 'display_name' => 'Update Status Services', 'description' => 'تغيير حالة الخدمات', 'path' => 'services', 'slug' => 'admin'],
            
            //admins
            ['name' => $perfix . 'read-admins', 'display_name' => 'Read Admins', 'description' => 'عرض المسؤلين', 'path' => 'admins', 'slug' => 'admin'],
            ['name' => $perfix . 'show-admins', 'display_name' => 'Show Admin Details', 'description' => 'عرض تفاصيل المسؤلين', 'path' => 'admins', 'slug' => 'admin'],
            ['name' => $perfix . 'create-admins', 'display_name' => 'Create Admins', 'description' => 'اضافة المسؤلين', 'path' => 'admins', 'slug' => 'admin'],
            ['name' => $perfix . 'update-admins', 'display_name' => 'Update Admins', 'description' => 'تعديل المسؤلين', 'path' => 'admins', 'slug' => 'admin'],
            ['name' => $perfix . 'delete-admins', 'display_name' => 'Delete Admins', 'description' => 'حذف المسؤلين', 'path' => 'admins', 'slug' => 'admin'],
            
            //roles
            ['name' => $perfix . 'read-roles', 'display_name' => 'Read Roles', 'description' => 'عرض الادوار', 'path' => 'roles', 'slug' => 'admin'],
            ['name' => $perfix . 'create-roles', 'display_name' => 'Create Roles', 'description' => 'اضافة الادوار', 'path' => 'roles', 'slug' => 'admin'],
            ['name' => $perfix . 'update-roles', 'display_name' => 'Update Roles', 'description' => 'تعديل الادوار', 'path' => 'roles', 'slug' => 'admin'],
            ['name' => $perfix . 'delete-roles', 'display_name' => 'Delete Roles', 'description' => 'حذف الادوار', 'path' => 'roles', 'slug' => 'admin'],
            
            //countries
            ['name' => $perfix . 'read-countries', 'display_name' => 'Read Countries ', 'description' => 'عرض الدول', 'path' => 'countries', 'slug' => 'admin'],
            ['name' => $perfix . 'create-countries', 'display_name' => 'Create Countries ', 'description' => 'اضافة الدول', 'path' => 'countries', 'slug' => 'admin'],
            ['name' => $perfix . 'update-countries', 'display_name' => 'Update Countries ', 'description' => 'تعديل الدول', 'path' => 'countries', 'slug' => 'admin'],
            ['name' => $perfix . 'delete-countries', 'display_name' => 'Delete Countries ', 'description' => 'حذف الدول', 'path' => 'countries', 'slug' => 'admin'],

            //cities
            ['name' => $perfix . 'read-cities', 'display_name' => 'Read Cities ', 'description' => 'عرض المدن', 'path' => 'cities', 'slug' => 'admin'],
            ['name' => $perfix . 'create-cities', 'display_name' => 'Create Cities ', 'description' => 'اضافة المدن', 'path' => 'cities', 'slug' => 'admin'],
            ['name' => $perfix . 'update-cities', 'display_name' => 'Update Cities ', 'description' => 'تعديل المدن', 'path' => 'cities', 'slug' => 'admin'],
            ['name' => $perfix . 'delete-cities', 'display_name' => 'Delete Cities ', 'description' => 'حذف المدن', 'path' => 'cities', 'slug' => 'admin'],

            //settings
            ['name' => $perfix . 'read-settings', 'display_name' => 'Read Settings', 'description' => 'عرض الاعدادات', 'path' => 'settings', 'slug' => 'admin'],
            ['name' => $perfix . 'update-settings', 'display_name' => 'Update Settings', 'description' => 'تعديل الاعدادات', 'path' => 'settings', 'slug' => 'admin'],

        ];
    }

    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $this->initPermissions();

        foreach ($this->permissions as $item) {
            if (!DB::table('permissions')->where('name', $item['name'])->exists()) {
                Permission::updateOrCreate($item);
            }
        }
    }
}
