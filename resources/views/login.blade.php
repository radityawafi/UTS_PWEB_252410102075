@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div style="max-width:420px; margin:6vh auto 0; text-align:center;">
        <div style="font-size:3rem;">♫</div>
        <h1>Selamat datang di Musika</h1>
        <p class="muted" style="margin-bottom:24px;">Masuk untuk mulai mendengarkan musik favoritmu.</p>

        {{-- Username dikirim ke Dashboard lewat Request Parameter (GET) --}}
        <form class="card" method="GET" action="{{ route('dashboard') }}" style="text-align:left;">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="contoh: budi" required>

           
            <button class="btn" type="submit" style="width:100%;">Masuk</button>
        </form>
        <p class="muted" style="font-size:.8rem; margin-top:14px;">Simulasi login — tanpa database.</p>
    </div>
@endsection
