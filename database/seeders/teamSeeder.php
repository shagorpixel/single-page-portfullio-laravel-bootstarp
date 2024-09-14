<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class teamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            'name'=>'Md Shagor Hossain',
            'title'=>'Web Developer',
            'image'=>null,
            'facebook'=>'https://www.facebook.com/shagor.hossain.528/',
            'twitter'=>'https://x.com/shagorpixel',
            'linkedin'=>'https://www.linkedin.com/in/md-shagor-hossain-1a114027b/',
        ];
        Team::insert($data);
    }
}
