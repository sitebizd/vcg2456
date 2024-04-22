window.onload = function() {
    var helloElement = document.getElementById('hello');
    helloElement.textContent = 'Hello, ' + window._env_.USER_NAME;
};
