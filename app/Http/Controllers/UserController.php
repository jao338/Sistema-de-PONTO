<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    
    public function index(){

        $users = User::all();

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

}
