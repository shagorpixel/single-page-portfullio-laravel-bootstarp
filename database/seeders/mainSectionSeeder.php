<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Main;

class mainSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $main = [
            ['title'=>"Welcome To Multimedia IT",'sub_title'=>"It's Nice To Meet You", 'bg_image'=>null,'resume'=>null]
        ];
        Main::insert($main);
    }
}
