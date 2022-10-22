<nav class="space-y-1 px-2">
    <a href="#" class="group flex items-center rounded-md bg-dark-gold px-2 py-2 text-white">
        <x-icons.dashboard-icon />
        Dashboard
    </a>

    <a href="{{ route('users.index') }}"
        class="group flex items-center rounded-md px-2 py-2 text-white hover:bg-ace-gold">
        <x-icons.users-icon />
        Users
    </a>

    <a href="#" class="group flex items-center rounded-md px-2 py-2 text-white hover:bg-ace-gold">
        <x-icons.room-icon />
        Rooms
    </a>
</nav>
