<?php
include 'db.php'; // Include database connection

// Hypothetical services (these would typically be fetched from the database)
$services = [
    ['service_id' => 1, 'service_name' => 'Massage Therapy', 'price' => 2900],
    ['service_id' => 2, 'service_name' => 'Facial Treatments', 'price' => 4100],
    ['service_id' => 3, 'service_name' => 'Yoga Sessions', 'price' => 1700],
    ['service_id' => 4, 'service_name' => 'Head Massage', 'price' => 2900],
    ['service_id' => 5, 'service_name' => 'Chair Massage', 'price' => 100],
    ['service_id' => 6, 'service_name' => 'Hair Therapy', 'price' => 1000]
];

// Hypothetical therapists (these would typically be fetched from the database)
$therapists = [
    ['user_id' => 1, 'full_name' => 'Jane Doe'],
    ['user_id' => 2, 'full_name' => 'John Smith'],
    ['user_id' => 3, 'full_name' => 'Emily Johnson'],
    ['user_id' => 4, 'full_name' => 'Michael Brown'],
    ['user_id' => 5, 'full_name' => 'Sarah Williams']
];

// Process the appointment booking form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id']; // Assuming the user is logged in
    $service_id = $_POST['service_id'];
    $therapist_id = $_POST['therapist_id'];
    $appointment_date = $_POST['appointment_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $payment_method = $_POST['payment_method'];
    $promo_code = $_POST['promo_code'] ?? '';
    
    // Insert the appointment into the database
    $stmt = $conn->prepare("INSERT INTO Appointments (user_id, therapist_id, service_id, appointment_date, start_time, end_time, status, payment_method, promo_code) VALUES (?, ?, ?, ?, ?, ?, 'pending', ?, ?)");
    $stmt->bind_param("iiissssss", $user_id, $therapist_id, $service_id, $appointment_date, $start_time, $end_time, $payment_method, $promo_code);

    if ($stmt->execute()) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - Wellness Booking System</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            width: 70%;
            margin: 0 auto;
            padding: 40px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #00796b; /* Calm green */
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1rem;
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 10px;
        }

        .form-group select, .form-group input {
            width: 100%;
            padding: 15px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .form-group input:focus, .form-group select:focus {
            outline: none;
            border-color: #007BFF;
            background-color: #fff;
        }

        button {
            background-color: #007BFF;
            color: white;
            font-size: 1rem;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Summary Section */
        .summary {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        .summary p {
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .summary strong {
            color: #333;
        }

        /* Payment Section */
        .payment-methods select, .payment-methods input {
            padding: 12px;
            margin: 5px 0;
            width: 100%;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .payment-methods button {
            padding: 12px 25px;
            font-size: 1.1rem;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
        }

        .payment-methods button:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .container {
                width: 90%;
            }

            .form-group select, .form-group input {
                padding: 12px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Book Your Appointment</h1>

    <!-- Step 1: Select Service and Therapist -->
    <div id="step1" class="step active">
        <h2>Select Service and Therapist</h2>
        <form method="POST" action="appointments.php">
            <div class="form-group">
                <label for="service_id">Select Service</label>
                <select id="service_id" name="service_id" required>
                    <option value="">Select Service</option>
                    <?php foreach ($services as $service) { ?>
                        <option value="<?= $service['service_id'] ?>"><?= $service['service_name'] ?> - ₱<?= number_format($service['price'], 2) ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="therapist_id">Select Therapist</label>
                <select id="therapist_id" name="therapist_id" required>
                    <option value="">Select Therapist</option>
                    <?php foreach ($therapists as $therapist) { ?>
                        <option value="<?= $therapist['user_id'] ?>"><?= $therapist['full_name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="button" onclick="goToStep(2)">Next Step</button>
        </form>
    </div>

    <!-- Step 2: Choose Date and Time -->
    <div id="step2" class="step">
        <h2>Choose Date and Time</h2>
        <form method="POST" action="appointments.php">
            <div class="form-group">
                <label for="appointment_date">Select Date</label>
                <input type="date" id="appointment_date" name="appointment_date" required>
            </div>

            <div class="form-group">
                <label for="start_time">Select Start Time</label>
                <input type="time" id="start_time" name="start_time" required>
            </div>

            <div class="form-group">
                <label for="end_time">Select End Time</label>
                <input type="time" id="end_time" name="end_time" required>
            </div>

            <button type="button" onclick="goToStep(3)">Next Step</button>
        </form>
    </div>

    <!-- Step 3: Confirmation and Payment -->
    <div id="step3" class="step">
        <h2>Confirm Appointment</h2>

        <div class="summary">
            <p><strong>Service:</strong> <span id="service-summary"></span></p>
            <p><strong>Therapist:</strong> <span id="therapist-summary"></span></p>
            <p><strong>Date:</strong> <span id="date-summary"></span></p>
            <p><strong>Time:</strong> <span id="time-summary"></span></p>
            <p><strong>Price:</strong> ₱<span id="price-summary"></span></p>
        </div>

        <div class="payment-methods">
            <h3>Select Payment Method</h3>
            <select name="payment_method" required>
                <option value="cash">Cash</option>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
            </select>

            <div class="form-group">
                <label for="promo_code">Promo Code (Optional)</label>
                <input type="text" name="promo_code" id="promo_code" placeholder="Enter promo code">
            </div>

            <button type="submit">Confirm Appointment</button>
        </div>
    </div>
</div>

<script>
    // Function to switch between steps
    function goToStep(step) {
        document.querySelectorAll('.step').forEach(function (element) {
            element.classList.remove('active');
        });
        document.getElementById('step' + step).classList.add('active');

        // Update the summary in Step 3
        if (step === 3) {
            const service = document.getElementById('service_id').selectedOptions[0].text;
            const therapist = document.getElementById('therapist_id').selectedOptions[0].text;
            const date = document.getElementById('appointment_date').value;
            const startTime = document.getElementById('start_time').value;
            const endTime = document.getElementById('end_time').value;

            document.getElementById('service-summary').textContent = service;
            document.getElementById('therapist-summary').textContent = therapist;
            document.getElementById('date-summary').textContent = date;
            document.getElementById('time-summary').textContent = startTime + " - " + endTime;

            const price = document.getElementById('service_id').selectedOptions[0].text.split(' - ')[1].replace('₱', '');
            document.getElementById('price-summary').textContent = price;
        }
    }
</script>

</body>
</html>
