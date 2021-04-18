<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->string('event')->nullable();

            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id', 'question_fk_3705093')->references('id')->on('questions');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id', 'country_fk_3705156')->references('id')->on('countries');

            $table->unsignedBigInteger('respondent_id')->nullable();
            $table->foreign('respondent_id', 'respondent_fk_3706231')->references('id')->on('respondents');

            $table->string('other_place')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            //
        });
    }
}
