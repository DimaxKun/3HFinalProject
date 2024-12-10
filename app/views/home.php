<?php include 'templates/header.php'; ?>

<!-- Hero Section with Video Background -->
<div class="hero-section position-relative overflow-hidden">

    <div class="hero-content text-center text-white d-flex align-items-center min-vh-100" style="font-family: 'Quicksand', sans-serif;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                        
                       
                    </div>
                    <h1 class="hero-title mb-4"  data-aos-duration="1000" style="font-size: 3.5rem; color: #FFFFFF;">
                        Welcome to <span style=color: white; -webkit-background-clip: text;>Haven Bliss</span>
                    </h1>
                    <p class="hero-subtitle mb-5"  data-aos-delay="100" data-aos-duration="1000" style="font-size: 1.25rem;">
                    "Serenity Redefined"
                    </p>
                    <div class="hero-buttons"  data-aos-delay="200" data-aos-duration="1000">
                        <a href="<?php echo BASE_URL; ?>/public/booking" 
                           class="btn btn-glass btn-lg px-5 me-3" 
                           style="background-color: black; color: white; border-radius: 5px;">
                            </i>Book Now
                            
                        </a>
                        <a href="<?php echo BASE_URL; ?>/public/services" 
                           class="btn btn-glass btn-lg px-5" 
                           style="background-color: black; color: white; border-radius: 5px;">
                            <i class="bi bi-arrow-right-circle me-2"></i>View Services
                            
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<style>
.hero-section {
    position: relative;
    background-color: #90ee90;  /* Light, soothing background */
    height: 100vh;
}

.hero-video-wrapper {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

:root {
            --bs-primary-rgb: 50, 207, 207; /* Custom RGB (Tomato color) */
        }


.hero-content {
    position: relative;
    z-index: 3;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.7rem 1.8rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);
    border-radius: 50px;
    border: 1px solid rgba(255, 255, 255, 0.3);  /* Soft borders */
    font-size: 1rem;  /* Slightly larger font */
    font-weight: 500;
    /*animation: float 3s ease-in-out infinite;*/
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    color: #536e78;  /* Softer text color */
}


.hero-title {
    font-size: 4rem;  /* Slightly smaller size for a more calm approach */
    font-weight: 700;
    line-height: 1.2;
    letter-spacing: -0.02em;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.25);  /* Lighter shadow */
    margin-bottom: 1.5rem;
    color: #000000;  /* Soft, muted blue */
}

.text-gradient {
    background: linear-gradient(135deg, #d0e7f9 0%, #b2c8f9 100%);  /* Subtle gradient with soft blues */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: 1.5rem;  /* Slightly larger subtitle for better readability */
    font-weight: 400;
    line-height: 1.6;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.25);  /* Softer shadow */
    opacity: 0.85;
    max-width: 650px;
    margin: 0 auto;
    color: #FFFFFF;  /* Calming grayish blue */
}

.hero-buttons {
    display: flex;
    justify-content: center;
    gap: 1.8rem;
}

.hero-buttons .btn {
    background-color: #88c0d0;  /* Soft blue for buttons */
    border-radius: 40px;  /* Rounded buttons for a friendly feel */
    padding: 12px 30px;
    font-size: 1.2rem;
    color: green;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.hero-buttons .btn:hover {
    background-color: #72a0b7;  /* Darker blue on hover */
    transform: translateY(-2px);  /* Slight lift effect on hover */
}

.hero-buttons .btn i {
    margin-right: 8px;
}

.hero-buttons .btn-glow {
    background-color: #a8d5e2;  /* Soft teal */
    color: #344b56;  /* Text color adjustment */
}

.hero-buttons .btn-glow:hover {
    background-color: #9ec9d7;
}

.btn-glow {
    position: relative;
    background: linear-gradient(45deg, #8ab3b2, #a0c6c5);  /* Soft teal gradient */
    border: none;
    border-radius: 50px;
    color: white;
    overflow: hidden;
    transition: all 0.4s ease;
    box-shadow: 0 4px 15px rgba(138, 179, 178, 0.3);  /* Softer shadow */
}

.btn-glow:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(138, 179, 178, 0.4);  /* Slightly deeper shadow */
}

.btn-glass {
    position: relative;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);  /* More blurred effect for a calming atmosphere */
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50px;
    color: white;
    overflow: hidden;
    transition: all 0.4s ease;
}

.btn-glass:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-3px);
}

.btn-shine {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        45deg,
        transparent,
        rgba(255, 255, 255, 0.1),
        transparent
    );
    transform: rotate(45deg);
    /*animation: shine 3s infinite;*/
}

.hero-scroll-indicator {
    position: absolute;
    bottom: 40px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 3;
    opacity: 0.85;  /* Slightly more visible to be calming */
    transition: opacity 0.3s ease;
}

.mouse {
    width: 26px;
    height: 42px;
    border: 2px solid #c8e0e7;  /* Softer light blue border */
    border-radius: 15px;
    position: relative;
    margin: 0 auto 10px;
}

.wheel {
    width: 4px;
    height: 8px;
    background: #c8e0e7;  /* Light blue wheel to match the color theme */
    position: absolute;
    top: 8px;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 2px;
    /*animation: scroll 2s infinite;*/
}

.arrow-wrapper {
    /*animation: bounce 2s infinite; */
}

.arrow {
    display: block;
    width: 10px;
    height: 10px;
    border-right: 2px solid #c8e0e7;  /* Soft light blue arrow border */
    border-bottom: 2px solid #c8e0e7;
    transform: rotate(45deg);
    margin: -5px auto 0;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); } /* Slightly less movement for a more subtle effect */
}

@keyframes twinkle {
    0%, 100% { opacity: 0.8; } /* Softer opacity transition */
    50% { opacity: 0.4; }
}

@keyframes shine {
    0% { left: -50%; }
    100% { left: 150%; }
}

@keyframes scroll {
    0% { opacity: 0.8; transform: translateX(-50%) translateY(0); }  /* Slightly more opacity for visibility */
    100% { opacity: 0; transform: translateX(-50%) translateY(15px); }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-8px); }  /* Slightly less bounce */
    60% { transform: translateY(-4px); }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem; /* Slightly smaller title for better fit */
    }
    
    .hero-subtitle {
        font-size: 1.2rem;  /* Adjust subtitle size */
        padding: 0 1rem;
    }

    .hero-buttons {
        flex-direction: column;
        gap: 1.2rem;  /* Slightly increased gap for better spacing */
        padding: 0 1rem;
    }

    .btn {
        width: 100%;  /* Full width buttons for mobile devices */
    }

    .hero-scroll-indicator {
        display: none; /* Hides the scroll indicator on mobile for less distraction */
    }
}

.floating-icons {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
    overflow: hidden;
}

.floating-icons .icon {
    position: absolute;
    color: rgba(255, 255, 255, 0.1); /* Softer icon color */
    filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.2)); /* Softer shadow for icons */
    pointer-events: none;
    transition: all 0.3s ease;
}

/* First Layer - Closest */
.floating-icons .icon:nth-child(1) {
    top: 10%;
    left: 15%;
    /*animation: floatingClose 8s ease-in-out infinite, glowing 2.5s ease-in-out infinite; /* Slower animation */
    font-size: 2.4rem; /* Slightly larger to stand out more */
}

.floating-icons .icon:nth-child(2) {
    top: 20%;
    right: 10%;
    /*animation: floatingClose 9s ease-in-out infinite, glowing 3s ease-in-out infinite; /* Slower glowing effect */
    font-size: 2.1rem;
}

/* Second Layer - Middle distance */
.floating-icons .icon:nth-child(3) {
    top: 45%;
    left: 25%;
    /*animation: floatingMid 12s ease-in-out infinite;*/
    font-size: 1.9rem;
    opacity: 0.15; /* Slightly brighter middle icons */
}

.floating-icons .icon:nth-child(4) {
    top: 35%;
    right: 20%;
    /*animation: floatingMid 11s ease-in-out infinite; */
    font-size: 1.8rem;
    opacity: 0.15;
}

/* Third Layer - Farthest */
.floating-icons .icon:nth-child(5) {
    top: 60%;
    left: 20%;
    /*animation: floatingFar 15s ease-in-out infinite;*/
    font-size: 1.5rem; /* Slightly larger farthest icon */
    opacity: 0.1;
}

 /* Add positions for new icons 
.floating-icons .icon:nth-child(6) { top: 75%; right: 18%; }
.floating-icons .icon:nth-child(7) { top: 30%; left: 25%; }
.floating-icons .icon:nth-child(8) { top: 85%; right: 22%; }
.floating-icons .icon:nth-child(9) { top: 40%; left: 30%; }
.floating-icons .icon:nth-child(10) { top: 55%; right: 28%; }
.floating-icons .icon:nth-child(11) { top: 25%; left: 35%; }
.floating-icons .icon:nth-child(12) { top: 70%; right: 32%; }
.floating-icons .icon:nth-child(13) { top: 45%; left: 40%; }
.floating-icons .icon:nth-child(14) { top: 60%; right: 38%; }
.floating-icons .icon:nth-child(15) { top: 35%; left: 45%; }
*/
/* Enhanced Animation Keyframes */
@keyframes floatingClose {
    0%, 100% {
        transform: translate(0, 0) rotate(0deg) scale(1);
    }
    25% {
        transform: translate(10px, -15px) rotate(5deg) scale(1.05);
    }
    50% {
        transform: translate(20px, 0) rotate(0deg) scale(1);
    }
    75% {
        transform: translate(10px, 15px) rotate(-5deg) scale(0.95);
    }
}

@keyframes floatingMid {
    0%, 100% {
        transform: translate(0, 0) rotate(0deg);
    }
    25% {
        transform: translate(15px, -20px) rotate(10deg);
    }
    50% {
        transform: translate(30px, 0) rotate(0deg);
    }
    75% {
        transform: translate(15px, 20px) rotate(-10deg);
    }
}

@keyframes floatingFar {
    0%, 100% {
        transform: translate(0, 0) rotate(0deg) scale(1);
    }
    33% {
        transform: translate(20px, -25px) rotate(15deg) scale(1.1);
    }
    66% {
        transform: translate(40px, 25px) rotate(-15deg) scale(0.9);
    }
}

@keyframes glowing {
    0%, 100% {
        filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.3));
    }
    50% {
        filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.5));
    }
}

    /* Add random animation delays to create more natural movement 
    .floating-icons .icon:nth-child(3n) { animation-delay: -2s; }
    .floating-icons .icon:nth-child(3n+1) { animation-delay: -4s; }
    .floating-icons .icon:nth-child(3n+2) { animation-delay: -6s; }*/

    /* Add hover effect on parent container 
    .hero-section:hover .floating-icons .icon {
        animation-play-state: paused;
        transition: all 0.3s ease;
    }*/
</style>


<style>
        .services-section.py-5 {
            background-image: url('https://img.freepik.com/free-vector/leaves-background-with-metallic-foil_79603-956.jpg');
            background-size: cover;       /* Scales the image to cover the entire screen */
            background-position: center;  /* Centers the image */
            background-attachment: fixed; /* Keeps the image fixed while scrolling */
            backdrop-filter: blur(1px);
            color:black;
        }
        .testimonials-section.py-6{
            background-image: url('https://img.freepik.com/free-vector/leaves-background-with-metallic-foil_79603-956.jpg');
            background-size: cover;       /* Scales the image to cover the entire screen */
            background-position: center;  /* Centers the image */
            background-attachment: fixed; /* Keeps the image fixed while scrolling */
            backdrop-filter: blur(1px);
        }
    </style>
<!-- Featured Services Section -->
<section class="services-section py-5 " >
    <div class="container">
        
        <div class="section-header text-center mb-5" >
            </span>
            <h2 class="display-5 fw-bold mb-3">Services Overview</h2>
            <p class="lead text-muted">Discover our range of therapeutic treatments designed for your wellbeing</p>
        </div>

        <!-- Service Categories Pills -->
        <div class="service-categories mb-5">
            <div class="row g-3 justify-content-center">
                <?php
                $categories = [
                    [
                        'type' => 'massage',
                        'icon' => 'bi-card-image',
                        'name' => 'Massage Therapy',
                        
                    ],
                    [
                        'type' => 'facial',
                        'icon' => 'bi-card-image',
                        'name' => 'Facial Care',
                        
                    ],
                    [
                        'type' => 'body',
                        'icon' => 'bi-card-image',
                        'name' => 'Body Treatments',
                        
                    ],
                    [
                        'type' => 'aromatherapy',
                        'icon' => 'bi-card-image',
                        'name' => 'Aromatherapy',
                        
                    ]
                ];
                
                foreach ($categories as $category):
                ?>
                <div class="col-lg-3 col-md-6" >
                    <div class="category-card text-center p-4 h-100 bg-white rounded-4 shadow-sm hover-lift">
                        <div class="category-icon-wrapper mb-3">
                            <div class="category-icon bg-<?php echo $category['color']; ?>-subtle text-<?php echo $category['color']; ?> rounded-circle">
                                <i class="bi <?php echo $category['icon']; ?>"></i>
                            </div>
                        </div>
                        <h4 class="category-title h5 mb-3"><?php echo $category['name']; ?></h4>
                        <div class="category-stats d-flex justify-content-around">
                            <div class="stat-item">
                                <small class="text-dark-emphasis d-block">From</small>
                                <span class="fw-bold text-<?php echo $category['color']; ?>">₱1,500</span>
                            </div>
                            <div class="stat-item">
                                <small class="text-dark-emphasis d-block">Duration</small>
                                <span class="fw-bold text-<?php echo $category['color']; ?>">60min</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Featured Services Cards -->
        <div class="featured-services">
            <div class="row g-4">
                <?php if (!empty($all_services)): ?>
                    <?php foreach (array_slice($all_services, 0, 3) as $service): ?>
                    <div class="col-lg-4 col-md-6" >
                        <div class="service-card bg-white rounded-4 p-4 position-relative hover-lift d-flex flex-column h-100">
                            <?php if ($service['is_popular']): ?>
                            <div class="popular-badge position-absolute">
                                
                                    
                                </span>
                            </div>
                            <?php endif; ?>
                            
                            <div class="service-icon-wrapper mb-4">
                                <?php
                                $iconClass = match($service['service_type']) {
                                    'massage' =>  'bi-card-image',
                                    'facial' => 'bi-card-image',
                                    'body' => 'bi-card-image',
                                    default => 'bi-card-image'
                                };
                                ?>
                                <div class="service-icon bg-light rounded-circle">
                                    <i class="bi <?php echo $iconClass; ?>"></i>
                                </div>
                            </div>
                            
                            <div class="service-content flex-grow-1">
                                <h3 class="service-title h5 mb-3">
                                    <?php echo htmlspecialchars($service['service_name']); ?>
                                </h3>
                                
                                <div class="service-meta mb-3">
                                    <span class="badge bg-light text-dark me-2">
                                        <i class="bi bi-clock me-1"></i><?php echo $service['duration']; ?> mins
                                    </span>
                                    <span class="badge bg-light text-dark">
                                        <i class="bi bi-tag me-1"></i>₱<?php echo number_format($service['price'], 2); ?>
                                    </span>
                                </div>
                                
                                <p class="service-description text-dark-emphasis mb-4">
                                    <?php echo htmlspecialchars($service['description']); ?>
                                </p>
                            </div>
                            
                            <div class="service-action mt-auto pt-3" >
                                <a href="<?php echo BASE_URL; ?>/public/booking?service=<?php echo $service['service_id']; ?>" 
                                   class="btn btn-primary w-100 "style="background-color: #25bdbdcc; color: white; border-radius: 5px;">
                                   
                                    </i>Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <div class="empty-state p-5">
                            <i class="bi bi-calendar-x display-1 text-muted mb-3"></i>
                            <p class="lead text-muted">No services available at the moment.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- View All Services Button -->
        <div class="text-center mt-5" >
            <a href="<?php echo BASE_URL; ?>/public/services" 
               class="btn btn-lg px-5 hover-lift"style="background-color: #25bdbdcc; color: white; border-radius: 5px;">
               
                View All Services
            </a>
        </div>
    </div>
</section>

<style>
/* Enhanced Styles */
.services-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.category-card {
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.05);
}

.category-icon {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    font-size: 2rem;
}

.service-card {
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.05);
}

.service-icon {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.popular-badge {
    top: 1rem;
    right: 1rem;
}

.hover-lift {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.empty-state {
    background: rgba(0,0,0,0.02);
    border-radius: 1rem;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .category-card {
        margin-bottom: 1rem;
    }
    
    .service-card {
        margin-bottom: 1.5rem;
    }
}
</style>

<!-- Testimonials Section -->
<section class="testimonials-section py-6 bg-light position-relative">
    <div class="section-overlay"></div>
    <div class="container position-relative">
            <div class="section-badge mb-3"style="background-color: #25bdbdcc; color: white; border-radius: 5px;" >
                <span>TESTIMONIALS</span>
            </div>
            <h2 class="display-5 fw-bold text-dark mb-2" >Client Stories</h2>
            <p class="lead text-dark-emphasis mb-5"  data-aos-delay="100">
                Real experiences from our valued clients
            </p>
        </div>

        <style>
            .testimonials-section {
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                padding: 7rem 0;
                position: relative;
                overflow: hidden;
            }
           
            .section-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.02);
            }

            .section-badge {
                display: inline-block;
                padding: 0.5rem 1.5rem;
                background: rgba(var(--bs-primary-rgb), 0.1);
                color: var(--bs-primary);
                border-radius: 50px;
                font-weight: 600;
                font-size: 0.9rem;
                letter-spacing: 1px;
            }

            .text-dark-emphasis {
                color: #495057;
            }

            /* Increase spacing between header and testimonials */
            .testimonials-section .text-center.mb-5 {
                margin-bottom: 4rem !important;
            }

            /* Update existing testimonial card styles */
            .testimonial-card {
                background: rgba(255, 255, 255, 0.9);
                border-radius: 20px;
                padding: 3rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            }
        </style>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div id="testimonialCarousel" class="carousel slide testimonial-carousel" data-bs-ride="carousel" data-bs-interval="5000">
                    <div class="testimonial-wrapper position-relative">
                        <button class="carousel-control carousel-control-prev" type="button" 
                                data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        <div class="carousel-inner">
                            <!-- Testimonial 1 -->
                            <div class="carousel-item active">
                                <div class="testimonial-wrapper">
                                    <div class="testimonial-card">
                                        <div class="quote-icon">
                                            <i class="bi bi-quote text-primary opacity-25 display-1"></i>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <div class="testimonial-author text-center">
                                                    <div class="author-image-wrapper mb-3">
                                                        <div class="author-image">
                                                            <i class="bi bi-person-circle"></i>
                                                        </div>
                                                       
                                                    </div>
                                                    <h5 class="mb-1">Austin John</h5>
                                                    
                                                    <div class="rating-stars">
                                                        <div class="stars-outer">
                                                            <div class="stars-inner" style="width: 100%"></div>
                                                        </div>
                                                        <span class="rating-number">4.5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="testimonial-content">
                                                    <p class="testimonial-text">"Amazing experience! I felt so relaxed and refreshed afterward. Highly recommended!"</p>
                                                    <div class="testimonial-meta">
                                                        <span class="service-type">
                                                           
                                                        </span>
                                                        <span class="verified-badge">
                                                            <i class="bi bi-shield-check text-success me-2"></i>
                                                            Verified Client
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimonial 2 -->
                            <div class="carousel-item">
                                <div class="testimonial-wrapper">
                                    <div class="testimonial-card">
                                        <div class="quote-icon">
                                            <i class="bi bi-quote text-primary opacity-25 display-1"></i>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <div class="testimonial-author text-center">
                                                    <div class="author-image-wrapper mb-3">
                                                        <div class="author-image">
                                                            <i class="bi bi-person-circle"></i>
                                                        </div>
                                                        
                                                    </div>
                                                    <h5 class="mb-1">Lewis Ranger</h5>
                                                    <p class="text-muted mb-2">VIP Member</p>
                                                    <div class="rating-stars">
                                                        <div class="stars-outer">
                                                            <div class="stars-inner" style="width: 95%"></div>
                                                        </div>
                                                        <span class="rating-number">4.0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="testimonial-content">
                                                    <p class="testimonial-text">"Best massage ever! I’ll definitely be coming back."</p>
                                                    <div class="testimonial-meta">
                                                        
                                                        <span class="verified-badge">
                                                            <i class="bi bi-shield-check text-success me-2"></i>
                                                            Verified Client
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Testimonial 3 -->
                            <div class="carousel-item">
                                <div class="testimonial-wrapper">
                                    <div class="testimonial-card">
                                        <div class="quote-icon">
                                            <i class="bi bi-quote text-primary opacity-25 display-1"></i>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <div class="testimonial-author text-center">
                                                    <div class="author-image-wrapper mb-3">
                                                        <div class="author-image">
                                                            <i class="bi bi-person-circle"></i>
                                                        </div>
                                                       
                                                    </div>
                                                    <h5 class="mb-1">Nani Niwala</h5>
                                                    
                                                    <div class="rating-stars">
                                                        <div class="stars-outer">
                                                            <div class="stars-inner" style="width: 90%"></div>
                                                        </div>
                                                        <span class="rating-number">4.5</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="testimonial-content">
                                                    <p class="testimonial-text">"Perfect pressure and very relaxing environment."</p>
                                                    <div class="testimonial-meta">
                                                       
                                                        <span class="verified-badge">
                                                            <i class="bi bi-shield-check text-success me-2"></i>
                                                            Verified Client
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control carousel-control-next" type="button" 
                                data-bs-target="#testimonialCarousel" data-bs-slide="next">
                            <i class="bi bi-arrow-right"></i>
                        </button>
                        <div class="carousel-indicators testimonial-indicators" >
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" 
                                    class="active bg-primary" aria-current="true"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" 
                                    class="bg-primary" ></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2" 
                                    class="bg-primary"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section class="cta-section py-5 text-white text-center position-relative overflow-hidden">
   
    
        <div class="floating-icons">
            <i class="bi bi-heart-pulse icon"></i>
            <i class="bi bi-stars icon"></i>
            <i class="bi bi-flower1 icon"></i>
            <i class="bi bi-droplet icon"></i>
            <i class="bi bi-peace icon"></i>
            <i class="bi bi-brightness-high icon"></i>
            <i class="bi bi-heart icon"></i>
            <i class="bi bi-flower2 icon"></i>
        </div>
    </div>
    <div class="container position-relative" style="z-index: 2;">
        
        <h2 class="display-5 fw-bold mb-4"  data-aos-duration="1000">
        Start Your Journey Today
        </h2>
        <p class="lead mb-5"  data-aos-delay="100" data-aos-duration="1000">
            Join our us and have a relaxing experience
        </p>
        <div class="cta-buttons"  data-aos-delay="200" data-aos-duration="1000">
            <a href="<?php echo BASE_URL; ?>/public/register" 
               class="btn btn btn-glass btn-lg px-5 me-3">
                </i>Create Account
                <span class="btn-blur"></span>
            </a>
            <a href="<?php echo BASE_URL; ?>/public/booking" 
               class="btn btn-glass btn-lg px-5">
                </i>Book Session
                <span class="btn-shine"></span>
            </a>
        </div>
    </div>
    <style>
        .cta-section {
            position: relative;
            min-height: 60vh;
            display: flex;
            align-items: center;
            background-color: #00d1a4;
        }

        .cta-video-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .cta-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.65;
        }
        .btn-glass{
            background-color:black;
        }
        .cta-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                45deg,
                rgba(0, 0, 0, 0.7),
                rgba(0, 0, 0, 0.5)
            );
        }
    </style>
</section>

<?php include 'templates/footer.php'; ?> 