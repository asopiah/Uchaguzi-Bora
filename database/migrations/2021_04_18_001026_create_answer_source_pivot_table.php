<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerSourcePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answer_source', function (Blueprint $table) {
            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id', 'answer_id_fk_3705252')->references('id')->on('answers')->onDelete('cascade');
            $table->unsignedBigInteger('source_id');
            $table->foreign('source_id', 'source_id_fk_3705252')->references('id')->on('sources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer_source', function (Blueprint $table) {
            //
        });
    }
}
