<?php
include 'db_connection.php';

$query = "SELECT * FROM bookings";
$result = mysqli_query($conn, $query);

echo "<table>
        <tr>
            <th>Booking ID</th>
            <th>Therapist</th>
            <th>Service</th>
            <th>Status</th>
            <th>Action</th>
        </tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['booking_id']}</td>
            <td>{$row['therapist_id']}</td>
            <td>{$row['service_id']}</td>
            <td>{$row['status']}</td>
            <td>
                <a href='approve_booking.php?id={$row['booking_id']}'>Approve</a> | 
                <a href='cancel_booking.php?id={$row['booking_id']}'>Cancel</a>
            </td>
        </tr>";
}
echo "</table>";
?>
