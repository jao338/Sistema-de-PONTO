@if (!isset($sector))
    <h1>Algo deu errado</h1>
@else

<form method="POST" action="/dashboard/sectors/{{ $sector->id }}" class="flex flex-col">
    @csrf
    @method("PUT")

    <div class="row flex justify-center p-32" style="height: 70vh">

        <div class="rectangle border p-32">

            <div class="d-flex justify-content-between mB-32">

                <div class="d-flex align-items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 mR-8" />
                    <span>Editar setor</span>
                </div>

                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg>
                </a>
            </div>

            <div class="mB-16">
                <x-input-label for="name" :value="__('Nome')" class="pL-8" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$sector->name" required autofocus autocomplete="name" />
            </div>
        
            <div class="mB-16">
                <x-input-label for="description" :value="__('Descrição')" class="pL-8" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$sector->description" required />
            </div>

            <div class="flex mB-32">
                <div class="w-50 mR-16">
                    <x-input-label for="entrance" :value="__('Entrada')" class="pL-8" />
                    <x-text-input id="entrance" class="block mt-1 w-full" type="time" name="entrance" :value="$sector->entrance" required />
                </div>
    
                <div class="w-50">
                    <x-input-label for="exit" :value="__('Saída')" class="pL-8" />
                    <x-text-input id="exit" class="block mt-1 w-full" type="time" name="exit" :value="$sector->exit" required />
                </div>
    
            </div>

            <button type="submit" class="btn w-100 mT-16 flex justify-center" style="background-color: rgb(31 41 55)">
                <span class="text-light">Atualizar</span>
            </button>

        </div>

    </div>
    
</form>
    
@endif