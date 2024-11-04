<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class serviceCategoryseedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name'=>'Web Development',
            'slug'=>'Web-Development',
            'description'=>'Web Development',
        ];
        ServiceCategory::insert($data );
    }
}
