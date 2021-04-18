<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstituenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('constituencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->unsignedBigInteger('county_id');
            $table->foreign('county_id', 'county_fk_3705118')->references('id')->on('counties');
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
        Schema::table('constituencies', function (Blueprint $table) {
            //
        });
    }
}
