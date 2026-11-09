@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Halo, {{ $username }} 👋</h1>
    <p class="muted">Mau dengerin apa hari ini?</p>

    <h2>Lagu Pilihan</h2>
    <div class="grid">
        @foreach ($featured as $i => $song)
            <div class="card">
               @if (!empty($song['cover']))
    <img src="{{ $song['cover'] }}" alt="{{ $song['title'] }}"
         style="width:100%; aspect-ratio:1; object-fit:cover; border-radius:10px; margin-bottom:12px; display:block;">
@else
    <div class="cover" style="background:{{ $song['color'] }};">♪</div>
@endif
                <strong>{{ $song['title'] }}</strong>
                <div class="muted" style="font-size:.85rem; margin:2px 0 12px;">{{ $song['artist'] }}</div>
                <button class="btn sm" data-play="{{ $i }}">▶ Putar</button>
            </div>
        @endforeach
    </div>

    <h2>Playlist untukmu</h2>
    <div class="grid">
        @foreach ($playlists as $pl)
            <div class="card">
                <strong>{{ $pl['name'] }}</strong>
                <p class="muted" style="font-size:.88rem; margin:6px 0;">{{ $pl['desc'] }}</p>
                <span class="tag">{{ $pl['total'] }} lagu</span>
            </div>
        @endforeach
    </div>

    <p style="margin-top:28px;">
        <a class="btn ghost" href="{{ route('pengelolaan', ['username' => $username]) }}">Lihat semua lagu →</a>
    </p>
@endsection
