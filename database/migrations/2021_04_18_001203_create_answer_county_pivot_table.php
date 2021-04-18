<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerCountyPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_county', function (Blueprint $table) {
            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id', 'answer_id_fk_3705157')->references('id')->on('answers')->onDelete('cascade');
            $table->unsignedBigInteger('county_id');
            $table->foreign('county_id', 'county_id_fk_3705157')->references('id')->on('counties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer_county', function (Blueprint $table) {
            //
        });
    }
}
