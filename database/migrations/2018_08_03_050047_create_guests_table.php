<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('is_approved')->default(0);
            $table->integer('owner_id')->unsigned();
            $table->integer('society_id')->unsigned();
            $table->string('phone_no');
            $table->string('reason');
            $table->timestamps();
        });

        Schema::table('guests', function($table) {
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
            $table->foreign('society_id')->references('id')->on('societies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
