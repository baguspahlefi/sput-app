<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        
        <!-- NIP -->
        <div class="mt-4">
            <x-input-label for="NIP" :value="__('NIP')" />
            <x-text-input id="NIP" class="block mt-1 w-full" type="text" name="NIP" :value="old('NIP')" required autofocus autocomplete="NIP" />
            <x-input-error :messages="$errors->get('NIP')" class="mt-2" />
        </div>

        <!-- PIC -->
        <div class="mt-4">
            <x-input-label for="PIC" :value="__('PIC')" />
            <div class="input-group mb-3">
                <select class="form-select border focus:border-primary rounded-md shadow-sm" id="inputGroupSelect02">
                    <option selected>Pilih PIC</option>    
                    @foreach($pic as $pic)
                    <option value="{{$pic->PIC}}">{{$pic->PIC}}</option>
                    @endforeach  
                </select>
            </div>

        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button class="btn btn-success ml-3">
                Register
            </button>
        </div>
    </form>
</x-guest-layout>
