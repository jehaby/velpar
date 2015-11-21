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

        Schema::create('user_pattern', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('pattern_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pattern_id')->references('id')->on('patterns')->onDelete('cascade');
        });


        Schema::create('pattern_section', function (Blueprint $table) {
            $table->unsignedInteger('pattern_id');
            $table->unsignedSmallInteger('section_id');
            $table->foreign('pattern_id')->references('id')->on('patterns')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('restrict');
        });


        Schema::create('pattern_prefix', function (Blueprint $table) {
            $table->unsignedInteger('pattern_id');
            $table->unsignedSmallInteger('prefix_id');
            $table->foreign('pattern_id')->references('id')->on('patterns')->onDelete('cascade');
            $table->foreign('prefix_id')->references('id')->on('prefixes')->onDelete('restrict');
        });


        Schema::create('pattern_theme', function (Blueprint $table) {
            $table->unsignedInteger('pattern_id');
            $table->unsignedInteger('theme_id');
            $table->foreign('pattern_id')->references('id')->on('patterns')->onDelete('cascade');
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_pattern');
        Schema::drop('pattern_section');
        Schema::drop('pattern_prefix');
        Schema::drop('pattern_theme');
    }
}
