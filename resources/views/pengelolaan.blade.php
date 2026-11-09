@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
    <h1>Pustaka Lagu</h1>
    <p class="muted">Semua lagu yang tersedia, {{ $username }}. Total: {{ count($songs) }} lagu.</p>

    <div class="card table-wrap" style="margin-top:20px; padding:6px 10px;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th class="hide-sm">Artis</th>
                    <th>Genre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($songs as $i => $song)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $song['title'] }}</strong></td>
                        <td class="hide-sm muted">{{ $song['artist'] }}</td>
                        <td><span class="tag">{{ $song['genre'] }}</span></td>
                        <td><button class="btn sm" data-play="{{ $i }}">▶</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
