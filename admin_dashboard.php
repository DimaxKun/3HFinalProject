<?php
include 'db.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    die("Access denied.");
}

$sqlServices = "SELECT * FROM Services";
$sqlAppointments = "SELECT * FROM Appointments";
$sqlUsers = "SELECT * FROM Users WHERE role = 'therapist'";

$services = $conn->query($sqlServices);
$appointments = $conn->query($sqlAppointments);
$therapists = $conn->query($sqlUsers);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <section>
        <h2>Manage Services</h2>
        <table border="1">
            <tr>
                <th>Service Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $services->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['service_name'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td>
                        <a href="edit_service.php?id=<?= $row['service_id'] ?>">Edit</a>
                        <a href="delete_service.php?id=<?= $row['service_id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </section>
    <section>
        <h2>Manage Appointments</h2>
        <table border="1">
            <tr>
                <th>Appointment ID</th>
                <th>User ID</th>
                <th>Therapist ID</th>
                <th>Service ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $appointments->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['appointment_id'] ?></td>
                    <td><?= $row['user_id'] ?></td>
                    <td><?= $row['therapist_id'] ?></td>
                    <td><?= $row['service_id'] ?></td>
                    <td><?= $row['appointment_date'] ?></td>
                    <td><?= $row['start_time'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td>
                        <a href="update_appointment.php?id=<?= $row['appointment_id'] ?>">Update</a>
                        <a href="delete_appointment.php?id=<?= $row['appointment_id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </section>
    <section>
        <h2>Manage Therapists</h2>
        <table border="1">
            <tr>
                <th>Therapist ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $therapists->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['user_id'] ?></td>
                    <td><?= $row['full_name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td>
                        <a href="edit_therapist.php?id=<?= $row['user_id'] ?>">Edit</a>
                        <a href="delete_therapist.php?id=<?= $row['user_id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </section>
</body>
</html>
