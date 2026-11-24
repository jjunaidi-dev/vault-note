const CACHE_NAME = 'pwa-cache-v1';
const PRECACHE_URLS = [
    '/offline',
    '/manifest.json',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-512x512.png'
];

// 1. Install: simpan file penting ke cache
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => cache.addAll(PRECACHE_URLS))
    );
    self.skipWaiting();
});

// 2. Activate: bersihkan cache versi lama
self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) =>
            Promise.all(
                cacheNames
                    .filter((name) => name !== CACHE_NAME)
                    .map((name) => caches.delete(name))
            )
        )
    );
    self.clients.claim();
});

// 3. Fetch: atur strategi saat request terjadi
self.addEventListener('fetch', (event) => {
    const { request } = event;
    const url = new URL(request.url);

    // Hanya proses GET dan origin yang sama
    if (request.method !== 'GET' || url.origin !== self.location.origin) {
        return;
    }

    // Jika pindah/buka halaman (navigasi)
    if (request.mode === 'navigate') {
        event.respondWith(
            fetch(request).catch(() => caches.match('/offline'))
        );
        return;
    }

    // Jika request aset statis (gambar, css, js, font)
    if (/\.(css|js|png|jpg|jpeg|webp|svg|ico|woff2?)$/i.test(url.pathname)) {
        event.respondWith(
            caches.match(request).then((cachedResponse) => {
                if (cachedResponse) {
                    return cachedResponse;
                }
                return fetch(request).then((networkResponse) => {
                    if (networkResponse.ok) {
                        const copy = networkResponse.clone();
                        caches.open(CACHE_NAME).then((cache) => cache.put(request, copy));
                    }
                    return networkResponse;
                });
            })
        );
    }
});