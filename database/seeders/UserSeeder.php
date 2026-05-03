<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make('password');

        $superAdmin = User::updateOrCreate(
            ['email' => 'superadmin@kemenagsangihe.test'],
            ['name' => 'Super Admin', 'password' => $password, 'status' => 'aktif']
        );
        $superAdmin->assignRole('super_admin');

        $adminPusat = User::updateOrCreate(
            ['email' => 'adminpusat@kemenagsangihe.test'],
            ['name' => 'Admin Pusat', 'password' => $password, 'status' => 'aktif']
        );
        $adminPusat->assignRole('admin_pusat');

        Kecamatan::orderBy('id')->get()->each(function (Kecamatan $kecamatan, int $index) use ($password): void {
            $number = $index + 1;

            $user = User::updateOrCreate(
                ['email' => "admin.kecamatan{$number}@kemenagsangihe.test"],
                [
                    'name' => "Admin Kecamatan {$number}",
                    'password' => $password,
                    'kecamatan_id' => $kecamatan->id,
                    'status' => 'aktif',
                ],
            );

            $user->assignRole('admin_kecamatan');
        });
    }
}
