<?php

use App\Models\Intern;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('intern_majors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Intern::class)->references("id")->on("interns")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intern_majors');
    }
};
