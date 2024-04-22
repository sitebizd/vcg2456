require('dotenv').config();
const express = require('express');
const app = express();

app.get('/env.js', function(req, res) {
    res.send('window._env_ = ' + JSON.stringify(process.env));
});

app.use(express.static(__dirname));

app.listen(3000, function() {
    console.log('Server is running on port 3000');
});
