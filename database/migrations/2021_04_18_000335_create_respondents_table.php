<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('respondents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('respondentcategory_id')->nullable();
            $table->foreign('respondentcategory_id', 'respondentcategory_fk_3705076')->references('id')->on('respondent_categories');
            $table->string('name')->nullable();
            $table->integer('age')->nullable();
            $table->string('gander')->nullable();
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
        Schema::table('respondents', function (Blueprint $table) {
            //
        });
    }
}
