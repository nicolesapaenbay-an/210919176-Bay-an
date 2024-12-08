<?php
// Function to sanitize input
function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Function to hash password
function hashPassword($password) {
  return password_hash($password, PASSWORD_DEFAULT);
}

// Function to verify password
function verifyPassword($password, $hashedPassword) {
  return password_verify($password, $hashedPassword);
}

// Function to get services
function getServices($service_type = '', $price_range = '', $duration = '', $sort_by = 'service_name', $sort_order = 'ASC') {
  global $conn;

  $sql = "SELECT * FROM Services WHERE 1"; // Start with WHERE 1 for easier condition building

  if (!empty($service_type)) {
    $sql .= " AND service_type = '$service_type'";
  }

  if (!empty($price_range)) {
    if ($price_range === '0-50') {
      $sql .= " AND price BETWEEN 0 AND 50";
    } elseif ($price_range === '50-100') {
      $sql .= " AND price BETWEEN 50 AND 100";
    } elseif ($price_range === '100+') {
      $sql .= " AND price >= 100";
    }
  }

  if (!empty($duration)) {
    $sql .= " AND duration = $duration";
  }

  $sql .= " ORDER BY $sort_by $sort_order";

  $result = $conn->query($sql);
  return $result;
}

// Function to get therapists
function getTherapists() {
  global $conn;
  $sql = "SELECT * FROM Users WHERE role = 'therapist'";
  $result = $conn->query($sql);
  return $result;
}

// Function to get therapist availability
function getTherapistAvailability($therapist_id, $date) {
  global $conn;
  $sql = "SELECT * FROM Availability WHERE therapist_id = $therapist_id AND date = '$date'";
  $result = $conn->query($sql);
  return $result;
}

// Function to book appointment
function bookAppointment($data) {
  global $conn;
  $user_id = sanitizeInput($data['user_id']);
  $therapist_id = sanitizeInput($data['therapist_id']);
  $service_id = sanitizeInput($data['service_id']);
  $appointment_date = sanitizeInput($data['appointment_date']);
  $start_time = sanitizeInput($data['start_time']);
  $end_time = sanitizeInput($data['end_time']);

  $sql = "INSERT INTO Appointments (user_id, therapist_id, service_id, appointment_date, start_time, end_time) VALUES ('$user_id', '$therapist_id', '$service_id', '$appointment_date', '$start_time', '$end_time')";

  if ($conn->query($sql) === TRUE) {
    return true;
  } else {
    return false;
  }
}

// Function to check if a time slot is available
function isTimeSlotAvailable($therapist_id, $date, $start_time, $end_time) {
    global $conn;
    $sql = "SELECT * FROM Appointments WHERE therapist_id = $therapist_id AND appointment_date = '$date' AND (start_time BETWEEN '$start_time' AND '$end_time' OR end_time BETWEEN '$start_time' AND '$end_time')";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      return false; // Time slot is not available
    } else {
      return true; // Time slot is available
    }
  }