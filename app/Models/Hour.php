<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model{
    use HasFactory;

    protected $dates = ['entrance', 'entrance_lunch', 'exit', 'exit_lunch'];

}
