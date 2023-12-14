<form method="POST" action="{{ route('register') }}" class="flex flex-col">
    @csrf

    <div class="row flex justify-center p-32" style="height: 70vh">

        <div class="rectangle border p-32">

            <div class="d-flex justify-content-between mB-32">

                <div class="d-flex align-items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 mR-8" />
                    <span>Cadastro de Usuários</span>
                </div>

                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg>
                </a>
            </div>

            <div class="flex mB-16">
                <div class="w-50 mR-16">
                    <x-input-label for="name" :value="__('Name')" class="pL-8" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
    
                <div class="w-50">
                    <x-input-label for="email" :value="__('Email')" class="pL-8" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <div class="flex mB-32">
                
                <div class="w-50 mR-16">
                    <x-input-label for="password" :value="__('Password')" class="pL-8" />    
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
            
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="w-50">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="pL-8"/>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" 
                                    required autocomplete="new-password" />
            
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

            </div>

            <select class="d-flex form-select mB-32" id="optionsSectors">

                @if (!isset($sectors))
                    <option selected id="dep">Departamentos</option>
                    <option value="1">One</option>  
                @else

                <option selected id="dep">Departamentos</option>

                    @foreach ($sectors as $sector)
                        <option value="{{ $sector->id }}">{{ $sector->name }}</option>         
                    @endforeach

                    
                @endif
            </select>
            
            <button type="submit" class="btn w-100 mT-16 flex justify-center" style="background-color: rgb(31 41 55)">
                <span class="text-light">Cadastrar</span>
            </button>
        
        </div>

    </div>

</form>