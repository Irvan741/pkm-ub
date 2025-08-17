<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        Role::firstOrCreate(['name' => 'Editor']);

        $user = User::firstOrCreate(
            ['email' => 'atikasari@unmul.ac.id'],
            [
                'name' => 'Atika Sari',
                'password' => Hash::make('1niPasswordmuyaa'),
            ]
        );

        // Beri role Admin ke user tersebut
        if (!$user->hasRole('Admin')) {
            $user->assignRole($adminRole);
        }
    }
}