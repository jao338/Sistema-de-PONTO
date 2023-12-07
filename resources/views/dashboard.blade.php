<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus horários') }}
        </h2>

        <span>10:53:15</span>

    </x-slot>

    {{-- Listagem dos horários --}}
    <table class="table border shadow p-3 mb-5 bg-body-tertiary rounded">
        <thead>
            <tr>
                <th scope="col">Lorem</th>
                <th scope="col"></th>
                <th scope="col">
                    <button class="btn btn-primary">Bater ponto</button>
                </th>
            </tr>

            <tr>
                <th scope="col">Dia</th>
                <th scope="col">Hora de entrada</th>
                <th scope="col">Hora de saída</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">07/12</th>
                <td>07:58:32</td>
                <td>13:05:14</td>
            </tr>
        </tbody>

    </table>

    {{-- <h2>Horário atual - <span>11:49:05</span></h2> --}}
    
</x-app-layout>


