<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    
    public function index(){

        $user = auth()->user();

        if($user->sec_id != "1"){
            return view("dashboard");
        }

        $users = User::join('sectors', 'sec_id', '=', 'sectors.id')
        ->select('users.*', 'sectors.name as sector_name')
        ->get();

        return view("dashboard", ['users' => $users]);
    }

    public function create(){

        $sectors = Sector::all();

        return view("dashboard", ['sectors' => $sectors]);
        
    }

    public function store(Request $request){

        $data = $request->all();

        //  Cria uma hash do tipo BCRYPT de custo 10 (As configurações do algoritmo estão presentes no arquivo "hashing.php" do laravel)
        $hash = Hash::make($data['password']);

        //  Substitui o item 'password' do array "$data" pelo novo hash
        $data['password'] = $hash;

        //  Cria uma instância de um objeto e salva no bando de dados
        User::create($data);

        return redirect("dashboard")->with("msg", "Usuário cadastrado com sucesso");

    }

    public function show($id){

        $user = User::findOrFail($id);

        return view("dashboard", ['user' => $user]);
    }

    public function destroy($id){

        User::findOrFail($id)->delete();

        return redirect("dashboard")->with('msg', "Excluído com sucesso");
    }

    public function search(Request $request){

        $users = User::where('name', 'LIKE', "%$request->searchUsers%")
            ->get();

        // $users = User::join('sectors', 'sec_id', '=', 'sectors.id')
        // ->select('users.*','sectors.name as sector_name')
        // ->where("users.name", $request->searchUsers)
        // ->get();

        // dd($users);

        return view("dashboard", ['users' => $users]);
    }

    public function edit($id){

        $user = User::findOrFail($id);
        
        $sectors = Sector::all();

        return view("dashboard", ['user' => $user, 'sectors' => $sectors]);

    }

    public function update(Request $request, $id){

        $data = $request->all();

        $hash = Hash::make($data['password']);

        $data['password'] = $hash;

        if(!$user = User::find($id)){
            return redirect()->back();  //  Caso não encontre o registro, redireciona de volta para a página anterior
        }

        $user->update($data);

        return redirect("dashboard")->with('msg', "Atualizado com sucesso");

    }

}
