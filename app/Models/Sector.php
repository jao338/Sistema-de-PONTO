<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model{
    use HasFactory;

    // Define quais colunas podem ser preenchidas em massa
    protected $fillable = ['name', 'entrance', 'exit', 'description'];

    //  Um setor pode ter um ou muitos usuários
    public function users(){

        return $this->hasMany(User::class);

    }
}
