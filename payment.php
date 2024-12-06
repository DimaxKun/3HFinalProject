<?php
include 'db.php';

// Ensure the appointment ID and details are passed through the URL or session
if (isset($_GET['appointment_id']) && isset($_GET['service_name']) && isset($_GET['amount'])) {
    $appointment_id = $_GET['appointment_id'];
    $service_name = $_GET['service_name'];
    $amount = $_GET['amount'];
} else {
    // Redirect to an error page or the booking page if details are missing
    header("Location: booking.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }

        .payment-container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .payment-container h1 {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .payment-details {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select, input[type="text"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #007BFF;
            color: white;
            font-size: 1rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h1>Complete Your Payment</h1>
        <div class="payment-details">
            <p><strong>Appointment ID:</strong> <?php echo htmlspecialchars($appointment_id); ?></p>
            <p><strong>Service Name:</strong> <?php echo htmlspecialchars($service_name); ?></p>
            <p><strong>Amount:</strong> $<?php echo htmlspecialchars($amount); ?></p>
        </div>
        <form method="POST" action="process_payment.php">
            <input type="hidden" name="appointment_id" value="<?php echo htmlspecialchars($appointment_id); ?>">
            <input type="hidden" name="amount" value="<?php echo htmlspecialchars($amount); ?>">

            <label for="payment_method">Select Payment Method:</label>
            <select name="payment_method" required>
                <option value="cash">Cash</option>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
            </select>

            <button type="submit">Confirm Payment</button>
        </form>
    </div>
</body>
</html>
