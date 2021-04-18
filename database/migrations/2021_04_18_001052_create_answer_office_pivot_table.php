<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerOfficePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answer_office', function (Blueprint $table) {
            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id', 'answer_id_fk_3705220')->references('id')->on('answers')->onDelete('cascade');
            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id', 'office_id_fk_3705220')->references('id')->on('offices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer_office', function (Blueprint $table) {
            //
        });
    }
}
