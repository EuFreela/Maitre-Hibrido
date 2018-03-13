<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('command', function (Blueprint $table) {
            $table->increments('idCommand')->index();            
            $table->string('menu_codeMenu');
            $table->integer('amount');                        
            $table->string('table_token');
            $table->integer('status');            
            $table->timestamps();
            $table->foreign('menu_codeMenu')->references('codeMenu')->on('menu')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('command');
    }
}
