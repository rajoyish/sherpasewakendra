<div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white shadow">
    <button type="button"
        class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden"
        @click="open = true">
        <span class="sr-only">Open sidebar</span>
        <svg class="h-6 w-6" x-description="Heroicon name: outline/menu-alt-2" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7">
            </path>
        </svg>
    </button>
    <div class="flex flex-1 justify-between px-4">
        <div class="flex flex-1">
            <form class="flex w-full md:ml-0" action="#" method="GET">
                <label for="search-field" class="sr-only">Search</label>
                <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
                        <svg class="h-5 w-5" x-description="Heroicon name: solid/search"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input id="search-field"
                           class="block h-full w-full border-transparent py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 focus:border-transparent focus:placeholder-gray-400
                        focus:outline-none focus:ring-0 sm:"
                           placeholder="Search" type="search" name="search"/>
                </div>
            </form>
        </div>
        <!-- Profile with icon -->
        <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile dropdown -->
            <div x-data="{ openProfile: false }" class="relative ml-3">
                <div>
                    <button x-on:click="openProfile = ! openProfile" type="button"
                            class="flex max-w-xs items-center rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <img class="h-8 w-8 rounded-full" src="{{ url('storage/' . Auth::user()->photo) }}"
                             alt=""/>
                    </button>
                </div>

                <div :class=" openProfile ? '' : 'hidden'" x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                     role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <!-- Active: "bg-gray-100", Not Active: "" -->
                    @if(Auth::user()->role_id == 1)
                        <a href="{{ route('user.users.show', Auth::user()) }}"
                           class="block px-4 py-2 hover:bg-gray-100 {{ (request()->routeIs('user.users.show', Auth::user())) ? 'bg-gray-100' : '' }}"
                           role="menuitem" tabindex="-1"
                           id="user-menu-item-0">{{ Auth::user()->name }}</a>
                    @elseif(Auth::user()->role_id == 2)
                        <a href="{{ route('admin.users.show', Auth::user()) }}"
                           class="block px-4 py-2 hover:bg-gray-100 {{ (request()->routeIs('admin.users.show', Auth::user())) ? 'bg-gray-100' : '' }}"
                           role="menuitem" tabindex="-1"
                           id="user-menu-item-0">{{ Auth::user()->name }}</a>
                    @endif

                    <a href="/" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" role="menuitem"
                       tabindex="-1" id="user-menu-item-1">
                        Home
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                           role="menuitem" tabindex="-1" id="user-menu-item-2"
                           onclick="event.preventDefault();
                            this.closest('form').submit();">
                            Log out
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Profile with icon -->
    </div>
</div>
