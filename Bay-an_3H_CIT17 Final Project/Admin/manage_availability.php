<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $therapist_id = $_POST['therapist_id'];
    $day_of_week = $_POST['day_of_week'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $query = "INSERT INTO availability (therapist_id, day_of_week, start_time, end_time) 
              VALUES ($therapist_id, '$day_of_week', '$start_time', '$end_time')";
    if (mysqli_query($conn, $query)) {
        echo "Availability added!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    <select name="therapist_id">
        <!-- List all therapists -->
        <option value="1">Therapist 1</option>
    </select><br>
    <select name="day_of_week">
        <option value="Monday">Monday</option>
        <!-- Other days -->
    </select><br>
    <input type="time" name="start_time" required><br>
    <input type="time" name="end_time" required><br>
    <button type="submit">Add Availability</button>
</form>
