<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $service_id = $_POST['service_id'];
    $therapist_id = $_POST['therapist_id'];
    $appointment_date = $_POST['appointment_date'];
    $start_time = $_POST['start_time'];
    $status = 'pending';

    $sql = "INSERT INTO Appointments (user_id, therapist_id, service_id, appointment_date, start_time, status) 
            VALUES ('$user_id', '$therapist_id', '$service_id', '$appointment_date', '$start_time', '$status')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
</head>
<body>
    <h1>Book a Service</h1>
    <form method="POST">
        <label for="user_id">User ID:</label>
        <input type="number" name="user_id" required><br>

        <label for="service_id">Service ID:</label>
        <input type="number" name="service_id" required><br>

        <label for="therapist_id">Therapist ID:</label>
        <input type="number" name="therapist_id" required><br>

        <label for="appointment_date">Date:</label>
        <input type="date" name="appointment_date" required><br>

        <label for="start_time">Start Time:</label>
        <input type="time" name="start_time" required><br>

        <button type="submit">Book Now</button>
    </form>
</body>
</html>
