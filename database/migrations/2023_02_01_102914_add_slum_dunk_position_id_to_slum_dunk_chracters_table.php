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
        Schema::table('slam_dunk_characters', function (Blueprint $table) {
            $table->foreignId('slam_dunk_position_id')->nullable()->constrained('slam_dunk_positions')->comment('ポジションID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slam_dunk_characters', function (Blueprint $table) {
            $table->dropForeign('slam_dunk_characters_slam_dunk_position_id_foreign');
            $table->dropColumn('slam_dunk_position_id');
        });
    }
};
