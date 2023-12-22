@if (session('msg'))
    <p class="mB-16">{{ session('msg') }}</p>
@endif

    <div class="d-flex align-items-center mB-16">
        <form action="/dashboard/search/" method="GET" class="w-100">
            <div class="input-group">
                
                <input type="text" class="form-control" placeholder="Buscar" name="searchHours">
                <button class="btn btn-outline-secondary" type="submit" name="btnSearchHours">Buscar</button>
        
            </div>
        
        </form>
        
        <form action="/dashboard/register" method="POST" class="mL-16">
            @csrf
        
            <button type="submit" class="btn btn-outline-secondary" name="btnCreateHour">Registrar</button>
        
        </form>
    </div>
    @if (isset($hours) && count($hours) > 0)

    <table class="table table-borderless table-responsive shadow">
        <thead>

            <tr class="border-top border-bottom">
                <th scope="col" class="border-end pL-16">Dia</th>
                <th scope="col" class="border-end pL-16">Hora de entrada</th>
                <th scope="col" class="border-end pL-16">Entrada Almoço</th>
                <th scope="col" class="border-end pL-16">Saída Almoço</th>
                <th scope="col">Hora de saída</th>
            </tr>
            
        </thead>
        <tbody>
        
                @foreach ($hours as $hour)
                    <tr class="border-bottom">
                        <th scope="row" class="border-end pL-16">{{ date('d/m/Y', strtotime($hour->entrance)) }}</th>
                        <td class="border-end pL-16">{{ date('H:i:s', strtotime($hour->entrance)) }}</td>
                        <td class="border-end pL-16">

                            @if ($hour->entrance_lunch == "")
                                00:00:00
                            @else
                                {{ date('H:i:s', strtotime($hour->entrance_lunch)) }}
                            @endif
                            

                        </td>
                        <td class="border-end pL-16">

                            @if ($hour->exit_lunch == "")
                                00:00:00
                            @else
                                {{ date('H:i:s', strtotime($hour->exit_lunch)) }}
                            @endif

                        </td>
                        <td>

                            @if ($hour->exit == "")
                                00:00:00
                            @else
                                {{ date('H:i:s', strtotime($hour->exit)) }}
                            @endif

                        </td>
                    </tr>
                @endforeach
            
            @else
                <p>Nenhum registro foi encontrado, <a href="/dashboard" style="color: blue">ver todos</a></p>
            @endif

        </tbody>

    </table>


