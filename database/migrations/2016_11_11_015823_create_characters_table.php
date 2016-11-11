<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();

            // Table-specific fields
            $table->string('prefix', config('field_lengths.prefix'))->nullable();
            $table->string('first_name', config('field_lengths.first_name'));
            $table->string('middle_name', config('field_lengths.middle_name'))->nullable();
            $table->string('last_name', config('field_lengths.last_name'));
            $table->string('suffix', config('field_lengths.suffix'))->nullable();
            $table->string('short_description', config('field_lengths.short_description'));
            $table->string('long_description', config('field_lengths.long_description'))->nullable();
            $table->integer('sex')->unsigned();
            $table->foreign('sex')->references('id')->on('sexes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('characters');
    }
}
