<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model{
    use HasFactory;

    //  Define todos os campos do banco de dados devem ser tratados como objetos Carbon, uma biblioteca de manipulação de datas
    protected $dates = ['entrance', 'entrance_lunch', 'exit', 'exit_lunch'];

    //  Um ou muitos horários pertencem a um usuário
    public function user(){

        return $this->belongsTo(User::class);

    }
}
