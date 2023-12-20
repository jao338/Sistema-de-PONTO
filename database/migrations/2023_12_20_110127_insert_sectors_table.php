<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        DB::table('sectors')->insert([
            ['name' => 'T.I', 
            'description' => "Faz de tudo um pouco",
            'entrance' => "08:00:00",
            'exit' => "18:00:00"],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('sectors')->whereIn('name', ['T.I'])->delete();
    }
};
