@if (session('msg'))
    <p class="mB-16">{{ session('msg') }}</p>
@endif

    <div class="d-flex align-items-center mB-16">
        <form action="#" method="GET" class="w-100">
            <div class="input-group">
                
                <input type="text" class="form-control" placeholder="Buscar" name="inputSearchHours">
                <button class="btn btn-outline-secondary" type="submit" name="btnSearchHours">Buscar</button>
        
            </div>
        
        </form>
        
        <form action="/dashboard/register" method="POST" class="mL-16">
            @csrf
        
            <button type="submit" class="btn btn-outline-secondary" name="btnCreateHour">Registrar</button>
        
        </form>
    </div>

    <table class="table table-borderless shadow">
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
            
            @if (isset($hours) && count($hours) > 0)
            
                @foreach ($hours as $hour)
                    <tr class="border-bottom">
                        <th scope="row" class="border-end pL-16">{{ date('d/m/Y', strtotime($hour->entrance)) }}</th>
                        <td class="border-end pL-16">{{ date('H:i:s', strtotime($hour->entrance)) }}</td>
                        <td class="border-end pL-16">{{ $hour->entrance_lunch }}</td>
                        <td class="border-end pL-16">{{ $hour->exit_lunch }}</td>
                        <td>{{ $hour->exit }}</td>
                    </tr>
                @endforeach
            
            @else
                <tr class="border-bottom">
                    <th scope="row" class="border-end pL-16">XX</th>
                    <td class="border-end pL-16">XX:XX:XX</td>
                    <td class="border-end pL-16">XX:XX:XX</td>
                    <td class="border-end pL-16">XX:XX:XX</td>
                    <td>XX:XX:XX</td>
                </tr>
            @endif

        </tbody>

    </table>
{{-- 
@if (isset($hours))
    @foreach ($hours as $item)
        <p>{{ $item->id }}</p>
    @endforeach
@else
    
@endif --}}

    

