<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNivelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nivel', function (Blueprint $table) {
            $table->increments('idNivel');
            $table->string('codeNivel');
            $table->string('nameNivel');
            $table->text('description');
            $table->timestamps();
            $table->index('idNivel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nivel');
    }
}
