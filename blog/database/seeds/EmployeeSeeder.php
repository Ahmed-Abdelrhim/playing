<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'Ahmed Abdelrhim',
            'salary' => '10,000',
            'job' => 'Back-End Developer',
        ]);

    }
}
