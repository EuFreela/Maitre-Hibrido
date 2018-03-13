<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nivel_idnivel')->unsigned();
            $table->integer('status_codestatus')->unsigned();
            $table->integer('department_iddepartment')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('api_token', 60)->unique();
            $table->rememberToken();
            $table->timestamps();

            $table->index('id');

            $table->foreign('nivel_idnivel')->references('idNivel')->on('nivel')->onUpdate('cascade');
            $table->foreign('status_codestatus')->references('codeStatus')->on('status')->onUpdate('cascade');
            $table->foreign('department_iddepartment')->references('idDepartment')->on('department')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
