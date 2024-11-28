<?php
include 'db.php';

$sql = "SELECT * FROM Services";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='service-card'>";
        echo "<h3>{$row['service_name']}</h3>";
        echo "<p>{$row['description']}</p>";
        echo "<p>Price: {$row['price']}</p>";
        echo "<button>Book Now</button>";
        echo "</div>";
    }
} else {
    echo "No services available.";
}
?>
