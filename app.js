// Initialize Firebase
// TODO: Replace with your Firebase project configuration
var firebaseConfig = {
    apiKey: process.env.FIREBASE_API_KEY,
    authDomain: process.env.FIREBASE_AUTH_DOMAIN,
    projectId: process.env.FIREBASE_PROJECT_ID,
    storageBucket: process.env.FIREBASE_STORAGE_BUCKET,
    messagingSenderId: process.env.FIREBASE_MESSAGING_SENDER_ID,
    appId: process.env.FIREBASE_APP_ID
};
firebase.initializeApp(firebaseConfig);

// Get elements
var uploader = document.getElementById('uploader');
var imageUpload = document.getElementById('imageUpload');
var folderSelect = document.getElementById('folderSelect');
var imagePreview = document.getElementById('imagePreview');
var copyUrlButton = document.getElementById('copyUrlButton');
var imageUrl = document.getElementById('imageUrl');

// Listen for file selection
imageUpload.addEventListener('change', function(e) {
    // Get file
    var file = e.target.files[0];

    // Create a storage ref
    var storageRef = firebase.storage().ref(folderSelect.value + '/' + file.name);

    // Upload file
    var task = storageRef.put(file);

    // Update progress bar
    task.on('state_changed',
        function progress(snapshot) {
            var percentage = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            uploader.value = percentage;
        },
        function error(err) {
            console.log(err);
        },
        function complete() {
            task.snapshot.ref.getDownloadURL().then(function(downloadURL) {
                console.log('File available at', downloadURL);
                imagePreview.src = downloadURL;
                imageUrl.value = downloadURL;
            });
        }
    );
});

// Copy image URL to clipboard
copyUrlButton.addEventListener('click', function() {
    imageUrl.select();
    document.execCommand('copy');
});
