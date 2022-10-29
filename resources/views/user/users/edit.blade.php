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
                            src="{{ url('storage/' . $user->photo) }}"
                            alt=""
                        />
                    </div>
                    <div
                        class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1"
                    >
                        <div class="mt-6 min-w-0 flex-1 sm:hidden 2xl:block">
                            <h1 class="truncate font-bold text-gray-900">{{ $user->name }}</h1>
                        </div>
                    </div>
                </div>
                <div class="mt-6 hidden min-w-0 flex-1 sm:block 2xl:hidden">
                    <h1 class="truncate font-bold text-gray-900">{{ $user->name }}</h1>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="mt-6 sm:mt-2 2xl:mt-5">
            <div class="border-b border-gray-200">
                <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <x-user-profile-tab :href="route('user.users.show', Auth::user())">
                            Profile
                        </x-user-profile-tab>

                        <x-user-profile-tab :href="route('user.change-password')">
                            Change Password
                        </x-user-profile-tab>

                        <x-user-profile-tab :href="route('user.users.edit', Auth::user())"
                                            :active="request()->routeIs('user.users.edit', $user)">
                            Update Profile
                        </x-user-profile-tab>

                    </nav>
                </div>
            </div>
        </div>

        <!-- Form Elements -->
        <div class="mx-auto mt-6 max-w-5xl px-4 sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('user.users.update', $user) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                        <div
                            class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="photo" class="block text-gray-700"> Profile Photo </label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <div class="gap-4">
                                    <x-input id="photo" class="mt-1 block w-full" type="file"
                                             name="photo"/>
                                    @error('photo')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6 sm:space-y-5 sm:pt-6">
                        <div class="space-y-6 sm:space-y-5">

                            <div
                                class="pt-5 sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200">
                                <label for="name" class="block text-gray-700 sm:mt-px sm:pt-2"> Name </label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <input type="text" name="name" id="name" autocomplete="name"
                                           value="{{ @old('name', $user->name) }}"
                                           class="focus:border-prime-blue focus:ring-prime-blue block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs"/>
                                    @error('name')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="pt-5 sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200">
                                <label for="name" class="block text-gray-700 sm:mt-px sm:pt-2"> Phone </label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <input type="tel" name="phone" id="phone" autocomplete="phone"
                                           value="{{ @old('phone', $user->phone) }}"
                                           class="focus:border-prime-blue focus:ring-prime-blue block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs"/>
                                    @error('phone')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="pt-5 sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200">
                                <label for="name" class="block text-gray-700 sm:mt-px sm:pt-2"> Address </label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <input type="text" name="address" id="address" autocomplete="address"
                                           value="{{ @old('address', $user->address) }}"
                                           class="focus:border-prime-blue focus:ring-prime-blue block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs"/>
                                    @error('address')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="street-address" class="block text-gray-700 sm:mt-px sm:pt-2">
                                    ID Document
                                </label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <div class="flex items-center justify-center w-full h-96 lg:w-1/2">
                                        <img class="object-contain w-full h-full mx-auto rounded-md"
                                             src="{{ url('storage/' . $user->id_doc) }}">
                                    </div>
                                </div>
                            </div>

                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="id_doc" class="block text-gray-700 sm:mt-px sm:pt-2"> Change ID
                                    Document
                                </label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <x-input id="id_doc" class="mt-1 block w-full" type="file"
                                             name="id_doc"/>
                                    @error('id_doc')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5 mb-8">
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="focus:ring-prime-blue ml-3 inline-flex justify-center rounded-md border border-transparent bg-prime-blue py-2 px-4 text-white shadow-sm hover:bg-ace-gold focus:outline-none focus:ring-2 focus:ring-offset-2">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </article>
</x-user-layout>


