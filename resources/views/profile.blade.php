@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div style="display:flex; align-items:center; gap:18px; flex-wrap:wrap;">
        <div style="width:84px; height:84px; border-radius:50%; background:var(--accent); color:#000; display:flex; align-items:center; justify-content:center; font-size:2.2rem; font-weight:800;">
            {{ strtoupper(substr($username, 0, 1)) }}
        </div>
        <div>
            <p class="muted" style="font-size:.85rem;">PROFIL</p>
            <h1>{{ $username }}</h1>
            <p class="muted">{{ count($playlists) }} playlist · {{ count($songs) }} lagu tersedia</p>
        </div>
    </div>

    <h2>Genre Favorit</h2>
    <div>
        @foreach ($genres as $genre)
            <span class="tag">{{ $genre }}</span>
        @endforeach
    </div>

    <h2>Playlist {{ $username }}</h2>
    <div class="grid">
        @foreach ($playlists as $pl)
            <div class="card">
                <strong>{{ $pl['name'] }}</strong>
                <p class="muted" style="font-size:.88rem; margin:6px 0;">{{ $pl['desc'] }}</p>
                <span class="tag">{{ $pl['total'] }} lagu</span>
            </div>
        @endforeach
    </div>

    <h2>Sering Diputar</h2>
    <div class="card">
        @foreach (array_slice($songs, 0, 5) as $i => $song)
            <div style="display:flex; justify-content:space-between; align-items:center; padding:10px 0; {{ !$loop->last ? 'border-bottom:1px solid var(--line);' : '' }}">
                <div><strong>{{ $song['title'] }}</strong> <span class="muted">— {{ $song['artist'] }}</span></div>
                <button class="btn sm" data-play="{{ $i }}">▶</button>
            </div>
        @endforeach
    </div>
@endsection
