<?php
// Sample static user and therapist data (Replace with dynamic data)
$user_name = "USER";  // Retrieve from session or database
$therapist_name = "Eugene Taguro";  // Replace with dynamic therapist assignment

// Retrieve service details from the URL
$service_name = isset($_GET['service_name']) ? $_GET['service_name'] : "Unknown Service";
$duration = isset($_GET['duration']) ? $_GET['duration'] : "N/A";
$price = isset($_GET['price']) ? $_GET['price'] : "N/A";

// Sample appointment details (Replace with form submission or database data)
$appointment_date = date("Y-m-d");  // Default to today
$start_time = "10:00 AM";  // Replace with user selection
$end_time = "11:00 AM";    // Calculate based on duration
$status = "Pending";       // Default status
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .appointment-details {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .cta {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #004d40;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .cta:hover {
            background-color: #004d06;
        }
    </style>
</head>
<body>

<div class="appointment-details">
    <h2>Appointment Details</h2>
    <table>
        <tr>
            <th>User Name</th>
            <td><?php echo $user_name; ?></td>
        </tr>
        <tr>
            <th>Therapist Name</th>
            <td><?php echo $therapist_name; ?></td>
        </tr>
        <tr>
            <th>Service Name</th>
            <td><?php echo $service_name; ?></td>
        </tr>
        <tr>
            <th>Appointment Date</th>
            <td><?php echo $appointment_date; ?></td>
        </tr>
        <tr>
            <th>Start Time</th>
            <td><?php echo $start_time; ?></td>
        </tr>
        <tr>
            <th>End Time</th>
            <td><?php echo $end_time; ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo $status; ?></td>
        </tr>
    </table>
    <a href="payment.php?appointment_name=Massage%20Therapy&amount=80&status=unpaid" class="cta">Confirm Appointment</a>

</div>

</body>
</html>
