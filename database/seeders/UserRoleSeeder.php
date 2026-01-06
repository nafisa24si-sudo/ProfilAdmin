<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Update existing users with 'user' role to 'petugas'
        User::where('role', 'user')->update(['role' => 'petugas']);
        
        // Ensure specific admin accounts have correct roles
        User::where('email', 'superadmin@sidesa.com')->update(['role' => 'super_admin']);
        User::where('email', 'admin@sidesa.com')->update(['role' => 'admin']);
    }
}