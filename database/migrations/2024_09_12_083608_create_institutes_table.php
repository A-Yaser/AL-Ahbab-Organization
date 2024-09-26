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
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->text('name');

            // $table->unsignedBigInteger('location_id');
            // $table->foreign('location_id')->references('id')->on('locations');

            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id')->references('id')->on('managers');

            $table->unsignedBigInteger('tester_id');
            $table->foreign('tester_id')->references('id')->on('testers');

            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutes');
    }
};
