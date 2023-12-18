{{-- Listagem dos horários --}}

@if (session('msg'))
    <p class="mB-16">{{ session('msg') }}</p>
@endif

    <table class="table table-borderless shadow">
        <thead>
            <tr>
                <th class="d-flex align-items-center pL-16">
                    <span class="fw-bolder">Registrar entrada</span>
                </th>

                <th></th>
                <th></th>
                <th></th>

                <form action="/dashboard" method="POST">
                    @csrf
                    <th class="d-flex justify-content-end pR-16">
                        <button class="btn btn-outline-secondary">Registrar</button>
                    </th>
                </form>
            </tr>            

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
                        <th scope="row" class="border-end pL-16">{{ $hour->entrance }}</th>
                        <td class="border-end pL-16">{{ $hour->entrance }}</td>
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

    

