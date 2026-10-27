const CACHE = 'natillera-shell-v2';
const SHELL = ['/','/static/manifest.webmanifest','/static/app.css','/static/pending.css','/static/pwa.css','/static/v2.css','/static/v2.js','/static/icons/natillera-192.png','/static/icons/natillera-512.png'];
self.addEventListener('install', event => event.waitUntil(caches.open(CACHE).then(c => c.addAll(SHELL)).then(() => self.skipWaiting())));
self.addEventListener('activate', event => event.waitUntil(caches.keys().then(keys => Promise.all(keys.filter(key => key !== CACHE).map(key => caches.delete(key)))).then(() => self.clients.claim())));
self.addEventListener('fetch', event => { if (event.request.method !== 'GET') return; event.respondWith(fetch(event.request).catch(() => caches.match(event.request).then(r => r || caches.match('/')))); });
