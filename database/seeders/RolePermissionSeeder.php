<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['super_admin', 'admin_pusat', 'admin_kecamatan'] as $role) {
            Role::findOrCreate($role, 'web');
        }
    }
}
