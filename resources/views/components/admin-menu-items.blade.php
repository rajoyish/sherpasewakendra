<nav class="space-y-1 px-2">
    <x-admin-menu-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
        <x-icons.dashboard-icon/>
        Dashboard
    </x-admin-menu-link>

    <x-admin-menu-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')">
        <x-icons.users-icon/>
        Users
    </x-admin-menu-link>

    <x-admin-menu-link :href="route('admin.bookings.index')" :active="request()->routeIs('admin.bookings.index')">
        <x-icons.booking-icon/>
        Bookings
    </x-admin-menu-link>
</nav>
