<!DOCTYPE html>
<html lang="en">
    <?php include 'src/php/database-connection.php' ?>
    <?php include 'src/php/eboard-functions.php' ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEPI URI</title>
    <style> @import './src/CSS/stylesheet.css';</style>
  </head>
  <body>
    <div id="app"></div>
    <div class="header">
        <img src="src/images/Logo.png" alt="AEPI Logo" width="20%" height="15%" id = "logo">
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
        <p>Alpha Epsilon Pi Rho Chapter, is an upstanding organization
            providing the best possible college and fraternity experience
            for Jewish men. We strive to meet the standards we have made
            for ourselves at URI</p>
    
        <h2>Meet our Eboard</h2>
        <?php
            // Fetch E-board members and generate the grid
            $eboardMembers = fetchEboardMembers($pdo);
            echo generateEboardGrid($eboardMembers);
        ?>
        
        <h2>Our History</h2>
        <p>Alpha Epsilon Pi was founded in 1913 at New York University.
             The Rho Chapter at the University of Rhode Island was
             established in 1928. Over the past 4 years, our chapter has
             had a resurgence in membership and involvement. We are proud
             of our history and excited for our future.</p>
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
    <script src="src/js/about_script.js"></script>
  </body>
</html>