<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Hour;
use Carbon\Carbon;
use Cmixin\BusinessTime;
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
        
        //  Recupera o horário atual formatado com o formato ('Y-m-d H:i:s')
        $currentTime = Carbon::now()->format('Y-m-d H:i:s');

        BusinessTime::enable(Carbon::class);

        //  Verifica se o dia atual é feriado ou final de semana, ou seja não é um dia útil
        if(!Carbon::isBusinessDay()){

            return redirect("dashboard", 301)->with("msg", "Hoje não é um dia útil");

        }

        //  Recupera todos os registros de horário com base no id do usuário autenticado
        $search = Hour::where('user_id', '=', "$user->id")->get();
        
        //  Objeto da classe "Hour"
        $hour = new Hour();
        
        //  Verifica se existe algum registro desse usuário.
        if(count($search) > 0){
            
            //  Caso o valor de coluna de entrada for igual o dia de atual, um update é feito. Caso contrário, um novo registro é inserido no banco de dados
            foreach ($search as $item) {

                //  Verifica em cada registro se a data atual ja foi preenchida na coluna "entrance"
                if($item->entrance->format('Y-m-d') == Carbon::now()->format('Y-m-d')){
            
                    //  Caso o valor da coluna seja nulo.
                    if ($item->entrance_lunch == NULL) {
                
                        //  Atualiza o registro de entrada para o almoço
                        Hour::where('id', $item->id)->update(['entrance_lunch' => $currentTime]);

                        //  Redireciona para a view de dashboard
                        return redirect("dashboard", 301)->with("msg", "Entrada para o almoço registrada");

                    //  Caso o valor dessa coluna seja nulo.
                    }elseif($item->exit_lunch == NULL){

                        //  Atualiza o registro de saida do almoço
                        Hour::where('id', $item->id)->update(['exit_lunch' => $currentTime]);

                        //  Redireciona para a view de dashboard
                        return redirect("dashboard", 301)->with("msg", "Saída do almoço registrada");

                    //  Caso o valor dessa coluna seja nulo.
                    }elseif($item->exit == NULL){

                        //  Atualiza o registro de saída
                        Hour::where('id', $item->id)->update(['exit' => $currentTime]);

                        //  Redireciona para a view de dashboard
                        return redirect("dashboard", 301)->with("msg", "Saída registrada");

                    //  Caso todas as colunas já estejam preenchidas
                    }else{
                        
                        //  Redireciona para a view de dashboard
                        return redirect("dashboard", 301)->with("msg", "Todos os horários já foram registrados");
                
                    }
                //  Caso não exista nenhum registro com a data atual, um insert é feito.
                }else{
                    $hour->user_id = $user->id;
                    $hour->entrance = $currentTime;
                
                    $hour->save();

                    //  Redireciona para a view de dashboard. O status 301 significa que a URL foi redirecionada permanentemente
                    return redirect("dashboard", 301)->with("msg", "Entrada registrada");
                }
            }

        //  Caso não exista nenhum registro desse usuário, um insert é feito.
        }else{
            
            $hour->user_id = $user->id;
            $hour->entrance = $currentTime;
        
            $hour->save();

            //  Redireciona para a view de dashboard. O status 301 significa que a URL foi redirecionada permanentemente
            return redirect("dashboard", 301)->with("msg", "Entrada registrada");

        }
        

    }

    public function export(){

        //  Recupera o usuário autenticado
        $user = auth()->user();

        // $data = Hour::where('user_id', '=', "$user->id")->get();

        //  Exporta o model "Hour" com TODOS os registros de TODOS os usuários
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
