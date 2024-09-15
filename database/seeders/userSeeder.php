<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name'=>'Multimedia IT',
            'email'=>'mtajnd@gmail.com',
            'password'=>Hash::make('mta30082')
        ];
        User::insert($data);
    }
}
