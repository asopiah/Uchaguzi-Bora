<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerConstituencyPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_constituency', function (Blueprint $table) {
            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id', 'answer_id_fk_3705159')->references('id')->on('answers')->onDelete('cascade');
            $table->unsignedBigInteger('constituency_id');
            $table->foreign('constituency_id', 'constituency_id_fk_3705159')->references('id')->on('constituencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer_constituency', function (Blueprint $table) {
            //
        });
    }
}
