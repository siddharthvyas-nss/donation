<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Hash;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Demo Volunteer 1 - Fully Verified
        Volunteer::create([
            'name' => 'John Doe',
            'mobile' => '9876543210',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'),
            'status' => 'active',
            'mobile_verified' => true,
            'email_verified' => true,
            'mobile_verified_at' => now(),
            'email_verified_at' => now(),
        ]);

        // Demo Volunteer 2 - Pending Verification
        Volunteer::create([
            'name' => 'Jane Smith',
            'mobile' => '9876543211',
            'email' => 'jane.smith@example.com',
            'password' => Hash::make('password123'),
            'status' => 'active',
            'mobile_verified' => false,
            'email_verified' => false,
        ]);

        // Demo Volunteer 3 - Admin User
        Volunteer::create([
            'name' => 'Admin User',
            'mobile' => '9876543212',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'status' => 'active',
            'mobile_verified' => true,
            'email_verified' => true,
            'mobile_verified_at' => now(),
            'email_verified_at' => now(),
        ]);

        // Demo Volunteer 4 - Test User
        Volunteer::create([
            'name' => 'Test User',
            'mobile' => '9876543213',
            'email' => 'test@example.com',
            'password' => Hash::make('test123'),
            'status' => 'active',
            'mobile_verified' => true,
            'email_verified' => true,
            'mobile_verified_at' => now(),
            'email_verified_at' => now(),
        ]);

        $this->command->info('Demo volunteers created successfully!');
    }
}
