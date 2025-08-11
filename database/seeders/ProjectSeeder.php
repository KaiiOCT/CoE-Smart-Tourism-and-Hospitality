<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            "name" => "Lotus",
            "description" => "Pusat unggulan yang memfasilitasi penelitian, pelatihan, konsultansi, solusi inovasi dan digitalisasi dalam ranah pariwisata dan hospitality. Pusat unggulan yang memfasilitasi penelitian, pelatihan, konsultansi, solusi inovasi dan digitalisasi dalam ranah",
            "yt_link" => "https://youtu.be/hrLGiXr26Bg?si=ZbVIdwBm2QBqdgVk",
        ]);
    }
}