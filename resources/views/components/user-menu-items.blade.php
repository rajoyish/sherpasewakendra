<nav class="space-y-1 px-2">
    <x-admin-menu-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
        <x-icons.dashboard-icon/>
        Dashboard
    </x-admin-menu-link>

    <x-admin-menu-link :href="route('user.users.show', Auth::user())" :active="request()->routeIs('user.users.show')">
        <x-icons.profile-icon/>
        Profile
    </x-admin-menu-link>

    <x-admin-menu-link :href="route('user.dashboard')">
        <x-icons.booking-icon/>
        Bookings
    </x-admin-menu-link>

    <x-admin-menu-link :href="route('user.dashboard')">
        <x-icons.invoice-icon/>
        Invoices
    </x-admin-menu-link>
</nav>
