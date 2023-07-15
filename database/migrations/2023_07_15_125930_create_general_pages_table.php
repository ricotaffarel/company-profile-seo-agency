<?php

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
        Schema::create('general_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title_1', 255);
            $table->string('desc_1', 255);
            $table->string('title_2', 255);
            $table->string('desc_2', 255);
            $table->string('title_3', 255);
            $table->string('desc_3', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_pages');
    }
};
