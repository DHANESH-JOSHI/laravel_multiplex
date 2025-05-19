@extends('layouts.front')

@section('content')
    <div class="container mx-auto px-4 mt-6">
        <h2 class="text-2xl font-bold mb-4">🎬 Latest Movies</h2>
        <div id="movie-list" class="grid grid-cols-1 md:grid-cols-3 gap-4"></div>

        <h2 class="text-2xl font-bold mb-6 mt-10">📺 Latest Web Series</h2>
        <div id="webseries-list" class="grid grid-cols-1 md:grid-cols-3 gap-4"></div>

        <div id="player-section" class="mt-10 hidden">
            <h4 class="text-xl font-semibold mb-2">▶️ Now Playing: <span id="movie-title" class="text-blue-600"></span></h4>
            <div class="rounded overflow-hidden shadow-lg mb-4">
                <video id="videoPlayer" width="100%" height="400" controls class="w-full rounded"></video>
            </div>
            <a id="download-link" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition" target="_blank">⬇️ Download</a>
        </div>
    </div>
    @dd(auth()->id());
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <script>
        const userId = "{{ auth()->id() ?? '681ce0293ca77c5b4bc49462' }}";

        async function fetchAndRender() {
            const res = await fetch('https://multiplexplay.com/nodeapi/rest-api/v130/movies?page=1');
            const { data } = await res.json();

            const movieContainer = document.getElementById('movie-list');
            const seriesContainer = document.getElementById('webseries-list');

            data.forEach(item => {
                const card = `
                    <div class="bg-white rounded-lg shadow p-4">
                        <img src="${item.thumbnail_url}" class="w-full h-48 object-cover rounded mb-4" alt="${item.title}">
                        <h5 class="text-lg font-semibold mb-2">${item.title}</h5>
                        <p class="text-sm text-gray-600 mb-3">Quality: ${item.video_quality}</p>
                        <div class="flex space-x-2">
                            <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition" onclick="playMovie('${item.title}', '${item.video_url}', '${item.download_link}')">Play</button>
                            <a href="${item.trailer}" target="_blank" class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300 transition">Trailer</a>
                        </div>
                    </div>
                `;

                if (item.is_tvseries === 1) {
                    seriesContainer.innerHTML += card;
                } else {
                    movieContainer.innerHTML += card;
                }
            });
        }

        let hlsInstance = null;

        async function playMovie(title, videoUrl, downloadUrl) {
            const subRes = await fetch(`http://localhost:3000/nodeapi/rest-api/v130/check_user_subscription?user_id=${userId}`);
            const { subscribed } = await subRes.json();

            if (!subscribed) {
                toastr.error("🚫 You don't have an active subscription.");
                return;
            }

            document.getElementById('player-section').classList.remove('hidden');
            document.getElementById('movie-title').innerText = title;
            document.getElementById('download-link').href = downloadUrl;

            const video = document.getElementById('videoPlayer');

            if (hlsInstance) {
                hlsInstance.destroy(); // Clean previous instance
            }

            if (Hls.isSupported()) {
                hlsInstance = new Hls();
                hlsInstance.loadSource(videoUrl);
                hlsInstance.attachMedia(video);
                hlsInstance.on(Hls.Events.MANIFEST_PARSED, () => video.play());
            } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
                video.src = videoUrl;
                video.addEventListener('loadedmetadata', () => video.play());
            } else {
                toastr.error("❌ HLS not supported on this browser.");
            }
        }

        fetchAndRender();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <script>
        @if(session('error'))
        toastr.error("{{ session('error') }}");
        @endif
    </script>
@endsection
