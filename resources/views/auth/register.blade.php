<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('images/SSK_logo_500.png') }}" alt="Sherpa Sewa Kendra Logo"
                    class="block h-40 w-40 object-contain md:h-48 md:w-48" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                         required autofocus/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                         required/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')"/>

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                         autocomplete="new-password"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                         name="password_confirmation" required/>
            </div>

            <!-- Photo -->
            <div class="mt-4">
                <x-label for="photo" :value="__('Upload Photo')"/>
                <x-input id="photo" class="block mt-1 w-full" type="file" name="photo" required/>
            </div>

            <!-- ID Doc -->
            <div class="mt-4">
                <x-label for="id_doc" :value="__('Upload ID Document')"/>
                <x-input id="id_doc" class="block mt-1 w-full" type="file" name="id_doc" required/>
                <span class="text-sm text-prime-blue">National ID / Citizenship / Passport</span>
            </div>

            <!-- Role -->
            <div class="mt-4">
                <x-label for="role_id" :value="__('Register as:')"/>
                <div>
                    <fieldset class="mt-4">
                        <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                            <div class="flex items-center">
                                <input id="student" name="role_id" type="radio" value="1" checked
                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="student" class="ml-3 block text-sm font-medium text-gray-700">
                                    User
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline decoration-dark-gold text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
