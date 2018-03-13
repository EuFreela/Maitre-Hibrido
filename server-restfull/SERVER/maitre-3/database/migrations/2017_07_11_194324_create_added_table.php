<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('added', function (Blueprint $table) {
            $table->increments('idAdded');
            $table->string('codeAdded');
            $table->string('nameAdded');
            $table->text('description');
            $table->timestamps();
            $table->index('idAdded');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('added');
    }
}
