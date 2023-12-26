<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Hour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

        //  Recupera o usuário autenticado
        $user = auth()->user();
        
        //  Recupera o horário atual no formato "XXXX-XX-XX XX:XX:XX"
        $currentTime = Carbon::now()->format('Y-m-d H:i:s');
        
        //  Objeto da classe "Hour"
        $hour = new Hour();

        //  Busca em todos os registros onde "user_id" for igual ao usuáio autenticado e onde a coluna "entrance" for igual ao dia atual. O método "first()" retorna o primeiro registro encontrado
        $search = Hour::where('user_id', $user->id)
            ->whereDate('entrance', Carbon::now()->toDateString())
            ->first();

        //  Retorna "true" caso tenha encontrado algum registro. Ou seja, caso a data atual já tenha sido registrada.
        if ($search) {

            //  Caso a coluna "entrance_lunch" seja nula, ela é atualizada com o data atual
            if ($search->entrance_lunch === NULL) {

                $search->update(['entrance_lunch' => $currentTime]);
                $msg = "Entrada para o almoço registrada";

            //  Caso a coluna "exit_lunch" seja nula, ela é atualizada com o data atual
            } elseif ($search->exit_lunch === NULL) {

                $search->update(['exit_lunch' => $currentTime]);
                $msg = "Saída para o almoço registrada";

            //  Caso a coluna "exit" seja nula, ela é atualizada com o data atual
            } elseif ($search->exit === NULL) {

                $search->update(['exit' => $currentTime]);
                $msg = "Saída registrada";

            //  Caso contrário não faça nada
            } else {

                $msg = "Todos os horários já foram registrados";

            }

        //  Se o registro não for encontrado, um novo horário é registrado com a data atual
        } else {

            $hour->user_id = $user->id;
            $hour->entrance = $currentTime;

            $hour->save();

            $msg = "Entrada registrada";
        }

        //  Redireciona para a view de dashboard
        return redirect("dashboard", 301)->with("msg", $msg);


    }

    public function export(){

        $user = auth()->user();

        // $data = Hour::where('user_id', '=', "$user->id")->get();

        return Excel::download(new UsersExport, 'hours.xlsx');

    }

    public function search(Request $request){

        //  Recupera o usuário autenticado
        $user = auth()->user();

        //  Recupera as informações com base em uma data no formato "xxxx-xx-xx", em um dia específico ou em uma horário específico no formato "xx:xx:xx"
        $search = Hour::where("user_id", $user->id)
            ->whereDate("entrance", date("Y-m-d", strtotime($request->searchHours)))
            ->orWhere("user_id", $user->id)
            ->whereDay("entrance", $request->searchHours)
            ->orWhere("user_id", $user->id)
            ->whereTime("entrance", $request->searchHours)
            ->get();


        //  Retorna a view de dashboard com uma coleção de objetos
        return view("dashboard", ['hours' => $search]);

    }


}
