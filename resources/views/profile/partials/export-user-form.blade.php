<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Exportar para excel') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Clique no botão abaixo para exportar todos os horários.') }}
        </p>
    </header>

    {{-- <a href="/users/profile/export" class="btn btn-sucess">Exportar</a> --}}

    <form action="/users/profile/export" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-success">Exportar</button>
    </form>

</section>
