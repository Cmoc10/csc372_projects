<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEPI URI</title>
    <style> 
      @import 'src/CSS/stylesheet.css';
    </style>
  </head>
  <body>
    <?php include 'src/php/validation.php' ?>
    <div id="app"></div>
    <div class="header">
        <img src="src/images/Logo.png" alt="AEPI Logo" width="20%" height="15%" id="logo">
        <nav class="navbar">
            <a href="index.php" class="navbar_item">Home</a>
            <a href="about.php" class="navbar_item">About Us</a>
            <a href="contact.php" class="navbar_item">Contact</a>
            <a href="merch.php" class="navbar_item">Merch</a>
            <a href="philanthropy.php" class="navbar_item">Philanthropy</a>
            <a href="alumni.php" class="navbar_item">Alumni</a>
        </nav>
    </div>
    <div class="content">
      <h1>Alpha Epsilon Pi</h1>
      <p>At Alpha Epsilon Pi Rho Chapter, we strive to be active in
      philanthropy and community service. We are proud to support the following causes:</p>
     
      <div class="philanthropy-container">
          <!-- Israel Cancer Research Fund -->
          <div class="philanthropy-item">
              <div class="philanthropy-logo-container">
                <img src="src/images/icrf_logo.jpg" alt="Israel Cancer Research Fund" class="philanthropy-logo">
              </div>
              <button id="icrf_button" class="philanthropy-button">Learn More</button>
              <div id="icrf_info" class="philanthropy-info"></div>
          </div>
         
          <!-- United Hatzalah -->
          <div class="philanthropy-item">
              <div class="philanthropy-logo-container">
                <img src="src/images/hatzalah_logo.png" alt="United Hatzalah" class="philanthropy-logo">
              </div>
              <button id="hatzalah_button" class="philanthropy-button">Learn More</button>
              <div id="hatzalah_info" class="philanthropy-info"></div>
          </div>
         
          <!-- Special Olympics Rhode Island -->
          <div class="philanthropy-item">
              <div class="philanthropy-logo-container">
                <img src="src/images/sori_logo.jpg" alt="Special Olympics Rhode Island" class="philanthropy-logo">
              </div>
              <button id="sori_button" class="philanthropy-button">Learn More</button>
              <div id="sori_info" class="philanthropy-info"></div>
          </div>
      </div>
      <div class="author_info">
          <h4>Author</h4>
          <p>Created by: Colin O'Connor</p>
          <a href="mailto:colin_oconnor9@uri.edu">colin_oconnor9@uri.edu</a>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src = "js/jquery-3.7.1.min.js><\/script>');
    </script>
    <script src="src/js/scripts.js"></script>
    <script src="src/js/index-html.js"></script>
  </body>
</html>