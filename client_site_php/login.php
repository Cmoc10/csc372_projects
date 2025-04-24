<?php
  // Include the session script
  require 'src/php/session.php';

  // If already logged in
  if ($logged_in) { 

    // Redirect to profile page  
    header('Location: admin.php'); 

    // Stop further code running
    exit;
  }    


  /*
     TO-DO: Check if the form was submitted. If so:
            - Get the username the user sent
            - Get the password the user sent
            - Call your authenticate function in the 'session.php' file to authenticate the user based on the provided username and password. 

            - If user is valid (i.e., user date returned), then:
              - Call the login function in the 'session.php' file to update session data
              - Redirect to profile page
              - Stop further code running 
   */
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If form submitted

    $username = $_POST['username']; // Get username from form
    $password = $_POST['password']; // Get password from form

    $user = authenticate_user($pdo, $username, $password); // Authenticate user

    if ($user) { // If user is valid

      login($username); // Update session data
      header('Location: admin.php'); // Redirect to profile page
      exit; // Stop further code running
    }
    else { // If user is invalid

      $error = "Invalid username or password"; // Set error message
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="src/CSS/stylesheet.css">
</head>
<body>
<div class="content">
  <h1>Login</h1>
  <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
  <form method="POST">
    <label>Username:</label>
    <input type="text" name="username" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <input type="submit" value="Login">
  </form>
</div>
</body>
</html>
