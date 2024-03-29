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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('TeamA');
            $table->string('TeamB');
            $table->timestamp('Match_start_time');
            $table->timestamp('Match_end_time');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->integer('Match_no')->unique();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
