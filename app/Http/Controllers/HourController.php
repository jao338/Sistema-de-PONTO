<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HourController extends Controller{
    
    public function index(){

        return view("/dashboard");
    }

    public function register(){
        
        $hour = new Hour();
        $user = auth()->user();

        $hour->user_id = $user->id;
        $hour->entrance = Carbon::now()->format('Y-m-d H:i:s');

        $hour->save();

        return redirect('/dashboard')->with('msg', "Registrado com sucesso");

    }

}
