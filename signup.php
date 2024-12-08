<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - CIT17 Wellness</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <section class="signup-form">
        <h2>Create Your Account</h2>
        <form action="signup_process.php" method="POST">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required>

            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" id="password" name="password" required>
                <input type="checkbox" id="showPassword" class="show-password-checkbox">
            </div>

            <label for="confirm_password">Confirm Password:</label>
            <div class="password-container">
                <input type="password" id="confirm_password" name="confirm-password" required>
                <input type="checkbox" id="showConfirmPassword" class="show-password-checkbox">
            </div>

            <button type="submit" class="btn">Create Account</button>
        </form>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
        const passwordField = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('showPassword');
        const confirmPasswordField = document.getElementById('confirm_password');
        const showConfirmPasswordCheckbox = document.getElementById('showConfirmPassword');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                passwordField.type = 'text'; // Show password
            } else {
                passwordField.type = 'password'; // Hide password
            }
        });

        showConfirmPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                confirmPasswordField.type = 'text'; // Show confirm password
            } else {
                confirmPasswordField.type = 'password'; // Hide confirm password
            }
        });
    </script>
</body>
</html>
