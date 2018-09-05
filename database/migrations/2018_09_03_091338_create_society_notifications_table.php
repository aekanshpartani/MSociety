<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocietyNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('society_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('society_id')->unsigned();
            $table->text('title');
            $table->text('description');
            $table->timestamps();
        });



        Schema::table('society_notifications', function($table) {
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
        Schema::dropIfExists('society_notifications');
    }
}
