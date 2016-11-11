<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->timestamps();

            $table->string('name',config('field_lengths.relationship'));
            $table->string('description', config('field_lengths.short_description'))->nullable();
            $table->integer('character')->unsigned();
            $table->integer('is_related_to')->unsigned();
            $table->foreign('character')->references('id')->on('characters')->onDelete('cascade');
            $table->foreign('is_related_to')->references('id')->on('characters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('relationships');
    }
}
