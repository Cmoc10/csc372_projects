<?php
require 'src/php/session.php';
require_login($logged_in);
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="src/CSS/stylesheet.css">
</head>
<body>
<div class="content">
  <h1>Admin Dashboard</h1>
  <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
  <a href="logout.php">Logout</a>
  <hr>
  <h2>Brother Contact Management</h2>

  <form method="POST" action="">
    <label>Name:</label><br>
    <input type="text" name="name" required><br>

    <label>Position ID (number — must exist in eboard_members table):</label><br>
    <input type="number" name="position_id"><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br>

    <label>Phone:</label><br>
    <input type="text" name="phone"><br><br>

    <button type="submit" name="action" value="add">Add Brother</button>
    <button type="submit" name="action" value="update">Update Brother</button>
    <button type="submit" name="action" value="delete">Delete Brother</button>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position_id = !empty($_POST['position_id']) ? $_POST['position_id'] : null;
    $email = $_POST['email'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $action = $_POST['action'];

    try {
      // ADD BROTHER
      if ($action == 'add') {
        $stmt = $pdo->prepare("INSERT INTO contact_information (name, position_id, phone, email, created_at, updated_at)
                               VALUES (:name, :position_id, :phone, :email, NOW(), NOW())");
        $stmt->execute([
          ':name' => $name,
          ':position_id' => $position_id,
          ':phone' => $phone,
          ':email' => $email
        ]);
        echo "<p>Brother successfully added!</p>";

      // UPDATE BROTHER
      } elseif ($action == 'update') {
        $stmt = $pdo->prepare("UPDATE contact_information 
                               SET position_id = :position_id, phone = :phone, email = :email, updated_at = NOW()
                               WHERE name = :name");
        $stmt->execute([
          ':position_id' => $position_id,
          ':phone' => $phone,
          ':email' => $email,
          ':name' => $name
        ]);
        if ($stmt->rowCount() > 0) {
          echo "<p>Brother information updated successfully.</p>";
        } else {
          echo "<p>No matching brother found to update.</p>";
        }

      // DELETE BROTHER
      } elseif ($action == 'delete') {
        $stmt = $pdo->prepare("DELETE FROM contact_information WHERE name = :name");
        $stmt->execute([':name' => $name]);
        if ($stmt->rowCount() > 0) {
          echo "<p>Brother deleted successfully.</p>";
        } else {
          echo "<p>No matching brother found to delete.</p>";
        }
      }

    } catch (PDOException $e) {
      echo "<p>Error: " . $e->getMessage() . "</p>";
    }
  }
  ?>

</div>
</body>
</html>
