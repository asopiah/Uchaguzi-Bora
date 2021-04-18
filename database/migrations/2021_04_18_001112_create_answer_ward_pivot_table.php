<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerWardPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answer_ward', function (Blueprint $table) {
            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id', 'answer_id_fk_3705160')->references('id')->on('answers')->onDelete('cascade');
            $table->unsignedBigInteger('ward_id');
            $table->foreign('ward_id', 'ward_id_fk_3705160')->references('id')->on('wards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer_ward', function (Blueprint $table) {
            //
        });
    }
}
