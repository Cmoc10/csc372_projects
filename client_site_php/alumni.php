<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEPI Alumni</title>
    <style> @import './src/CSS/stylesheet.css';</style>
  </head>
  <body>
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
        <h1>Alpha Epsilon Pi Alumni</h1>
        <p>Stay connected with your brotherhood. Explore our alumni achievements, upcoming events, and ways to stay involved.</p>
        
        <div class="main-content">
            <div class="left-column newsletter">
                <h2>News</h2>
                <div class="news">
                  <p class="news_piece">Philanthropy Event a Success</p>
                  <p class="news_piece">Top Golf trip for the seniors</p>
                  <p class="news_piece">New Eboard elected</p>
              </div>
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="src/images/donut_event.jpg" class="slideshow_pic">
                    </div>
                
                    <div class="mySlides fade">
                        <img src="src/images/top_golf.jpg" class="slideshow_pic">
                    </div>
                
                    <div class="mySlides fade">
                        <img src="src/images/eboard.jpg" class="slideshow_pic">
                    </div>
                
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            
                <br>
            
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>
            
            <div class="right-column">
                <div class="interested">
                    <h2>Stay Connected</h2>
                    <p>Update your contact information, join our alumni network, and find out about upcoming events and opportunities.</p>
                    <button id="contact_button">Alumni Network</button>
                </div>
                
                <div class="merch">
                    <h2>Events</h2>
                    <p>Annual Homecoming Tailgate - October 14, 2024</p>
                    <p>Alumni Applebees - March 9, 2025</p>
                    <button id="contact_button">RSVP Now</button>
                </div>

                <div class="donate">
                    <h2>Support Our Chapter</h2>
                    <p>Help current and future brothers continue the AEPI legacy through your generous contribution.</p>
                    <button id="contact_button">Donate Now</button>
                </div>
            </div>
        </div>

        <div class = "author_info">
            <h4>Author</h4>
            <p>Created by: Colin O'Connor</p>
            <a href="mailto:colin_oconnor9@uri.edu">colin_oconnor9@uri.edu</a>
          </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-3.7.1.min.js"><\/script>');
    </script>
    <script src="src/js/scripts.js"></script>
    <script src="src/js/alumni_script.js"></script>
  </body>
</html>
