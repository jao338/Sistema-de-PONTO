<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller{
    
    public function index(){

        //  Recupera o usuário autenticado
        $user = auth()->user();

        //  Caso o usuário seja de qualquer setor menos T.I, ele será redirecionado para a dashboard sem nenhum valor
        if($user->sec_id != "1"){
            return view("dashboard");
        }

        //  Recupera todos os dados de todos os usuários juntamente das informações de cada setor
        $users = User::join('sectors', 'sec_id', '=', 'sectors.id')
        ->select('users.*', 'sectors.name as sector_name')
        ->get();

        //  Retorna a view de dashboard com uma coleção de objetos
        return view("dashboard", ['users' => $users]);
    }

    public function create(){

        //  Recupera todos os dados dos setores, esses valores serão utilizados no input de setores na view de criação de usuário
        $sectors = Sector::all();

        //  Retorna a view de dashboard com uma coleção de objetos
        return view("dashboard", ['sectors' => $sectors]);
        
    }

    public function store(Request $request){

        //  Recupera todos os dados do request
        $data = $request->all();

        //  Cria uma hash do tipo BCRYPT de custo 10 (As configurações do algoritmo estão presentes no arquivo "hashing.php" do laravel)
        $hash = Hash::make($data['password']);

        //  Substitui o item 'password' do array "$data" pelo novo hash
        $data['password'] = $hash;

        //  Cria uma instância de um objeto e salva no bando de dados
        User::create($data);

        //  Redireciona para a view de dashboard
        return redirect("dashboard")->with("msg", "Usuário cadastrado com sucesso");

    }

    public function show($id){

        //  Busca um usuário específico pelo $id
        $user = User::findOrFail($id);

        $users = User::join('sectors', 'sec_id', '=', 'sectors.id')
            ->select('users.*', 'sectors.name as sector_name')
            ->where('users.id', $user->id)
            ->first();

        // dd($users);
        
        //  Retorna a view de dashboard com um coleção de objetos 
        return view("dashboard", ['user' => $users]);
    }

    public function destroy($id){

        //  Busca um usuário específico pelo $id
        User::findOrFail($id)->delete();

        //  Redireciona para a view de dashboard
        return redirect("dashboard")->with('msg', "Excluído com sucesso");
    }

    public function search(Request $request){

        //  Recupera todos os registros dos usuários que possuam o nome de usuário ou setor semelhante ao do request
        $users = User::join('sectors', 'sec_id', '=', 'sectors.id')
            ->select('users.*','sectors.name as sector_name')
            ->where('users.name', 'LIKE', '%' . $request->searchUsers . '%')
            ->orWhere('sectors.name', 'LIKE', '%' . $request->searchUsers . '%')
            ->get();

        //  Retorna a view de dashboard com uma coleção de objetos
        return view("dashboard", ['users' => $users]);
    }

    public function edit($id){

        //  Busca um usuário específico pelo $id
        $user = User::findOrFail($id);
        
        //  Recupera todos os dados dos setores
        $sectors = Sector::all();

        //  Retorna a view dashboard com duas coleções de objetos
        return view("dashboard", ['user' => $user, 'sectors' => $sectors]);

    }

    public function update(Request $request, $id){

        //  Recupera todos os dados do request
        $data = $request->all();

        //  Cria uma hash do tipo BCRYPT de custo 10 (As configurações do algoritmo estão presentes no arquivo "hashing.php" do laravel) 
        $hash = Hash::make($data['password']);

        //  Substitui o item 'password' do array "$data" pelo novo hash
        $data['password'] = $hash;

        //  Caso não encontre o usuário, redireciona de volta para a página anterior
        if(!$user = User::find($id)){
            return redirect()->back();
        }

        //  Atualiza no banco de dados
        $user->update($data);

        //  Redireciona para a view de dashboard
        return redirect("dashboard")->with('msg', "Atualizado com sucesso");

    }

}
