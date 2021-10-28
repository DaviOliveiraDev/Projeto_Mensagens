<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAvisoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aviso_user', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id') ->references('id')->on('users')
                  ->nullable()
                  ->onDelete('cascade');

            $table->unsignedBigInteger('aviso_id');
            $table->foreign('aviso_id')->references('id')->on('aviso')
                  ->nullable()
                  ->onDelete('cascade');

            $table->dateTime('dt_lido', $precision = 0)
                  ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aviso_user');
    }
}
