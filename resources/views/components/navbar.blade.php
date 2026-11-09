@props(['username' => 'Guest'])

<style>
    .nav { position:sticky; top:0; z-index:20; background:rgba(11,11,16,.92); backdrop-filter:blur(8px); border-bottom:1px solid var(--line); }
    .nav-in { max-width:1100px; margin:0 auto; padding:14px 20px; display:flex; align-items:center; justify-content:space-between; gap:12px; flex-wrap:wrap; }
    .brand { font-weight:800; font-size:1.25rem; }
    .brand span { color:var(--accent); }
    .links { display:flex; gap:6px; flex-wrap:wrap; }
    .links a { padding:8px 14px; border-radius:999px; color:var(--muted); font-size:.92rem; }
    .links a:hover, .links a.on { background:#22222e; color:var(--text); }
</style>

<nav class="nav">
    <div class="nav-in">
        <a class="brand" href="{{ route('dashboard', ['username' => $username]) }}">♫ Musi<span>ka</span></a>
        <div class="links">
            <a class="{{ request()->routeIs('dashboard') ? 'on' : '' }}" href="{{ route('dashboard', ['username' => $username]) }}">Dashboard</a>
            <a class="{{ request()->routeIs('pengelolaan') ? 'on' : '' }}" href="{{ route('pengelolaan', ['username' => $username]) }}">Pengelolaan</a>
            <a class="{{ request()->routeIs('profile') ? 'on' : '' }}" href="{{ route('profile', ['username' => $username]) }}">Profile</a>
            <a href="{{ route('login') }}">Keluar</a>
        </div>
    </div>
</nav>
