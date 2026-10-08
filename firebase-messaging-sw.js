// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in the messagingSenderId.
if ('serviceWorker' in navigator) {
navigator.serviceWorker.register('/firebase-messaging-sw.js')
  .then(function(registration) {
    console.log('Registration successful, scope is:', registration.scope);
  }).catch(function(err) {
    console.log('Service worker registration failed, error:', err);
  });
}

firebase.initializeApp({
        apiKey: "AIzaSyCF8mKFD_u2JxKJWH9Pka7JuZVWYrYQB-g",
      authDomain: "replenished-607cb.firebaseapp.com",
      databaseURL: "https://replenished-607cb-default-rtdb.firebaseio.com/",
      projectId: "replenished-607cb",
      storageBucket: "replenished-607cb.firebasestorage.app",
      messagingSenderId: "420146780341",
      appId: "1:420146780341:web:1388200fb9384ebd3106fc",
      measurementId: "G-Z50MQPNTX8"
});


// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "{{asset('public/android-chrome-512x512.png')}}",
        click_action: payload.notification.click_action
    };
  
    return self.registration.showNotification(
        notificationTitle,
        notificationOptions
    );
});


