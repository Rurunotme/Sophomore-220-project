<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    $department = Department::firstOrCreate(
            ['departmentName' => 'Administration'],
            ['description' => 'Management and administrative operations']
        );

        $role = Role::firstOrCreate(
            ['title' => 'Manager'],
            [
                'salary' => 75000.00,
                'isSalary' => true,
                'overtimeRate' => null,
                'regHoursPerWeek' => 40,
            ]
        );

        Employee::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'phone' => '7175550100',
                'departmentID' => $department->departmentID,
                'roleID' => $role->roleID,
            ]
        );
    }
}
