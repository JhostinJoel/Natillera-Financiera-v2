const CACHE = 'natillera-shell-v1';
const SHELL = ['/','/static/app.css','/static/pending.css','/static/icons/icon.svg'];
self.addEventListener('install', event => event.waitUntil(caches.open(CACHE).then(c => c.addAll(SHELL)).then(() => self.skipWaiting())));
self.addEventListener('activate', event => event.waitUntil(self.clients.claim()));
self.addEventListener('fetch', event => { if (event.request.method !== 'GET') return; event.respondWith(fetch(event.request).catch(() => caches.match(event.request).then(r => r || caches.match('/')))); });
