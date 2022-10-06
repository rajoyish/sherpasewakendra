@auth
<p class="mr-2 py-5 text-ace-gold">🙏Tashi delek, {{ Auth::user()->name }}</p>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="route('logout')"
        class="rounded bg-ace-gold py-1 px-3 text-primary transition duration-300 hover:bg-dark-gold hover:text-prime-dark"
        onclick="event.preventDefault();
        this.closest('form').submit();">
        Log Out
    </a>
</form>
@endauth

@guest
<a href="{{ route('login') }}" class="py-5 px-3 transition-all duration-300 hover:text-ace-gold">Login</a>
<a href="{{ route('register') }}"
    class="rounded bg-ace-gold py-1 px-3 text-primary transition duration-300 hover:bg-dark-gold hover:text-prime-dark">
    Register
</a>
@endguest
