<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name' => 'Admin User',
            'email' => 'admin@elroof.com',
            'mobile' => '01201201201',
            'password' => Hash::make('qwerty123')
        ]);
    }
}
