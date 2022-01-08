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
            $table->increments('id')->unsigned();
            $table->string('firstname', 60);
            $table->string('lastname', 60);
            $table->string('job', 255);
            $table->string('institution', 255);
            $table->string('departement', 255)->nullable();
            $table->string('role', 255)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')
                                        ->on('regions')
                                        ->onDelete('restrict')
                                        ->onUpdate('restrict');
            $table->integer('responsable_id')->unsigned();
            $table->foreign('responsable_id')->references('id')
                                             ->on('responsables')
                                             ->onDelete('restrict')
                                             ->onUpdate('restrict');
            $table->rememberToken();
            $table->timestamps();
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
