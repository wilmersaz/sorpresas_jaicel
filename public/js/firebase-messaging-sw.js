if( 'undefined' === typeof window){
  importScripts('https://www.gstatic.com/firebasejs/5.0.2/firebase-app.js');
  importScripts('https://www.gstatic.com/firebasejs/5.0.2/firebase-messaging.js');
}
// Initialize Firebase
    var config = {
        apiKey: "AIzaSyAklGsuskUGoqHoxyL_Dz3OXkj1BH-Olmo",
        authDomain: "viseapp-bbf06.firebaseapp.com",
        databaseURL: "https://viseapp-bbf06.firebaseio.com",
        projectId: "viseapp-bbf06",
        storageBucket: "viseapp-bbf06.appspot.com",
        messagingSenderId: "506112626355"
    };
    firebase.initializeApp(config);
    // Get a reference to the database service
    const messaging = firebase.messaging();


