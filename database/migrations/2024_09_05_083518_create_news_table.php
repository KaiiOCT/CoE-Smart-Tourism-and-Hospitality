<?php

use App\Models\NewsCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('link');
            $table->date('date');
            $table->foreignIdFor(NewsCategory::class, "category_id")->nullable()->references("id")->on("news_categories")->onDelete("set null")->onUpdate("cascade");
            $table->boolean('is_main')->default(false);
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
