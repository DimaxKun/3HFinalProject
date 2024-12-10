<style>
        .card-body.p-4 {
            background-image: url('https://img.freepik.com/free-vector/leaves-background-with-metallic-foil_79603-956.jpg');
            background-size: cover;       /* Scales the image to cover the entire screen */
            background-position: center;  /* Centers the image */
            background-attachment: fixed; /* Keeps the image fixed while scrolling */
            backdrop-filter: blur(1px);
        }
        .btn-outline-primary {
    --bs-btn-color: #fff;
    --bs-btn-bg: #32CFCF;
    --bs-btn-border-color: #51cbef;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #0e93b1;
    --bs-btn-hover-border-color: rgb(255 255 255);
    --bs-btn-focus-shadow-rgb: 130, 138, 145;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: white;
    --bs-btn-active-border-color: #32cfcf;
}
.btn-primary {
    --bs-btn-color: #fff;
    --bs-btn-bg: #0dd3fd;
    --bs-btn-border-color: #0dc6fd;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #0bced7;
    --bs-btn-hover-border-color: #0dc6fd;
    --bs-btn-focus-shadow-rgb: 49, 132, 253;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #0dcaf0;
    --bs-btn-active-border-color: #0dcaf0;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #fff;
    --bs-btn-disabled-bg: #0d6efd;
    --bs-btn-disabled-border-color: #0d6efd;
}
.text-primary {
    --bs-text-opacity: 1;
    color: rgb(75 75 75) !important;
}
.bg-primary {
    --bs-bg-opacity: 1;
    background-color: rgb(13 253 244) !important;
}
.card-body{
    border: 1px solid black;
}
.sidebar{
    background: linear-gradient(to right, #4682B4,#7FFFD4);
}
    </style>
<div class="container-fluid"> 

    
    <!-- Welcome Section -->
    <div class="row mb-4"  >
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="card-title mb-3">Welcome back, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</h4>
                    <a href="<?php echo BASE_URL; ?>/public/booking" class="btn btn-primary">
                        </i>Book New Appointment
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        
                        <h6 class="card-subtitle text-muted mb-0">Upcoming Appointments</h6>
                    </div>
                    <h3 class="card-title mb-0"><?php echo $upcoming_count; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        
                        <h6 class="card-subtitle text-muted mb-0">Completed Sessions</h6>
                    </div>
                    <h3 class="card-title mb-0"><?php echo $completed_count; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        
                        <h6 class="card-subtitle text-muted mb-0">Reviews Given</h6>
                    </div>
                    <h3 class="card-title mb-0"><?php echo $reviews_count; ?></h3>
                </div>
            </div>
        </div>
    </div>

<!-- Upcoming Appointments -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title mb-0">Upcoming Appointments</h5>
                    <a href="<?php echo BASE_URL; ?>/public/dashboard/appointments" class="btn btn-outline-primary btn-sm">
                        View All
                    </a>
                </div>
                <?php if (!empty($upcoming_appointments)): ?>
                    <?php foreach ($upcoming_appointments as $appointment): ?>
                        <div class="appointment-item mb-3 pb-3 border-bottom">
                            <div class="d-flex align-items-center">
                                
                                <div class="flex-grow-1">
                                    <h6 class="mb-1"><?php echo htmlspecialchars($appointment['service_name']); ?></h6>
                                    <p class="text-muted mb-0">
                                        <i class="bi bi-clock me-2"></i>
                                        <?php echo date('l, F j, Y', strtotime($appointment['appointment_date'])); ?> at 
                                        <?php echo date('g:i A', strtotime($appointment['start_time'])); ?>
                                    </p>
                                    <p class="text-muted mb-0">
                                        <i class="bi bi-person me-2"></i>
                                        Therapist: <?php echo htmlspecialchars($appointment['therapist_name']); ?>
                                    </p>
                                    <span class="badge bg-<?php echo $appointment['status'] === 'confirmed' ? 'success' : 'warning'; ?> mt-2">
                                        <?php echo ucfirst($appointment['status']); ?>
                                    </span>
                                </div>
                                <div>
                                    <a href="<?php echo BASE_URL; ?>/public/dashboard/appointments/<?php echo $appointment['appointment_id']; ?>" 
                                       class="btn btn-outline-primary btn-sm">View Details</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="text-center py-4">
                        <i class="bi bi-calendar-x display-4 text-muted mb-3"></i>
                        <p class="text-muted">No upcoming appointments</p>
                        <a href="<?php echo BASE_URL; ?>/public/booking" class="btn btn-primary" >
                            Book Now
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

    <!-- Promotions & Rewards -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">Current Promotions & Rewards</h5>
                        
                    </div>

                    <?php if (empty($promotions)): ?>
                        <div class="text-center py-4">
                            <i class="bi bi-gift display-4 text-muted mb-3"></i>
                            <p class="text-muted">No active promotions at the moment</p>
                            <small class="text-muted">Check back soon for special offers!</small>
                        </div>
                    <?php else: ?>
                        <div class="row g-4">
                            <?php foreach ($promotions as $promo): ?>
                                <div class="col-md-6">
                                    <div class="promo-card bg-light rounded p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="promo-icon bg-primary bg-opacity-10 text-primary p-3 rounded-circle me-3">
                                                <i class="bi bi-percent"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1"><?php echo htmlspecialchars($promo['discount_percent']); ?>% OFF</h6>
                                                <p class="text-muted small mb-0">
                                                    Valid until <?php echo date('F j, Y', strtotime($promo['end_date'])); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="mb-3"><?php echo htmlspecialchars($promo['description']); ?></p>
                                        <div class="promo-code-box bg-white rounded p-2 text-center">
                                            <small class="text-muted d-block mb-1">Promo Code</small>
                                            <span class="fw-bold text-primary"><?php echo htmlspecialchars($promo['promo_code']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div> 