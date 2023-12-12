<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus horários') }}
        </h2>

        <span id="clock" class="fw-bolder">00:00:00</span>

    </x-slot>

    @php
        $currentRoute = request()->route()->getName();
    @endphp

    @if ($currentRoute == "dashboard")
        
        @include('sections/hours')

    @elseif($currentRoute == "dashboard-users")
        
        @include('sections/users')

    @elseif($currentRoute == "dashboard-sectors")

        @include('sections/sectors')

    @endif
    
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


