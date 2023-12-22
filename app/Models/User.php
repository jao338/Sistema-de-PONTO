<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Hashing\HashManager;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     // Define quais colunas podem ser preenchidas em massa
    protected $fillable = [
        'name',
        'email',
        'password',
        'sec_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

     // Converte os atributos automaticamente para um tipo de dado especifico
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //  Um ou muitos usuários podem possuir um ou muitos horários
    public function hours(){

        return $this->hasMany(Hour::class);

    }

    //  Um ou muitos usuários pertencem a um setor
    public function sector(){
     
        return $this->belongsTo(Sector::class);

    }
}
