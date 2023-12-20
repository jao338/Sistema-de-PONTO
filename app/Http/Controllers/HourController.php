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

    public function register(){

        $user = auth()->user();
        
        $currentTime = Carbon::now()->format('Y-m-d H:i:s');

        // $search = Hour::where('user_id', '=', "$user->id")->get();

        $hour = new Hour();

        $hour->user_id = $user->id;
        $hour->entrance = $currentTime;

        $hour->save();

        return redirect("dashboard", 302)->with("msg", "Registrado com sucesso");

    }

}
