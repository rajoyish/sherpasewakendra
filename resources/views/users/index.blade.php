<x-admin-layout>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8 mb-4">
            {{-- PAGE HEADING WITH BUTTON --}}
            <div class="mt-4 flex md:mt-0 md:ml-4 items-center justify-between">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Users
                </h2>
                <a href="#"
                    class="inline-flex items-center px-4 py-2 border text-lg border-transparent rounded-md shadow-sm  text-white bg-prime-blue hover:bg-dark-gold
 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ace-gold">
                    Add User
                </a>
            </div>
            {{-- PAGE HEADING WITH BUTTON --}}
        </div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <!-- Replace with your content -->
            <main class="">
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead class="bg-ace-gold">
                                        <tr>
                                            <th scope="col"
                                                class="py-4 pl-4 pr-3 font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                                                <span class="sr-only">Profile Photo</span>
                                            </th>
                                            <th scope="col"
                                                class="py-4 pl-4 pr-3 text-left font-semibold text-gray-900 sm:pl-6 lg:pl-8">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="px-3 text-left py-4 selection:font-semibold text-gray-900">
                                                Email
                                            </th>
                                            <th scope="col" class="px-3 py-4 font-semibold text-gray-900">
                                                Role
                                            </th>
                                            <th scope="col" class="px-3 py-4 font-semibold text-gray-900">
                                                Verified
                                            </th>
                                            <th scope="col" class="px-3 py-4 font-semibold text-gray-900">
                                                Edit
                                            </th>
                                            <th scope="col" class="relative py-4 pl-3 pr-4 sm:pr-6 lg:pr-8">
                                                Delete
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-300">
                                        @foreach ($users as $user)
                                            <tr class="odd:bg-white even:bg-slate-100">
                                                <td
                                                    class="whitespace-nowrap px-3 py-4 text-gray-900 flex justify-center ">
                                                    <div class="flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-full mx-4 md:mx-0"
                                                            src="{{ url('storage/' . $user->photo) }}">
                                                    </div>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-gray-900">
                                                    {{ $user->name }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-gray-500">
                                                    {{ $user->email }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4  text-gray-500 text-center">
                                                    @if ($user->is_admin === 1)
                                                        <span
                                                            class="py-0 px-4 shadow no-underline rounded-full bg-green-600 text-white border-green-600 hover:text-white focus:outline-none pointer:none">
                                                            Admin
                                                        </span>
                                                    @else
                                                        <span
                                                            class="py-0 px-4 shadow no-underline rounded-full bg-prime-blue text-white border-prime-blue hover:text-white focus:outline-none">
                                                            User
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-gray-500 text-center">
                                                    @if ($user->is_verified === 1)
                                                        <span
                                                            class="py-0 px-4 shadow no-underline rounded-full bg-green-600 text-white border-green-600 hover:text-white focus:outline-none pointer:none">
                                                            Verified
                                                        </span>
                                                    @else
                                                        <span
                                                            class="py-0 px-4 shadow no-underline rounded-full bg-slate-600 text-white border-slate-600 hover:text-white focus:outline-none">
                                                            Not Verified
                                                        </span>
                                                    @endif

                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4  text-gray-500">
                                                    <a href="{{ route('users.edit', $user) }}"
                                                        class="flex justify-center text-indigo-600 hover:text-indigo-900">
                                                        <x-icons.edit-icon />
                                                        <span class="uppercase">Edit</span>
                                                    </a>
                                                </td>
                                                <td
                                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right sm:pr-6 lg:pr-8">
                                                    <a href="storage/{{ $user->id_card }}"
                                                        class="flex justify-center text-red-600 hover:text-red-900">
                                                        <x-icons.delete-icon />
                                                        <span class="uppercase">Delete</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    {{ $users->links() }}
                </div>
            </main>
        </div>

    </div>
</x-admin-layout>
