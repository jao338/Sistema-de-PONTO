<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model{
    use HasFactory;

    protected $casts = [
        'entrance' => 'datetime',
        'entrance_lunch' => 'datetime',
        'exit_lunch' => 'datetime',
        'exit' => 'datetime',        

    ];

    protected $dates = ['entrance', 'entrance_lunch', 'exit', 'exit_lunch'];

    protected $fillable = ['entrance', 'entrance_lunch', 'exit', 'exit_lunch'];

    public function user(){

        return $this->belongsTo(User::class);

    }
}
