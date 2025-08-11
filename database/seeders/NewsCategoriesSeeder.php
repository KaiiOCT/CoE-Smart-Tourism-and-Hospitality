<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ["Artikel", "Penghargaan"];
        foreach ($categories as $category) {
            NewsCategory::create([
                "name" => $category,
            ]);
        }
    }
}