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

            ["name"=>"Graphics Design",
            "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",
            "icon"=>"fa-regular fa-image",
            'created_at' => date("Y-m-d")],
            ["name"=>"Web Development",
            "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",
            "icon"=>"fa-solid fa-earth-americas",
            'created_at' => date("Y-m-d")],
            ["name"=>"Graphics Design",
            "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s",
            "icon"=>"fa-solid fa-icons",
            'created_at' => date("Y-m-d")]
        ];

        Service::insert($service);
    }
}
