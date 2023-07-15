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
        Schema::create('service_testimonies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('services_id')->references('id')->on('services');
            $table->string('name', 255);
            $table->string('job', 255);
            $table->string('desc', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_testimonies');
    }
};
