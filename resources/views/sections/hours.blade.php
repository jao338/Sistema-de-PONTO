{{-- Listagem dos horários --}}

@if (session('msg'))
    <p class="mB-16">{{ session('msg') }}</p>
@endif

    <table class="table table-borderless shadow rounded ">
        <thead>
            <tr>

                <th class="d-flex align-items-center">
                    <span class="fw-bolder">Registrar entrada</span>
                </th>

                <th></th>
                <th></th>
                <th></th>

                <form action="/dashboard" method="POST">
                    @csrf
                    <th class="d-flex justify-content-end">
                        <button class="btn btn-outline-secondary">Registrar</button>
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

    

