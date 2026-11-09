<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Musika') - Musika</title>
    <style>
        :root { --bg:#0b0b10; --card:#16161f; --line:#262633; --text:#f4f4f8; --muted:#9a9aae; --accent:#1ed760; }
        * { box-sizing:border-box; margin:0; padding:0; }
        body { font-family:system-ui,-apple-system,"Segoe UI",sans-serif; background:var(--bg); color:var(--text); min-height:100vh; display:flex; flex-direction:column; }
        a { color:inherit; text-decoration:none; }
        main { flex:1; width:100%; max-width:1100px; margin:0 auto; padding:28px 20px 130px; }
        h1 { font-size:1.9rem; margin-bottom:6px; }
        h2 { font-size:1.2rem; margin:28px 0 14px; }
        .muted { color:var(--muted); }
        .grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(210px,1fr)); gap:16px; }
        .card { background:var(--card); border:1px solid var(--line); border-radius:14px; padding:16px; }
        .cover { aspect-ratio:1; border-radius:10px; margin-bottom:12px; display:flex; align-items:center; justify-content:center; font-size:2.6rem; }
        .btn { background:var(--accent); color:#000; border:0; border-radius:999px; padding:10px 22px; font-weight:700; cursor:pointer; font-size:.95rem; display:inline-block; }
        .btn.ghost { background:transparent; color:var(--text); border:1px solid var(--line); }
        .btn.sm { padding:6px 14px; font-size:.85rem; }
        .tag { display:inline-block; font-size:.75rem; padding:3px 10px; border-radius:999px; background:#22222e; color:var(--muted); margin:2px 4px 2px 0; }
        table { width:100%; border-collapse:collapse; }
        th, td { text-align:left; padding:12px 10px; border-bottom:1px solid var(--line); font-size:.92rem; }
        th { color:var(--muted); font-weight:600; }
        .table-wrap { overflow-x:auto; }
        input { width:100%; padding:12px 14px; border-radius:10px; border:1px solid var(--line); background:#0f0f16; color:var(--text); font-size:1rem; margin:8px 0 16px; }
        @media (max-width:600px){ h1{font-size:1.5rem;} .hide-sm{display:none;} }
    </style>
    @stack('styles')
</head>
<body>
    {{-- Komponen Navbar hanya tampil jika sudah login (ada username) --}}
    @isset($username)
        <x-navbar :username="$username" />
    @endisset

    <main>
        @yield('content')
    </main>

    {{-- Pemutar musik dipakai ulang di halaman yang punya data lagu --}}
    @isset($songs)
        @include('partials.player')
    @endisset

    <x-footer />

    @stack('scripts')
</body>
</html>
