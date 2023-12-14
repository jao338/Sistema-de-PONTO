<form method="POST" action="{{ route('register') }}" class="flex flex-col">
    @csrf

    <div class="row flex justify-center p-32" style="height: 70vh">

        <div class="rectangle border p-32">
            <div class="mB-16">
                <x-input-label for="name" :value="__('Nome')" class="pL-8" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
        
            <div class="mB-16">
                <x-input-label for="description" :value="__('Descrição')" class="pL-8" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" required />
            </div>

            <div class="flex mB-32">
                <div class="w-50 mR-16">
                    <x-input-label for="entrance" :value="__('Entrada')" class="pL-8" />
                    <x-text-input id="entrance" class="block mt-1 w-full" type="time" name="entrance" required />
                </div>
    
                <div class="w-50">
                    <x-input-label for="exit" :value="__('Saída')" class="pL-8" />
                    <x-text-input id="exit" class="block mt-1 w-full" type="time" name="exit" required />
                </div>
    
            </div>

            <button type="submit" class="btn w-100 mT-16 flex justify-center" style="background-color: rgb(31 41 55)">
                <span class="text-light">Cadastrar</span>
            </button>

        </div>

    </div>

</form>