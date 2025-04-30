<!DOCTYPE html>
<html lang="en">
    <?php include 'src/php/database-connection.php' ?>
    <?php include 'src/php/rush-chair-functions.php' ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AEPI URI - Contact</title>
    <style> @import './src/CSS/stylesheet.css';</style>
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
        <div class="main-content">
            <div class="left-column">
                <h2>Contact Alpha Epsilon Pi</h2>
                <p>We're excited to hear from potential new members! Alpha Epsilon Pi is open to all men at URI.</p>
                <div class="rush_chairs">
                    <?php
                        // Fetch Rush Chairs members and generate the display
                        $rushChairs = fetchRushChairs($pdo);
                        echo generateRushChairsDisplay($rushChairs);
                    ?>
                </div>
            </div>
            <div class="right-column">
                <div class="interested">
                    <h3>Get In Touch</h3>
                    <p>Fill out the form below to get in contact with us</p>
                    <div id = "contact_form">
                        <?php if ($formSubmitted && !$hasErrors && $success): ?>
                        <p style="color: green; font-weight: bold;">Thank you for your submission! We'll contact you soon via your preferred method.</p>
                        <?php endif; ?>

                        <?php if ($formSubmitted && $hasErrors): ?>
                        <p style="color: red; font-weight: bold;">Please fix the errors below and submit again.</p>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <label for="name">Name (required):</label>
                        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($formData['name']); ?>" required>
                        <?php if (!empty($errors['name'])): ?>
                            <span style="color: red;"><?php echo $errors['name']; ?></span>
                        <?php endif; ?><br><br>

                        <label for="phone">Phone (required):</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($formData['phone']); ?>" required>
                        <?php if (!empty($errors['phone'])): ?>
                            <span style="color: red;"><?php echo $errors['phone']; ?></span>
                        <?php endif; ?><br><br>

                        <label for="email">Email (optional):</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($formData['email']); ?>">
                        <?php if (!empty($errors['email'])): ?>
                            <span style="color: red;"><?php echo $errors['email']; ?></span>
                        <?php endif; ?><br><br>

                        <label>Preferred Contact Method:</label><br>
                        <input type="radio" id="contact-email" name="contact-method" value="email" <?php echo ($formData['contact-method'] === 'email') ? 'checked' : ''; ?>>
                        <label for="contact-email">Email</label><br>
                        <input type="radio" id="contact-phone" name="contact-method" value="phone" <?php echo ($formData['contact-method'] === 'phone') ? 'checked' : ''; ?>>
                        <label for="contact-phone">Phone</label>
                        <?php if (!empty($errors['contact-method'])): ?>
                            <br><span style="color: red;"><?php echo $errors['contact-method']; ?></span>
                        <?php endif; ?><br><br>

                        <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
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
        window.jQuery || document.write('<script src="js/jquery-3.7.1.min.js"><\/script>');
    </script>
    <script src="src/js/scripts.js"></script>
    <script src="src/js/contact_script.js"></script>
  </body>
</html>
