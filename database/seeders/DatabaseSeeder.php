<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Innovillage;
use App\Models\Intern;
use App\Models\Journal;
use App\Models\Member;
use App\Models\News;
use App\Models\Partner;
use App\Models\Shop;
use App\Models\Training;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\TrainingFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name" => "Admin",
            "username" => "ceo_admin",
            "password" => bcrypt("dsadsadsa"),
        ]);
        $this->call(NewsCategoriesSeeder::class);
        News::factory(10)->create();
        Event::factory(20)->create();
        Member::factory(10)->create();
        Training::factory(10)->create();
        Shop::factory()->count(10)->create();
        Innovillage::factory()->count(10)->create();
        Journal::factory()->count(10)->create();
        Intern::factory()->count(10)->create();
        Partner::factory()->count(10)->create();
        $this->call(ProjectSeeder::class);
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}