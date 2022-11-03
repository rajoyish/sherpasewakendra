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
                        <x-user-profile-tab :href="route('user.users.show', $user)"
                                            :active="request()->routeIs('user.users.show', $user)">
                            Profile
                        </x-user-profile-tab>

                        <x-user-profile-tab :href="route('user.change-password')">
                            Change Password
                        </x-user-profile-tab>

                        <x-user-profile-tab :href="route('user.users.edit', $user)">
                            Update Profile
                        </x-user-profile-tab>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Description list -->
        <div class="mx-auto mt-6 max-w-5xl px-4 sm:px-6 lg:px-8">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-gray-500">Phone</dt>
                    <dd class="mt-1 text-gray-900">{{ $user->phone }}</dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-gray-500">Email</dt>
                    <dd class="mt-1 text-gray-900">{{ $user->email }}</dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-gray-500">Address</dt>
                    <dd class="mt-1 text-gray-900">{{ $user->address }}</dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-gray-500">Role</dt>
                    @if($user->role_id == 1)
                        <dd
                            class="py-0 inline-block mt-1 px-4 shadow no-underline rounded-full bg-prime-blue text-white border-green-600 hover:text-white focus:outline-none pointer:none">
                            User
                        </dd>
                    @elseif($user->role_id == 2)
                        <dd
                            class="py-0 inline-block mt-1 px-4 shadow no-underline rounded-full bg-green-600 text-white border-green-600 hover:text-white focus:outline-none pointer:none">
                            Admin
                        </dd>
                    @endif
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-gray-500">Verified?</dt>
                    @if($user->is_verified === true)
                        <dd
                            class="py-0 inline-block mt-1 px-4 shadow no-underline rounded-full bg-green-600 text-white border-green-600 hover:text-white focus:outline-none pointer:none">
                            Yes
                        </dd>
                    @elseif($user->is_verified === false)
                        <dd
                            class="py-0 inline-block mt-1 px-4 shadow no-underline rounded-full bg-prime-blue text-white border-green-600 hover:text-white focus:outline-none pointer:none">
                            No
                        </dd>
                    @endif
                </div>

                <div class="sm:col-span-2">
                    <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5">
                        <dt class="text-gray-500">National ID Document</dt>
                        <dd class="mt-1 text-gray-900 sm:col-span-2 sm:mt-0">
                            <ul
                                role="list"
                                class="divide-y divide-gray-200 rounded-md border border-gray-200"
                            >
                                <li class="flex items-center justify-between py-3 pl-3 pr-4">
                                    <div class="flex w-0 flex-1 items-center">
                                        <x-icons.paper-clip-icon/>
                                        <span class="ml-2 w-0 flex-1 truncate">
                                            {{ basename(url('storage/' . $user->id_doc)) }}
                                        </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ url('storage/' . $user->id_doc) }}"
                                           class="text-indigo-600 hover:text-indigo-500" download>
                                            Download
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>
                </div>
            </dl>
        </div>
    </article>
</x-user-layout>
