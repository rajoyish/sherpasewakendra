<x-user-layout>
    <article>
        <!-- Profile header -->
        <div>
            <div>
                <img
                    class="h-32 w-full object-cover object-top lg:h-48"
                    src="{{asset('images/lotus_cover.jpg')}}"
                    alt=""
                />
            </div>
            <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                    <div class="flex">
                        <img
                            class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                            src="{{ url('storage/' . Auth::user()->photo) }}"
                            alt=""
                        />
                    </div>
                    <div
                        class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1"
                    >
                        <div class="mt-6 min-w-0 flex-1 sm:hidden 2xl:block">
                            <h1 class="truncate font-bold text-gray-900">{{ Auth::user()->name }}</h1>
                        </div>
                    </div>
                </div>
                <div class="mt-6 hidden min-w-0 flex-1 sm:block 2xl:hidden">
                    <h1 class="truncate font-bold text-gray-900">{{ Auth::user()->name }}</h1>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-ace-gold" -->
                        <a
                            href="#"
                            class="whitespace-nowrap border-b-2 border-prime-blue py-4 px-1 text-gray-900"
                            aria-current="page"
                        >
                            Profile
                        </a>

                        <a
                            href="#"
                            class="whitespace-nowrap border-b-2 border-transparent py-4 px-1 text-gray-500 hover:border-ace-gold hover:text-gray-700"
                        >
                            Change Photo
                        </a>

                        <a
                            href="#"
                            class="whitespace-nowrap border-b-2 border-transparent py-4 px-1 text-gray-500 hover:border-ace-gold hover:text-gray-700"
                        >
                            Change ID
                        </a>
                        <a
                            href="#"
                            class="whitespace-nowrap border-b-2 border-transparent py-4 px-1 text-gray-500 hover:border-ace-gold hover:text-gray-700"
                        >
                            Change Password
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Description list -->
        <div class="mx-auto mt-6 max-w-5xl px-4 sm:px-6 lg:px-8">
            <form action="{{ route('user.update-password') }}" method="POST">
                @csrf
                <!-- Old Password -->
                <div class="mt-4">
                    <x-label for="old_password" :value="__('Old Password')"/>

                    <x-input id="old_password" class="block mt-1 w-full" type="password" name="old_password" required/>
                    @error('old_password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')"/>

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required/>
                    @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                             type="password"
                             name="password_confirmation" required/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Update Password') }}
                    </x-button>
            </form>
        </div>
    </article>
</x-user-layout>
