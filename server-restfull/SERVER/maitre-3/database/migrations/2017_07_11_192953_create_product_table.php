<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('idProduct');            
            $table->string('category_codeCategory');
            $table->string('codeProduct')->unique();
            $table->integer('stockProduct');
            $table->string('nameProduct')->unique();                      
            $table->text('description')->nullable();
            $table->string('img')->unique();
                                    
            $table->timestamps();
            $table->index('codeProduct');

            $table->foreign('category_codeCategory')->references('codeCategory')->on('category')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
