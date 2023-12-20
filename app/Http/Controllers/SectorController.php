<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;

class SectorController extends Controller{
    
    public function index(){

        $sectors = Sector::all();

        $user = auth()->user();

        if($user->sec_id != "1"){
            return view("dashboard");
        }

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

    public function show($id){

        $sector = Sector::findOrFail($id);

        return view("dashboard", ['sector' => $sector]);
    }

    public function edit(Request $request, $id){

        $sector = Sector::findOrFail($id);

        return view("dashboard", ['sector' => $sector]);
    }

    public function update(Request $request, $id){

        $data = $request->all();

        if(!$sector = Sector::find($id)){
            return redirect()->back();  //  Caso não encontre o registro, redireciona de volta para a página anterior
        }

        $sector->update($data);

        return redirect("dashboard")->with('msg', "Atualizado com sucesso");

    }

    public function destroy($id){

        Sector::findOrFail($id)->delete();

        return redirect("dashboard")->with('msg', "Excluído com sucesso");
    }

    public function search(Request $request){
        
        $sectors = Sector::where('name', 'LIKE', "%$request->sectorsSearch%")
            ->orWhere('description', 'LIKE', "%$request->sectorsSearch%")
            ->get();

        return view("dashboard", ['sectors' => $sectors]);
    }

}
