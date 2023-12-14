<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class UserController extends Controller{
    
    public function index(){

        return view("dashboard");

    }

    public function create(){

        $sectors = Sector::all();

        return view("dashboard", ['sectors' => $sectors]);
        
    }

}
