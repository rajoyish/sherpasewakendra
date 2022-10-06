<!-- navbar goes here -->
<nav x-data="{ navOpen: false }" class="bg-prime-blue  text-white">
    <div class="mx-auto max-w-6xl px-4">
        <div class="flex justify-between">
            <div class="flex space-x-4">
                <!-- Mobile Login Link -->
                <div class="flex items-center md:hidden">

                    {{-- LOGIN & REGISTER BUTTONS --}}
                    <x-btn-login-register />

                </div>

                <!-- primary nav -->
                <div class="hidden items-center space-x-1 md:flex">

                    {{-- HOME NAV LINKS --}}
                    <x-home-nav-links />

                </div>
            </div>

            <!-- secondary nav -->
            <div class="hidden items-center space-x-1 md:flex">

                {{-- LOGIN & REGISTER BUTTONS --}}
                <x-btn-login-register />
            </div>

            <!-- mobile button goes here -->
            <div class="flex items-center md:hidden">
                <button @click="navOpen = !navOpen">
                    <!-- Hemburger Icon -->
                    <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- mobile menu -->
    <div x-show="navOpen" @click.away="navOpen = false" x-bind:class=" navOpen ? '' : 'hidden'" class="md:hidden">

        {{-- HOME NAV LINKS --}}
        <x-home-nav-links />

    </div>
</nav>
