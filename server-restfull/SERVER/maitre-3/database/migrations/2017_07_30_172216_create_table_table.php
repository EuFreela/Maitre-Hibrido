<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table', function (Blueprint $table) {
            $table->increments('idTable');
            $table->integer('status_codestatus');
            $table->string('ip')->nullable();
            $table->string('codeTable')->unique();
            $table->string('token')->unique();
            $table->string('img')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('status_codestatus')->references('codeStatus')->on('status')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table');
    }
}
