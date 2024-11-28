<?php
$host = "localhost:3306";
$username = "root";
$password = "";
$db_name = "booking_system";

// Connect to the database server
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to the server.<br><br>";

// Create the database
$sql = "CREATE DATABASE IF NOT EXISTS $db_name";
if ($conn->query($sql) === TRUE) {
    echo "Database '$db_name' created successfully.<br><br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($db_name);

// Create tables
$tables = [
    // Users
    "CREATE TABLE IF NOT EXISTS Users (
        user_id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        phone_number VARCHAR(15),
        password VARCHAR(255) NOT NULL,
        role ENUM('customer', 'therapist', 'admin') NOT NULL DEFAULT 'customer',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )",
    
    // Services
    "CREATE TABLE IF NOT EXISTS Services (
        service_id INT AUTO_INCREMENT PRIMARY KEY,
        service_name VARCHAR(100) NOT NULL,
        description TEXT,
        duration INT NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )",
    
    // Appointments
    "CREATE TABLE IF NOT EXISTS Appointments (
        appointment_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        therapist_id INT NOT NULL,
        service_id INT NOT NULL,
        appointment_date DATE NOT NULL,
        start_time TIME NOT NULL,
        end_time TIME,
        status ENUM('pending', 'confirmed', 'completed', 'canceled') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES Users(user_id),
        FOREIGN KEY (therapist_id) REFERENCES Users(user_id),
        FOREIGN KEY (service_id) REFERENCES Services(service_id)
    )",
    
    // Payments
    "CREATE TABLE IF NOT EXISTS Payments (
        payment_id INT AUTO_INCREMENT PRIMARY KEY,
        appointment_id INT NOT NULL,
        amount DECIMAL(10,2) NOT NULL,
        payment_method ENUM('cash', 'credit_card', 'paypal') NOT NULL,
        payment_status ENUM('paid', 'unpaid', 'refunded') DEFAULT 'unpaid',
        transaction_id VARCHAR(100),
        payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (appointment_id) REFERENCES Appointments(appointment_id)
    )",
    
    // Availability
    "CREATE TABLE IF NOT EXISTS Availability (
        availability_id INT AUTO_INCREMENT PRIMARY KEY,
        therapist_id INT NOT NULL,
        date DATE NOT NULL,
        start_time TIME NOT NULL,
        end_time TIME NOT NULL,
        FOREIGN KEY (therapist_id) REFERENCES Users(user_id)
    )",
    
    // Reviews
    "CREATE TABLE IF NOT EXISTS Reviews (
        review_id INT AUTO_INCREMENT PRIMARY KEY,
        appointment_id INT NOT NULL,
        user_id INT NOT NULL,
        rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
        comment TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (appointment_id) REFERENCES Appointments(appointment_id),
        FOREIGN KEY (user_id) REFERENCES Users(user_id)
    )",
    
    // Promotions
    "CREATE TABLE IF NOT EXISTS Promotions (
        promo_id INT AUTO_INCREMENT PRIMARY KEY,
        promo_code VARCHAR(50) NOT NULL UNIQUE,
        description TEXT,
        discount_percent DECIMAL(5,2) NOT NULL CHECK (discount_percent >= 0 AND discount_percent <= 100),
        start_date DATE NOT NULL,
        end_date DATE NOT NULL
    )"
];

// Execute table creation queries
foreach ($tables as $table_sql) {
    if ($conn->query($table_sql) === TRUE) {
        echo "Table created successfully.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
}

// Close the connection
$conn->close();
echo "<br>Setup completed successfully.";
?>
