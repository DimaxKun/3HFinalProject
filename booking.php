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
        $message = "Appointment booked successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .booking-container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .booking-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-group button:hover {
            background: #218838;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="booking-container">
        <h1>Book a Service</h1>
        <?php if (isset($message)): ?>
            <div class="message <?php echo (strpos($message, 'successfully') !== false) ? 'success' : 'error'; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="number" name="user_id" required>
            </div>
            <div class="form-group">
                <label for="service_id">Service ID:</label>
                <input type="number" name="service_id" required>
            </div>
            <div class="form-group">
                <label for="therapist_id">Therapist ID:</label>
                <input type="number" name="therapist_id" required>
            </div>
            <div class="form-group">
                <label for="appointment_date">Date:</label>
                <input type="date" name="appointment_date" required>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="time" name="start_time" required>
            </div>
            <div class="form-group">
                <button type="submit">Book Now</button>
            </div>
        </form>
    </div>
</body>
</html>