<form method="POST" action="{{ route('register') }}" class="flex flex-col">
    @csrf

    <div class="row flex justify-center border p-32" style="height: 70vh">

        <div class="rectangle border p-32">

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

            <div class="flex">
                
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

            <!-- Example single danger button -->
            <div class="btn-group">
                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Action
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>
            
            <x-primary-button class="w-100 mT-16 flex justify-center">
                <span>Cadastrar</span>
            </x-primary-button>
        
        </div>

    </div>

</form>

{{-- 
<form method="POST" action="{{ route('register') }}" class="flex flex-col">
    @csrf

    <div class="flex flex-row">
        <div class="w-50 mR-16">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    
        <div class="w-50">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
    </div>

    <div class="flex flex-row mT-16">
        <div class="w-50 mR-16">
            <x-input-label for="password" :value="__('Password')" />
    
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
    
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
    
        <div class="w-50">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
    
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
    </div>

    <div class="flex justify-end">

        <x-primary-button class="mT-16">
            {{ __('Register') }}
        </x-primary-button>
        
    </div>
</form>

    
 --}}


    

