<?php
include 'includes/db.php';

if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    // Fetch appointment details
    $query = "SELECT * FROM appointments WHERE appointment_id = '$appointment_id'";
    $result = mysqli_query($conn, $query);
    $appointment = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Insert review into the reviews table
    $query = "INSERT INTO reviews (user_id, appointment_id, rating, comment) 
              VALUES ('{$_SESSION['user_id']}', '$appointment_id', '$rating', '$comment')";
    if (mysqli_query($conn, $query)) {
        // Update appointment to link the review
        $review_id = mysqli_insert_id($conn);
        $query = "UPDATE appointments SET review_id = '$review_id' WHERE appointment_id = '$appointment_id'";
        mysqli_query($conn, $query);

        echo "Thank you for your review!";
    } else {
        echo "Error submitting review.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Review - CIT17 Wellness</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <section class="review-form">
        <h2>Leave a Review for Your Appointment</h2>
        <form action="" method="POST">
            <label for="rating">Rating:</label>
            <select name="rating" id="rating" required>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>

            <label for="comment">Comment:</label>
            <textarea name="comment" id="comment" rows="4" required></textarea>

            <button type="submit" class="btn">Submit Review</button>
        </form>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
