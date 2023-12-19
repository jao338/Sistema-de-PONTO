<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HourController extends Controller{
    
    public function index(){

        //  Recupera o usuário autenticado
        $user = auth()->user();

        //  Recupera todos os registros de horário com base no id do usuário autenticado
        $hour = Hour::all()->where('user_id', $user->id);

        //  Retorna a view dashboard passando o objeto "hours"
        return view("/dashboard", ['hours' => $hour]);
    }

    // public function register(){
        
    //     //  Objeto da classe "Hour"
    //     $hour = new Hour();

    //     $currentTime = Carbon::now()->format('Y-m-d H:i:s');
        
    //     //  Recupera o usuário autenticado
    //     $user = auth()->user();

    //     $allHours = Hour::all()->where('user_id', $user->id);

    //     foreach ($allHours as $item) {

    //         if(($item->entrance)->format('Y-m-d') == (Carbon::now()->format('Y-m-d'))){
    //             return redirect('/dashboard')->with('msg', "As datas são iguais");

    //         }else{
                
    //             //  Define os valores dos atributos do objeto "hour"
    //             $hour->user_id = $user->id;
    //             $hour->entrance = $currentTime;
        
    //             //  Salva no banco da dados
    //             $hour->save();
        
    //             //  Redireciona para dashboard com uma flash message
    //             return redirect('/dashboard')->with('msg', "Registrado com sucesso");

    //         }
    //     }
        
    // }

    public function register(){

        $user = auth()->user();
        
        $currentTime = Carbon::now()->format('Y-m-d H:i:s');

        $search = Hour::where('user_id', '=', "$user->id")->get();

        $hour = new Hour();

        $hour->user_id = $user->id;
        $hour->entrance = $currentTime;

        // $hour->save();

        return view("dashboard", ['search' => $search])->with("msg", "Registrado com sucesso");

    }

}
