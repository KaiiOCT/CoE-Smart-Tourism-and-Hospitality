<?php

use App\Models\Innovation;
use App\Models\Innovillage;
use App\Models\Shop;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->foreignIdFor(Shop::class)->nullable()->references("id")->on("shops")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignIdFor(Innovillage::class)->nullable()->references("id")->on("innovillages")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignIdFor(Innovation::class)->nullable()->references("id")->on("innovations")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
