<?php
include 'db.php';
session_start();

// Check if the user is an admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to login if not an admin
    exit;
}

// Fetch bookings, services, therapists, and payments for admin dashboard
$bookings = $conn->query("SELECT * FROM Appointments ORDER BY appointment_date DESC");
$services = $conn->query("SELECT * FROM Services");
$therapists = $conn->query("SELECT * FROM Users WHERE role = 'therapist'");
$payments = $conn->query("SELECT * FROM Payments");

// Handle booking actions (approve, cancel, reschedule)
if (isset($_GET['action'])) {
    $appointment_id = $_GET['appointment_id'];
    $action = $_GET['action'];

    if ($action == 'approve') {
        $conn->query("UPDATE Appointments SET status = 'confirmed' WHERE appointment_id = $appointment_id");
    } elseif ($action == 'cancel') {
        $conn->query("UPDATE Appointments SET status = 'canceled' WHERE appointment_id = $appointment_id");
    } elseif ($action == 'reschedule') {
        // Simulating rescheduling - could be expanded to allow input for new date/time
        $conn->query("UPDATE Appointments SET status = 'pending' WHERE appointment_id = $appointment_id");
    }

    header("Location: admin_dashboard.php");
    exit;
}

// Add new service
if (isset($_POST['add_service'])) {
    $service_name = $_POST['service_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];

    $conn->query("INSERT INTO Services (service_name, description, price, duration) VALUES ('$service_name', '$description', '$price', '$duration')");
    header("Location: admin_dashboard.php");
    exit;
}

// Handle therapist availability (this part is simplified)
if (isset($_POST['add_availability'])) {
    $therapist_id = $_POST['therapist_id'];
    $working_hours = $_POST['working_hours']; // Format: '9:00-17:00'

    $conn->query("INSERT INTO Therapist_Availability (therapist_id, working_hours) VALUES ('$therapist_id', '$working_hours')");
    header("Location: admin_dashboard.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 30px;
        }

        h1 {
            color: #2d6a4f; /* Calm green */
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #2d6a4f;
        }

        .section {
            margin-bottom: 40px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        table th {
            background-color: #eaf1f1; /* Light blue */
            color: #2d6a4f;
        }

        table td {
            background-color: #fafafa;
        }

        .btn {
            padding: 8px 16px;
            background-color: #007bff; /* Soft blue */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 0.9rem;
            margin-right: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3; /* Dark blue */
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-group input, .form-group select {
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #fafafa;
            font-size: 1rem;
        }

        .form-group button {
            padding: 12px 20px;
            background-color: #2d6a4f; /* Calm green */
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #1b4d29;
        }

        .form-footer {
            text-align: center;
            font-size: 0.9rem;
            margin-top: 20px;
        }

        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .container {
                margin: 20px;
            }

            .section {
                padding: 15px;
            }

            table th, table td {
                padding: 8px;
                font-size: 0.9rem;
            }

            .form-group input, .form-group select, .form-group button {
                padding: 10px;
                font-size: 1rem;
            }
        }

    </style>
</head>
<body>

<div class="container">
    <h1>Admin Dashboard</h1>

    <!-- Manage Bookings Section -->
    <div class="section">
        <h2>Manage Bookings</h2>
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>User</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($booking = $bookings->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $booking['appointment_id'] ?></td>
                        <td><?= $booking['user_id'] ?></td>
                        <td><?= $booking['service_id'] ?></td>
                        <td><?= $booking['appointment_date'] ?></td>
                        <td><?= $booking['status'] ?></td>
                        <td>
                            <a href="admin_dashboard.php?action=approve&appointment_id=<?= $booking['appointment_id'] ?>" class="btn">Approve</a>
                            <a href="admin_dashboard.php?action=cancel&appointment_id=<?= $booking['appointment_id'] ?>" class="btn">Cancel</a>
                            <a href="admin_dashboard.php?action=reschedule&appointment_id=<?= $booking['appointment_id'] ?>" class="btn">Reschedule</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Manage Services Section -->
    <div class="section">
        <h2>Manage Services</h2>
        <table>
            <thead>
                <tr>
                    <th>Service ID</th>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($service = $services->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $service['service_id'] ?></td>
                        <td><?= $service['service_name'] ?></td>
                        <td><?= $service['description'] ?></td>
                        <td><?= number_format($service['price'], 2) ?></td>
                        <td><?= $service['duration'] ?> mins</td>
                        <td>
                            <a href="edit_service.php?service_id=<?= $service['service_id'] ?>" class="btn">Edit</a>
                            <a href="delete_service.php?service_id=<?= $service['service_id'] ?>" class="btn">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <h3>Add New Service</h3>
        <form method="POST">
            <div class="form-group">
                <label for="service_name">Service Name</label>
                <input type="text" id="service_name" name="service_name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration (minutes)</label>
                <input type="number" id="duration" name="duration" required>
            </div>
            <div class="form-group">
                <button type="submit" name="add_service">Add Service</button>
            </div>
        </form>
    </div>

    <!-- Therapist Schedule Management Section -->
    <div class="section">
        <h2>Therapist Schedule Management</h2>
        <form method="POST">
            <div class="form-group">
                <label for="therapist_id">Therapist</label>
                <select id="therapist_id" name="therapist_id" required>
                    <?php while ($therapist = $therapists->fetch_assoc()) { ?>
                        <option value="<?= $therapist['user_id'] ?>"><?= $therapist['full_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="working_hours">Working Hours (e.g., 9:00-17:00)</label>
                <input type="text" id="working_hours" name="working_hours" required>
            </div>
            <div class="form-group">
                <button type="submit" name="add_availability">Add Availability</button>
            </div>
        </form>
    </div>

    <div class="section">
        <h2>Payments</h2>
        <table>
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>User</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($payment = $payments->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $payment['payment_id'] ?></td>
                        <td><?= $payment['user_id'] ?></td>
                        <td><?= number_format($payment['amount'], 2) ?></td>
                        <td><?= $payment['status'] ?></td>
                        <td>
                            <!-- Actions for updating payment status can be added -->
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Reports Section (Basic Overview) -->
    <div class="section">
        <h2>Reports</h2>
        <p>Display charts and data for bookings, earnings, etc.</p>
        <!-- Charts and other reports can be added using libraries like Chart.js or Google Charts -->
    </div>
</div>

</body>
</html>
