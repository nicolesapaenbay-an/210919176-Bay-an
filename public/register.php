<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CIT17 Project - Register</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

  <section class="register">
    <h2>Register</h2>
    <form action="includes/process-register.php" method="POST">
      <div class="form-group">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" class="btn">Register</button>
      <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
  </section>

  <script src="js/script.js"></script>
</body>
</html>