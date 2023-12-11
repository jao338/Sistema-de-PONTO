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
        Schema::table('hours', function (Blueprint $table) {
            $table->dateTime('entrance')->change();
            $table->dateTime('entrance_lunch')->change();
            $table->dateTime('exit')->change();
            $table->dateTime('exit_lunch')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('hours', function (Blueprint $table) {
            $table->dateTime('entrance')->change();
            $table->dateTime('entrance_lunch')->change();
            $table->dateTime('exit')->change();
            $table->dateTime('exit_lunch')->change();
        });
    }
};
