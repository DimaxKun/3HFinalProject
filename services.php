<?php
include 'db.php'; // Include database connection

// Default SQL query
$sql = "SELECT * FROM Services";

// Filter and sorting logic
$filters = [];
$orderBy = "";

// Handle filters
if (isset($_GET['price_range']) && !empty($_GET['price_range'])) {
    $priceRange = explode("-", $_GET['price_range']);
    $filters[] = "price BETWEEN {$priceRange[0]} AND {$priceRange[1]}";
}
if (isset($_GET['duration']) && !empty($_GET['duration'])) {
    $filters[] = "duration = {$_GET['duration']}";
}
if (isset($_GET['service_type']) && !empty($_GET['service_type'])) {
    $filters[] = "service_name LIKE '%" . $conn->real_escape_string($_GET['service_type']) . "%'";
}

// Handle sorting
if (isset($_GET['sort_by']) && !empty($_GET['sort_by'])) {
    $sortBy = $_GET['sort_by'];
    if ($sortBy === "price") {
        $orderBy = "ORDER BY price ASC";
    } elseif ($sortBy === "duration") {
        $orderBy = "ORDER BY duration ASC";
    } elseif ($sortBy === "popularity") {
        $orderBy = "ORDER BY created_at DESC"; // Assuming popularity is based on recency
    }
}

// Combine filters into SQL query
if (!empty($filters)) {
    $sql .= " WHERE " . implode(" AND ", $filters);
}
$sql .= " $orderBy";

// Execute query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Our Services - Wellness Booking System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            position: relative;
            background: url('hero-background.jpg') center/cover no-repeat;
            color: white;
            text-align: center;
            padding: 60px 20px;
        }

        header h1 {
            font-size: 3rem;
            margin: 0;
        }

        header p {
            font-size: 1.2rem;
            margin: 10px 0 20px;
        }

        .cta-buttons a {
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            padding: 15px 30px;
            margin: 5px;
            border-radius: 5px;
            font-size: 1rem;
        }

        .cta-buttons a:hover {
            background-color: #0056b3;
        }

        .services {
            padding: 40px 20px;
            background-color: #f9f9f9;
        }

        .services h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .services .service-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .service-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            padding: 15px;
        }

        .service-card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .service-card h3 {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .service-card p {
            font-size: 0.9rem;
            color: #555;
        }

        .service-card .price, .service-card .duration {
            font-size: 1rem;
            margin: 5px 0;
        }

        .service-card a {
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            margin-top: 10px;
            display: inline-block;
            border-radius: 5px;
        }

        .service-card a:hover {
            background-color: #0056b3;
        }

        .filter-bar {
            padding: 20px;
            background-color: #f4f4f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .filter-bar select, .filter-bar button {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .filter-bar button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

        .filter-bar button:hover {
            background-color: #0056b3;
        }


        .cta-section a {
        text-decoration: none;
        background-color: #111;
        color: white;
        padding: 15px 30px;
        border-radius: 5px;
        font-size: 1.2rem;
        }
    </style>
</head>
<body>

<header>
    <h1>Our Services</h1>
</header>

<div class="filter-bar">
    <form method="GET">
        <select name="service_type">
            <option value="">All Services</option>
            <option value="Massage">Massage</option>
            <option value="Facial">Facial</option>
            <option value="Yoga">Yoga</option>
        </select>
        <select name="price_range">
            <option value="">Price Range</option>
            <option value="0-1000">₱0 - ₱1000</option>
            <option value="1001-3000">₱1001 - ₱3000</option>
            <option value="3001-5000">₱3001 - ₱5000</option>
        </select>
        <select name="duration">
            <option value="">Duration</option>
            <option value="30">30 minutes</option>
            <option value="60">1 hour</option>
            <option value="120">2 hours</option>
        </select>
        <select name="sort_by">
            <option value="">Sort By</option>
            <option value="popularity">Popularity</option>
            <option value="price">Price</option>
            <option value="duration">Duration</option>
        </select>
        <button type="submit">Apply</button>
    </form>
</div>

<section class="services">
    <h2>Explore Our Offerings</h2>
    <div class="service-grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="service-card">
                    <img src="images/<?php echo strtolower(str_replace(' ', '_', $row['service_name'])); ?>.jpg" 
                         alt="<?php echo htmlspecialchars($row['service_name']); ?>">
                    <h3><?php echo htmlspecialchars($row['service_name']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <p class="duration">Duration: <?php echo $row['duration']; ?> mins</p>
                    <p class="price"><strong>₱<?php echo number_format($row['price'], 2); ?></strong></p>
                    <a href="booking.php?service_id=<?php echo $row['service_id']; ?>" class="book-now-button">Book Now</a>
                </div>
                <?php
            }
        } else {
            echo "<p>No services available at the moment.</p>";
        }
        ?>
    </div>
</section>

<section class="cta-section">
    <h2>Ready to Transform Your Wellness?</h2>
    <a href="register.php">Get Started</a>
</section>

</body>
</html>
