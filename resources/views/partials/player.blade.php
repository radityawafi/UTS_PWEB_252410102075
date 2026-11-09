{{-- Pemutar musik (di-@include dari layout). Data lagu berasal dari Controller. --}}
<style>
    .player { position:fixed; left:0; right:0; bottom:0; z-index:30; background:#111119; border-top:1px solid var(--line); padding:12px 20px; }
    .player-in { max-width:1100px; margin:0 auto; display:flex; align-items:center; gap:16px; flex-wrap:wrap; }
    .np { display:flex; align-items:center; gap:12px; min-width:200px; flex:1; }
    .np-cover { width:46px; height:46px; border-radius:8px; background:#22222e; display:flex; align-items:center; justify-content:center; }
    .ctrl { display:flex; align-items:center; gap:10px; }
    .ctrl button { background:none; border:0; color:var(--text); font-size:1.3rem; cursor:pointer; }
    .ctrl .play { background:var(--text); color:#000; width:42px; height:42px; border-radius:50%; font-size:1.1rem; }
    .bar { flex:2; min-width:200px; display:flex; align-items:center; gap:10px; font-size:.8rem; color:var(--muted); }
    .bar input[type=range] { margin:0; padding:0; accent-color:var(--accent); height:4px; }
</style>

<div class="player">
    <div class="player-in">
        <div class="np">
            <div class="np-cover" id="npCover">♪</div>
            <div>
                <div id="npTitle" style="font-weight:600;">Pilih lagu untuk diputar</div>
                <div id="npArtist" class="muted" style="font-size:.85rem;">—</div>
            </div>
        </div>
        <div class="ctrl">
            <button id="prev" title="Sebelumnya">⏮</button>
            <button id="toggle" class="play" title="Putar/Jeda">▶</button>
            <button id="next" title="Berikutnya">⏭</button>
        </div>
        <div class="bar">
            <span id="cur">0:00</span>
            <input type="range" id="seek" min="0" max="100" value="0">
            <span id="dur">0:00</span>
        </div>
    </div>
    <audio id="audio" preload="none"></audio>
</div>

@push('scripts')
<script>
    const songs = @json($songs);
    const audio = document.getElementById('audio');
    const toggleBtn = document.getElementById('toggle');
    const seek = document.getElementById('seek');
    let index = -1;

    const fmt = s => isNaN(s) ? '0:00' : Math.floor(s/60) + ':' + String(Math.floor(s%60)).padStart(2,'0');

    function playSong(i) {
        index = (i + songs.length) % songs.length;
        const s = songs[index];
        audio.src = s.url;
        audio.play();
        document.getElementById('npTitle').textContent = s.title;
        document.getElementById('npArtist').textContent = s.artist;
       const c = document.getElementById('npCover');
    c.style.background = s.cover ? `url('${s.cover}') center/cover` : s.color;
    c.textContent = s.cover ? '' : '♪';
    }

    toggleBtn.onclick = () => {
        if (index === -1) return playSong(0);
        audio.paused ? audio.play() : audio.pause();
    };
    document.getElementById('next').onclick = () => playSong(index + 1);
    document.getElementById('prev').onclick = () => playSong(index - 1);
    audio.onplay  = () => toggleBtn.textContent = '⏸';
    audio.onpause = () => toggleBtn.textContent = '▶';
    audio.onended = () => playSong(index + 1);
    audio.ontimeupdate = () => {
        document.getElementById('cur').textContent = fmt(audio.currentTime);
        document.getElementById('dur').textContent = fmt(audio.duration);
        seek.value = audio.duration ? (audio.currentTime / audio.duration) * 100 : 0;
    };
    seek.oninput = () => { if (audio.duration) audio.currentTime = (seek.value / 100) * audio.duration; };

    document.querySelectorAll('[data-play]').forEach(el =>
        el.addEventListener('click', () => playSong(parseInt(el.dataset.play)))
    );
</script>
@endpush
