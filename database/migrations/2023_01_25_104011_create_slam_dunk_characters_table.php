<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slam_dunk_characters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('slam_dunk_high_school_id')->constrained('slam_dunk_high_schools');
            $table->string('name')->comment('選手名');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slam_dunk_characters');
    }
};
