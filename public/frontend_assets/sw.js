self.addEventListener('push', function (event) {
    const options = {
        body: event.data.text(),
        icon: '/frontend_assets/img/logo.png', // Replace with your logo
        vibrate: [200, 100, 200],
        badge: '/frontend_assets/img/logo.png'
    };
    event.waitUntil(
        self.registration.showNotification('PSM Craft House', options)
    );
});