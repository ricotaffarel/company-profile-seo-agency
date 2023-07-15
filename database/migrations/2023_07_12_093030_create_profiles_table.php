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
        Schema::create('profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title_footer_1', 255);
            $table->string('title_footer_2', 255);
            $table->string('title_footer_3', 255);
            $table->string('title_footer_4', 255);
            $table->string('desc_title_footer_4', 255);
            $table->text('address');
            $table->string('city', 255);
            $table->string('country', 255);
            $table->string('postal_code', 255);
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->text('vision');
            $table->text('mission');
            $table->string('facebook', 255);
            $table->string('instagram', 255);
            $table->string('linkedin', 255);
            $table->string('twitter', 255);
            $table->string('link_map', 255);
            $table->string('copy_right', 255);
            $table->string('image', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
