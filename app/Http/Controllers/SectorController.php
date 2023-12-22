<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;

class SectorController extends Controller{
    
    public function index(){

        //  Recupera todos os dados dos setores
        $sectors = Sector::all();

        //  Recupera o usuário autenticado
        $user = auth()->user();

        //  Caso o usuário seja de qualquer setor menos T.I, ele será redirecionado para a dashboard sem nenhum valor
        if($user->sec_id != "1"){
            return view("dashboard");
        }

        //  Retorna a view de dashboard com uma coleção de objetos
        return view("dashboard", ['sectors' => $sectors]);

    }

    public function create(){
        
        //  Retorna a view de dashboard
        return view("dashboard");
    }

    public function store(Request $request){

        //  Objeto da classe "Sector"
        $sector = new Sector();

        //  Preenchimento dos atributos do objeto com os dados do request
        $sector->name = $request->name;
        $sector->description = $request->description;
        $sector->entrance = $request->entrance;
        $sector->exit = $request->exit;

        //  Salva no banco de dados
        $sector->save();

        //  Redireciona para a view de dashboard
        return redirect("dashboard")->with("msg", "Setor cadastrado com sucesso!");

    }

    public function show($id){

        //  Busca um setor específico pelo $id
        $sector = Sector::findOrFail($id);

        //  Retorna a view de dashboard com uma coleção de objetos
        return view("dashboard", ['sector' => $sector]);
    }

    public function edit(Request $request, $id){

        //  Busca um setor específico pelo $id
        $sector = Sector::findOrFail($id);

        //  Retorna a view de dashboard com uma coleção de objetos
        return view("dashboard", ['sector' => $sector]);
    }

    public function update(Request $request, $id){

        //  Recupera todos os dados do request
        $data = $request->all();

        //  Caso não encontre o registro, redireciona de volta para a página anterior
        if(!$sector = Sector::find($id)){
            return redirect()->back();  
        }

        //  Atualiza no banco de dados
        $sector->update($data);

        //  Redireciona para a view de dashboard
        return redirect("dashboard")->with('msg', "Atualizado com sucesso");

    }

    public function destroy($id){

        //  Busca um setor específico pelo $id e o deleta
        Sector::findOrFail($id)->delete();

        //  Redireciona para a view de dashboard
        return redirect("dashboard")->with('msg', "Excluído com sucesso");
    }

    public function search(Request $request){
        
        //  Recupera todos os registros dos setores que possuam a descrição semelhante ao do request
        $sectors = Sector::where('name', 'LIKE', "%$request->sectorsSearch%")
            ->orWhere('description', 'LIKE', "%$request->sectorsSearch%")
            ->get();

        //  Retorna a view de dashboard com uma coleção de objetos
        return view("dashboard", ['sectors' => $sectors]);
    }

}
