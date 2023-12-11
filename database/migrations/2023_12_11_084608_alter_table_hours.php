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
            
            $table->date('entrance')->nullable()->change();
            $table->date('entrance_lunch')->nullable()->change();
            $table->date('exit')->nullable()->change();
            $table->date('exit_lunch')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('hours', function (Blueprint $table) {
            $table->date('entrance')->change();
            $table->date('entrance_lunch')->change();
            $table->date('exit')->change();
            $table->date('exit_lunch')->change();
        });
    }
};
