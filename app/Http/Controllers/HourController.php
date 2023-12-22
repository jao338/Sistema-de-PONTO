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

        $user = auth()->user();
        
        $currentTime = Carbon::now()->format('Y-m-d H:i:s');

        $search = Hour::where('user_id', '=', "$user->id")->get();
        
        $hour = new Hour();
        
        //  Verifica se existe algum registro desse usuário
        if(count($search) > 0){

            $msg = NULL;

            foreach ($search as $item) {

                //  Caso o valor de coluna de entrada for igual o dia de atual, um update deve ser feito. Caso contrário, é inseri no banco de dados
                if($item->entrance->format('Y-m-d') == Carbon::now()->format('Y-m-d')){
            
                    if ($item->entrance_lunch == NULL) {
                
                        $msg = "Entrada para o almoço registrada";

                        //  Atualiza o registro de entrada para o almoço
                        Hour::where('id', $item->id)->update(['entrance_lunch' => $currentTime]);

                    }elseif($item->exit_lunch == NULL){

                        $msg = "Saída para o almoço registrada";

                        //  Atualiza o registro de saida do almoço
                        Hour::where('id', $item->id)->update(['exit_lunch' => $currentTime]);


                    }elseif($item->exit == NULL){

                        $msg = "Saída registrada";

                        //  Atualiza o registro de saída
                        Hour::where('id', $item->id)->update(['exit' => $currentTime]);

                    }else{
                        
                        $msg = "Todos os horário ja foram registrados";

                    }

                }else{
                    

                    $hour->user_id = $user->id;
                    $hour->entrance = $currentTime;
            
                    $hour->save();
                    
                    $msg = "Entrada registrada";

                }
            }

            return redirect("dashboard", 301)->with("msg", $msg);

        }else{
            

            $hour->user_id = $user->id;
            $hour->entrance = $currentTime;
        
            $hour->save();

            //  O status 301 significa que a URL foi redirecionamento permanentemente
            return redirect("dashboard", 301)->with("msg", "Entrada registrada");

        }
        

    }

    public function export(){

        $user = auth()->user();

        $data = Hour::where('user_id', '=', "$user->id")->get();

        return Excel::download(new UsersExport, 'hours.xlsx');

    }

}
