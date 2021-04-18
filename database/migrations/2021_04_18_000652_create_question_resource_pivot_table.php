<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionResourcePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_resource', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id', 'question_id_fk_3705087')->references('id')->on('questions')->onDelete('cascade');
            $table->unsignedBigInteger('resource_id');
            $table->foreign('resource_id', 'resource_id_fk_3705087')->references('id')->on('resources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_resource', function (Blueprint $table) {
            //
        });
    }
}
