const express = require('express');
const path = require('path');

// Create Express application
const app = express();

// Set port number
const portnum = 1337;

// Set path to public directory
const publicDir = __dirname;

// Serve static files from specific directories
app.use('/css', express.static(path.join(publicDir, 'css')));
app.use('/images', express.static(path.join(publicDir, 'images')));
app.use('/js', express.static(path.join(publicDir, 'js')));

// Serve static files from public directory
app.use(express.static(publicDir));

// Route handlers for specific pages
app.get(['/', '/index', '/index.html'], (req, res) => {
    res.sendFile(path.join(publicDir, 'index.html'));
});

app.get(['/about', '/about.html'], (req, res) => {
    res.sendFile(path.join(publicDir, 'about.html'));
});

app.get(['/alumni', '/alumni.html'], (req, res) => {
    res.sendFile(path.join(publicDir, 'alumni.html'));
});

app.get(['/contact', '/contact.html'], (req, res) => {
    res.sendFile(path.join(publicDir, 'contact.html'));
});

app.get(['/merch', '/merch.html'], (req, res) => {
    res.sendFile(path.join(publicDir, 'merch.html'));
});

app.get(['/philanthropy', '/philanthropy.html'], (req, res) => {
    res.sendFile(path.join(publicDir, 'philanthropy.html'));
});

app.get(['/*', '/404.html'], (req, res) => {
    res.status(404).sendFile(path.join(publicDir, '404.html'));
}
);

// Start the server
app.listen(portnum, () => {
    console.log(`Server running at http://localhost:${portnum}/`);
});