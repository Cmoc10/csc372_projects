const express = require('express');
const path = require('path');
const exphbs = require('express-handlebars');

// Create Express application
const app = express();

// Set port number
const portnum = 1337;

// Set up Handlebars view engine
app.engine('handlebars', exphbs.engine({ defaultLayout: 'main' }));
app.set('view engine', 'handlebars');
app.set('views', path.join(__dirname, 'views'));

// Serve static files from public directory
app.use(express.static(path.join(__dirname, 'public')));

// Route handlers for specific pages
app.get(['/', '/index'], (req, res) => {
    res.render('index');
});

app.get('/about', (req, res) => {
    res.render('about');
});

app.get('/alumni', (req, res) => {
    res.render('alumni');
});

app.get('/contact', (req, res) => {
    res.render('contact');
});

app.get('/merch', (req, res) => {
    res.render('merch');
});

app.get('/philanthropy', (req, res) => {
    res.render('philanthropy');
});

// Catch-all route for 404 errors
app.use((req, res) => {
    res.status(404).render('404');
});

// Start the server
app.listen(portnum, () => {
    console.log(`Server running at http://localhost:${portnum}/`);
});