<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //check exist any user
        $checkUser = User::where('id', '>', 0)->exists();
        if (!$checkUser) {
            return User::create([
                'name' => 'david',
                'email' => 'admin@yahoo.com',
                'password' => '$2y$10$8P6MpItCh.V/qFQ7OaqVJe1nbl2l4iFLxcNedXCMtegIcR277AU12',
                'is_admin' => true
            ]);
        }
    }
}
