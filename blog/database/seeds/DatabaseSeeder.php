<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Employee::factory(100)->create();
    }
}
