<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service = [

           'title'=>"Web Development",
           'slug'=>"Web_Development",
            'category_id'=>1,
            'image'=>null,
            'price'=>25,
            'description'=>'Web development is the process of building, maintaining, and programming websites and web applications. It involves writing code and using various programming languages to ensure that a website functions properly and provides a good user experience',
        ];

        Service::insert($service);
    }
}
