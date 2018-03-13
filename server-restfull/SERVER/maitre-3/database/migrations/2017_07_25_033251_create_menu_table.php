<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('idMenu');            
            $table->string('product_codeproduct');
            $table->string('menucategory_code');
            $table->string('codeMenu')->index();            
            $table->string('titleMenu');
            $table->string('amount');
            $table->string('setup_time');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('product_codeproduct')->references('codeProduct')->on('product')->onUpdate('cascade');
            $table->foreign('menucategory_code')->references('code')->on('menu_category')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
