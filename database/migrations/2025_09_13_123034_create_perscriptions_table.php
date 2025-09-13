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
        Schema::create('perscriptions', function (Blueprint $table) {
            $table->id('perscription_id');
            $table->unsignedBigInteger('record_id');
            $table->unsignedBigInteger('medicine_id');
            $table->string('dosage')->nullable();
            $table->unsignedInteger('quantity_taken')->nullable();
            $table->unsignedInteger('cost')->nullable();
            $table->timestamps();

            $table->foreign('record_id')->references('record_id')->on('medicalrecord')->onDelete('CASCADE');
            $table->foreign('medicine_id')->references('medicine_id')->on('medicines')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perscriptions');
    }
};
