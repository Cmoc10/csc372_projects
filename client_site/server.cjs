var http = require('http');
var fs = require('fs');
var portnum = 1337;

function serveStaticFile(res, path, contentType, responseCode) {
    if(!responseCode){
        responseCode = 200;
    }
    fs.readFile(__dirname + path, function(err, data) {
        if(err) {
            res.writeHead(500, {'Content-Type': 'text/plain'});
            res.end('500 - Internal Error');
        }
        else {
            res.writeHead(responseCode, {'Content-Type': contentType});
            res.end(data);
        }
    });
}

http.createServer(function(req, res)  {
    req.url = req.url.toLowerCase();
    
    // HTML pages
    if(req.url === '/' || req.url === '/index' || req.url === '/index.html') {
        serveStaticFile(res, '/public/index.html', 'text/html');
    }
    else if(req.url === '/404' || req.url === '/404.html') {
        serveStaticFile(res, '/public/404.html', 'text/html');
    }
    else if(req.url === '/about' || req.url === '/about.html') {
        serveStaticFile(res, '/public/about.html', 'text/html');
    }
    else if(req.url === '/alumni' || req.url === '/alumni.html') {
        serveStaticFile(res, '/public/alumni.html', 'text/html');
    }
    else if(req.url === '/contact' || req.url === '/contact.html') {
        serveStaticFile(res, '/public/contact.html', 'text/html');
    }
    else if(req.url === '/merch' || req.url === '/merch.html') {
        serveStaticFile(res, '/public/merch.html', 'text/html');
    }
    else if(req.url === '/philanthropy' || req.url === '/philanthropy.html') {
        serveStaticFile(res, '/public/philanthropy.html', 'text/html');
    }
    
    // CSS files
    else if(req.url.endsWith('.css')) {
        serveStaticFile(res, '/public' + req.url, 'text/css');
    }
    
    // Image files
    else if(req.url.endsWith('.jpg') || req.url.endsWith('.jpeg')) {
        serveStaticFile(res, '/public/images' + req.url, 'image/jpeg');
    }
    else if(req.url.endsWith('.png')) {
        serveStaticFile(res, '/public/images' + req.url, 'image/png');
    }
    else if(req.url.endsWith('.gif')) {
        serveStaticFile(res, '/public/images' + req.url, 'image/gif');
    }
    // Default - 404 page
    else {
        serveStaticFile(res, '/public/404.html', 'text/html', 404);
    }
    
}).listen(portnum, function() {
    console.log(`Server running at http://localhost:${portnum}/`);
});