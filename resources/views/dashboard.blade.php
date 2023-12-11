<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus horários') }}
        </h2>

        <span id="clock" class="fw-bolder">00:00:00</span>

    </x-slot>

    {{-- Listagem dos horários --}}

    @if (session('msg'))
        <p class="mB-16">{{ session('msg') }}</p>
    @endif

    <table class="table table-borderless shadow rounded ">
        <thead>
            <tr>

                <th class="d-flex align-items-center">
                    <span class="fw-bolder">Sistema PONTO</span>
                </th>

                <th></th>
                <th></th>
                <th></th>

                <form action="/dashboard" method="POST">
                    @csrf
                    <th class="d-flex justify-content-end">
                        <button class="btn btn-light border">Registrar</button>
                    </th>
                </form>
            </tr>            

            <tr class="border-top border-bottom">
                <th scope="col" class="border-end">Dia</th>
                <th scope="col" class="border-end">Hora de entrada</th>
                <th scope="col" class="border-end">Entrada Almoço</th>
                <th scope="col" class="border-end">Saída Almoço</th>
                <th scope="col">Hora de saída</th>
            </tr>
            
        </thead>
        <tbody>
            
            @if (isset($hours) && count($hours) > 0)
            
                @foreach ($hours as $hour)
                    <tr class="border-bottom">
                        <th scope="row" class="border-end">{{ $hour->entrance }}</th>
                        <td class="border-end">{{ $hour->entrance }}</td>
                        <td class="border-end">{{ $hour->entrance_lunch }}</td>
                        <td class="border-end">{{ $hour->exit_lunch }}</td>
                        <td>{{ $hour->exit }}</td>
                    </tr>
                @endforeach
            
            @else
                <tr class="border-bottom">
                    <th scope="row" class="border-end">XX</th>
                    <td class="border-end">XX:XX:XX</td>
                    <td class="border-end">XX:XX:XX</td>
                    <td class="border-end">XX:XX:XX</td>
                    <td>XX:XX:XX</td>
                </tr>
            @endif

        </tbody>

    </table>

    <script>
        
    let clock = document.querySelector("#clock");

    //  Seleciona e troca o texto do elemento de "#clock" pelo horário atual
    function updateClock(){

        let date = new Date();

        let hours = fixZero(date.getHours()) + ":" + fixZero(date.getMinutes()) + ":" + fixZero(date.getSeconds());

        clock.innerHTML = hours;
    }

    //  Verifica se o argumento passado é menor que 10, caso seja retorna zero concatenado com o argumento. Caso seja igual ou maior que 10, retorna o próprio argumento
    function fixZero(time){

        return time < 10 ? `0${time}` : time;

    }

    //  Chama a função "updateClock()" a cada 1 sec
    setInterval(updateClock, 1000);
    updateClock();

    </script>
    
</x-app-layout>


