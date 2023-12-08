<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HourController extends Controller{
    
    public function index(){

        return view("/dashboard");
    }

    public function teste(){

        return view("/dashboard")->with('msg', "Registrado com sucesso!");
    }

}
