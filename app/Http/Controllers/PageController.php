<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Data lagu disimpan di Controller (tanpa database).
    // Audio memakai sampel bebas royalti dari SoundHelix.
    private function songs(): array
    {

        return [
            ['id' => 1, 'title' => 'cincin',           'artist' => 'Hindia',        'genre' => 'rock indie',    'color' => '#e8c426', 'url' => asset('musik/cincin.mp3'), 'cover' => asset('image/cincin.jpg')],
            ['id' => 2, 'title' => 'drunk text',       'artist' => 'Henry Moodie',  'genre' => 'Melankolis',    'color' => '#f59e0b', 'url' => asset('musik/drunk_text.mp3'), 'cover' => asset('image/drunk_text.jfif')],
            ['id' => 3, 'title' => 'Eiyuu',            'artist' => 'DOA',           'genre' => 'J-rock',        'color' => '#0ea5e9', 'url' => asset('musik/eiyuu.mp3'), 'cover' => asset('image/eiyuu.jfif')],
            ['id' => 4, 'title' => 'play back',        'artist' => 'Yuta',          'genre' => 'rock',          'color' => '#ec4899', 'url' => asset('musik/play_back.mp3'), 'cover' => asset('image/play back.jfif')],
            ['id' => 5, 'title' => 'sofia pertama',    'artist' => 'ariel winter',  'genre' => 'children music','color' => '#64748b', 'url' => asset('musik/sofia_pertama.mp3'), 'cover' => asset('image/sofia.jfif')],
            ['id' => 6, 'title' => 'Take Me Higher',   'artist' => 'V6',            'genre' => 'J-pop',         'color' => '#f97316', 'url' => asset('musik/take_me_higher.mp3'), 'cover' => asset('image/tiga.jfif')],
            ['id' => 7, 'title' => 'unite',            'artist' => 'voyager',       'genre' => 'J-pop',         'color' => '#22c55e', 'url' => asset('musik/unite.mp3'), 'cover' => asset('image/x.jfif')],
            ['id' => 8, 'title' => 'ginga no uta',     'artist' => 'voyager',       'genre' => 'j-pop',         'color' => '#12b7f8', 'url' => asset('musik/ginga.mp3'), 'cover' => asset('image/ginga.jpg')],
        ];
    }

    private function playlists(): array
    {
        return [
            ['name' => 'tokusatsu', 'desc' => 'J-pop & J-rock tokusatsu',                     'total' => 4],
            ['name' => 'Santai Sore',   'desc' => 'melankolis & children music',              'total' => 2],
            ['name' => 'Semangat Pagi', 'desc' => 'rock indie & rock untuk mulai hari',       'total' => 2],
        ];
    }

    public function login()
    {
        return view('login');
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username', 'Guest');

        return view('dashboard', [
            'username' => $username,
            'songs'    => $this->songs(),
            'featured' => array_slice($this->songs(), 0, 8),
            'playlists'=> $this->playlists(),
        ]);
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username', 'Guest');

        return view('pengelolaan', [
            'username' => $username,
            'songs'    => $this->songs(),
        ]);
    }

    public function profile(Request $request)
    {
        $username = $request->query('username', 'Guest');

        return view('profile', [
            'username'  => $username,
            'songs'     => $this->songs(),
            'playlists' => $this->playlists(),
            'genres'    => array_values(array_unique(array_column($this->songs(), 'genre'))),
        ]);
    }
}
