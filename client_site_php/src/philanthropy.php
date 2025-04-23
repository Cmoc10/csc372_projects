<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEPI URI</title>
    <style> 
      @import 'src/CSS/stylesheet.css';
            /* New philanthropy grid styles */
            .philanthropy-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        margin: 40px auto;
      }
      
      .philanthropy-item {
        text-align: center;
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
      }
      
      .philanthropy-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      }
      
      .philanthropy-logo-container {
        width: 100%;
        padding-bottom: 100%; /* Creates a square aspect ratio */
        position: relative;
        margin-bottom: 15px;
      }
      
      .philanthropy-logo {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain; /* Maintains aspect ratio within the square */
        border-radius: 8px;
        border: 3px solid #002147;
        box-sizing: border-box;
      }
      
      .philanthropy-button {
        background-color: #002147;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: 0.3s ease;
        margin-top: 10px;
      }
      
      .philanthropy-button:hover {
        background-color: #ffd700;
        color: #002147;
      }
      
      .philanthropy-info {
        margin-top: 15px;
        padding: 10px;
      }
      
      /* Responsive design for smaller screens */
      @media (max-width: 1200px) {
        .philanthropy-container {
          grid-template-columns: repeat(2, 1fr);
        }
      }
      
      @media (max-width: 768px) {
        .philanthropy-container {
          grid-template-columns: 1fr;
        }
      }
    </style>
  </head>
  <body>
    <?php include 'src/php/validation.php' ?>
    <div id="app"></div>
    <div class="header">
        <img src="src/images/Logo.png" alt="AEPI Logo" width="20%" height="15%" id="logo">
        <nav class="navbar">
            <a href="index.php" class="navbar_item">Home</a>
            <a href="About.php" class="navbar_item">About Us</a>
            <a href="Contact.php" class="navbar_item">Contact</a>
            <a href="merch.php" class="navbar_item">Merch</a>
            <a href="Philanthropy.php" class="navbar_item">Philanthropy</a>
            <a href="Alumni.php" class="navbar_item">Alumni</a>
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
    <script src="src/js/index-jq.js"></script>
    <script src="src/js/scripts.js"></script>
    <script src="src/js/index-html.js"></script>
  </body>
</html>