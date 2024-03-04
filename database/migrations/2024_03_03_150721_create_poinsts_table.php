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
        Schema::create('poinsts', function (Blueprint $table) {
            $table->id();
            $table->integer('Match_no');
            $table->string('Team_name');
            $table->integer('Points');
            $table->engine = 'InnoDB';
            $table->integer('jersey_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poinsts');
    }
};
