<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    

    public function run()
    {
        $admin = [
            'name' => 'Faruque',
            'email' => 'abdullahalfaruque2000@gmail.com',
            'password' => bcrypt('faruque52')
        ];
        Admin::create($admin);
    }
}
