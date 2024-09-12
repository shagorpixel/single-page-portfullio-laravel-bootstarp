<?php

namespace Database\Seeders;

use App\Models\Portfullio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class portfullioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            ['title'=>"Tailwind CSS Website Design",
            'sub_title'=>"Make Awesome Website Design Using Tailwind CSS",
            'image'=>null,
            'description'=>"Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
            'client'=>"Multimedia Academy",
            'category'=>"Web Development"],

            ['title'=>"Laravel E-Commerse Website",
            'sub_title'=>"Make Awesome Website Design Laravel",
            'image'=>null,
            'description'=>"Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
            'client'=>"Alltime Bazar",
            'category'=>"Web Development"],

            ['title'=>"Inventory Management Website",
            'sub_title'=>"Make Inventory Management Using Laravel",
            'image'=>null,
            'description'=>"Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
            'client'=>"Sikkha Mela",
            'category'=>"Software Development"]
        ];

        Portfullio::insert($data);
    }
}
