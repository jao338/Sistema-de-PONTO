<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;

class SectorController extends Controller{
    
    public function index(){

        $sectors = Sector::all();

        return view("dashboard", ['sectors' => $sectors]);

    }

    public function create(){
        
        return view("dashboard");
    }

    public function store(Request $request){

        $sector = new Sector();

        $sector->name = $request->name;
        $sector->description = $request->description;
        $sector->entrance = $request->entrance;
        $sector->exit = $request->exit;

        $sector->save();

        return redirect("dashboard")->with("msg", "Setor cadastrado com sucesso!");

    }

}
