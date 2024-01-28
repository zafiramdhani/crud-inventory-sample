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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->integer('org')->nullable();
            $table->string('plant')->nullable();
            $table->string('sold_to')->nullable();
            $table->string('ship_to')->nullable();
            $table->string('material')->nullable();
            $table->string('distrik')->nullable();
            $table->integer('qty_minimum')->nullable();
            $table->integer('qty_bonus')->nullable();
            $table->integer('qty_status')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
