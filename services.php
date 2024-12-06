<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Home - Wellness Booking System</title>
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
            background-color: ##004d40;
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

        .testimonials {
            padding: 40px 20px;
            background-color: #ffffff;
        }

        .testimonials h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .testimonial-slider {
            display: flex;
            overflow-x: auto;
            gap: 20px;
        }

        .testimonial-card {
            min-width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .cta-section {
            padding: 40px 20px;
            background-color: #004d40;
            color: white;
            text-align: center;
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

<header class="hero">
        <div class="hero-content">
            <h1>OUR SERVICES</h1>
    </header>
<section class="services">
<div class="services-grid">
            <div class="service-card">
                <img src="images/massages.webp" alt="Massage Therapy" class="massage-img">
                <h3>Massage Therapy</h3>
                <p>Relax your body and mind with our therapeutic massage treatments.</p>
                <p>DURATION: 30mins</p>
                <p><strong>₱2,900</strong></p>
                <a href="booking.php" class="book-now-button">Book Now</a>
            </div>
            <div class="service-card">
                <img src="images/yoga.webp" alt="Facial Treatments" class="facial-img">
                <h3>Facial Treatments</h3>
                <p>Rejuvenate your skin with our personalized facial care services.</p>
                <p>DURATION: 30mins</p>
                <p><strong>₱4,100</strong></p>
                <a href="booking.php" class="book-now-button">Book Now</a>
            </div>
            <div class="service-card">
                <img src="images/yoga.webp" alt="Yoga Sessions" class="yoga-img">
                <h3>Yoga Sessions</h3>
                <p>Connect with your inner self through relaxing yoga sessions.</p>
                <p>DURATION: 30mins</p>
                <p><strong>₱1,700</strong></p>
                <a href="booking.php" class="book-now-button">Book Now</a>
            </div>
        </div>
</section>
<section class="services">
<div class="services-grid">
            <div class="service-card">
                <img src="images/head.webp" alt="Massage Therapy" class="massage-img">
                <h3>Head Massage</h3>
                <p>Relax your body and mind with our therapeutic massage treatments.</p>
                <p>DURATION: 30mins</p>
                <p><strong>₱2,900</strong></p>
                <a href="booking.php" class="book-now-button">Book Now</a>
            </div>
            <div class="service-card">
                <img src="images/chair.webp" alt="Facial Treatments" class="facial-img">
                <h3>Chair Massage</h3>
                <p>Rejuvenate your skin with our personalized facial care services.</p>
                <p>DURATION: 20mins</p>
                <p><strong>₱100</strong></p>
                <a href="booking.php" class="book-now-button">Book Now</a>
            </div>
            <div class="service-card">
                <img src="images/hair.webp" alt="Yoga Sessions" class="yoga-img">
                <h3>Hair Therapy</h3>
                <p>Connect with your inner self through relaxing yoga sessions.</p>
                <p>DURATION: 1hr</p>
                <p><strong>₱1,000</strong></p>
                <a href="booking.php" class="book-now-button">Book Now</a>
            </div>
        </div>
</section>

<section class="testimonials">
    <h2>Recent Reviews</h2>
    <div class="testimonial-slider">
        <div class="testimonial-card">
            <p>“The massage therapy was amazing. I feel so relaxed!”</p>
            <strong>- Jane Doe</strong>
        </div>
        <div class="testimonial-card">
            <p>“Excellent service and friendly staff. Highly recommend!”</p>
            <strong>- John Smith</strong>
        </div>
    </div>
</section>

<section class="cta-section">
    <h2>Ready to Transform Your Wellness?</h2>
    <a href="register.php">Get Started</a>
</section>

</body>
</html>
