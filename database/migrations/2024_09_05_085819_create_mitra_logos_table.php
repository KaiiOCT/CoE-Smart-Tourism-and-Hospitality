<?php

use App\Models\Innovation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mitra_logos', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->foreignIdFor(Innovation::class)->references("id")->on("innovations")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra_logos');
    }
};
