<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'=>'adminsistem',
            'name'=>'Administrator Sistem',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('admin123'),
            'role_id'=>1,
            'office_id'=>1
        ]);
    }
}
