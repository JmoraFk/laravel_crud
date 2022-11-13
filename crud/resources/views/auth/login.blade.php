<x-guest-layout>
    <x-auth-card>
        
        <x-slot name="logo">
            <h1><strong>Log In</strong></h1>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-12">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-12">
                <x-primary-button class="ml-12" style="margin: 0px !important;">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

            <div class="flex items-center justify-center block mt-12" style="text-align: center;">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">{{ __('Register An Account ') }}</a>

            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
