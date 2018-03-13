<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitchenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitchen', function (Blueprint $table) {
            $table->increments('idKitchen')->index();                                 
            $table->integer('command_idcommand')->unsigned();                        
            $table->timestamps();     
           
            $table->foreign('command_idcommand')->references('idCommand')->on('command')->onUpate('cascade');           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kitchen');
    }
}
