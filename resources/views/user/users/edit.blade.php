<x-user-layout>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8 mb-4">
            {{-- PAGE HEADING WITH BUTTON --}}
            <div class="mt-4 flex md:mt-0 items-center justify-between">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    {{ $user->name }}
                </h2>
            </div>
            {{-- PAGE HEADING WITH BUTTON --}}
        </div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <!-- Replace with your content -->
            <main>
                <form method="POST" action="{{ route('user.users.update', $user) }}"
                      class="space-y-8 divide-y divide-gray-200"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <div class="mt-6 space-y-6 sm:mt-5 sm:space-y-5">
                            <div
                                class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                <label for="photo" class="block text-gray-700"> Profile Photo </label>
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <div class="flex items-center gap-4">
                                        <img class="h-20 w-20 rounded-full"
                                             src="{{ url('storage/' . $user->photo) }}"/>
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
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="country" class="block text-gray-700 sm:mt-px sm:pt-2"> Verify User?
                                    </label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <select id="is_verified" name="is_verified"
                                                class="focus:border-prime-blue focus:ring-prime-blue block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs">
                                            <option value="1" @selected(old('is_verified') == $user->is_verified)>
                                                Yes
                                            </option>
                                            <option value="0" @selected(old('is_verified') == $user->is_verified)>No
                                            </option>
                                        </select>
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
                        <div class="pt-5">
                            <div class="flex justify-end">
                                <a href=""
                                   class="focus:ring-prime-blue rounded-md border-2 border-monk-red bg-white py-2 px-4 text-monk-red shadow-sm hover:bg-monk-red hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all">Delete</a>
                                <button type="submit"
                                        class="focus:ring-prime-blue ml-3 inline-flex justify-center rounded-md border border-transparent bg-prime-blue py-2 px-4 text-white shadow-sm hover:bg-ace-gold focus:outline-none focus:ring-2 focus:ring-offset-2">
                                    Update
                                </button>
                            </div>
                        </div>
                </form>
            </main>
        </div>

    </div>
</x-user-layout>
