<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            $table->unsignedBigInteger('county_id');
            $table->foreign('county_id', 'county_fk_3705124')->references('id')->on('counties');
            $table->unsignedBigInteger('constituency_id');
            $table->foreign('constituency_id', 'constituency_fk_3705125')->references('id')->on('constituencies');

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
        Schema::table('wards', function (Blueprint $table) {
            //
        });
    }
}
