<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJunctionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('users_patterns', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('pattern_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pattern_id')->references('id')->on('patterns');
        });


        Schema::create('patterns_themes', function (Blueprint $table) {
            $table->unsignedInteger('pattern_id');
            $table->unsignedInteger('theme_id');
            $table->unsignedSmallInteger('section_id');
            $table->foreign('pattern_id')->references('id')->on('patterns');
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->foreign('section_id')->references('id')->on('sections');
        });


        Schema::create('users_patterns_sections', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('pattern_id');
            $table->unsignedSmallInteger('section_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pattern_id')->references('id')->on('patterns');
            $table->foreign('section_id')->references('id')->on('sections');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sections');
    }
}
