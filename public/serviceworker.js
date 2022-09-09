var staticCacheName = "YE-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/keenthemes/plugins/global/plugins.bundle.css',
    '/keenthemes/css/style.bundle.css',
    '/css/animate.css',
    '/css/toastify.css',
    '/keenthemes/plugins/global/plugins.bundle.js',
    '/keenthemes/js/scripts.bundle.js',
    '/js/cleave.min.js',
    '/js/notification.js',
    '/js/toastify.js',
    '/js/language-office.js',
    '/js/plugins-office.js',
    '/js/methods-office.js',
    '/js/auth-office.js',
    '/img/icon.png',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("YE-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});