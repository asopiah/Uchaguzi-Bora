<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerSubCountyPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answer_sub_county', function (Blueprint $table) {
            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id', 'answer_id_fk_3705158')->references('id')->on('answers')->onDelete('cascade');
            $table->unsignedBigInteger('sub_county_id');
            $table->foreign('sub_county_id', 'sub_county_id_fk_3705158')->references('id')->on('sub_counties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer_sub_county', function (Blueprint $table) {
            //
        });
    }
}
