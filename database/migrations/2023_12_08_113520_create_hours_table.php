<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        //  Ao criar a migration o certo seria "dateTime" ao invés de "datetime". Esse erro faz com que o tipo da coluna seja do apenas "date"
        Schema::create('hours', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime("entrance");
            $table->datetime("entrance_lunch");
            $table->datetime("exit");
            $table->datetime("exit_lunch");
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hours');
    }
};
