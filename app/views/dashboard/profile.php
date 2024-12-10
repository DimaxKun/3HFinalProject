<?php
// Display error message if exists
if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php 
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<!-- Display success message if exists -->
<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php 
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>
<style>
        .card-body {
            background-image: url('https://img.freepik.com/free-vector/leaves-background-with-metallic-foil_79603-956.jpg');
            background-size: cover;       /* Scales the image to cover the entire screen */
            background-position: center;  /* Centers the image */
            background-attachment: fixed; /* Keeps the image fixed while scrolling */
            backdrop-filter: blur(1px);
        }
        .btn-primary:hover {
        background-color: #0dc6fd;
        border-color: #0dc6fd;
    }
.btn-primary {
    --bs-btn-color: #fff;
    --bs-btn-bg: #0dc6fd;
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
    
    </style>
<div class="container-fluid">
    <div class="row">
        <!-- Left Column: Personal Information & Password -->
        <div class="col-lg-8">
            <!-- Personal Information Card -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">Personal Information</h5>
                        
                    </div>
                    
                    <form id="profile-form" action="<?php echo BASE_URL; ?>/public/dashboard/profile/update" method="POST" class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" 
                                       value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
                                <div class="invalid-feedback">Please enter your full name</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                <div class="invalid-feedback">Please enter a valid email address</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number" 
                                       value="<?php echo htmlspecialchars($user['phone_number']); ?>" 
                                       pattern="[0-9]{11}" required>
                                <div class="invalid-feedback">Please enter a valid 11-digit phone number</div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                </i>Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Password Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">Change Password</h5>
                        
                    </div>
                    
                    <form id="password-form" action="<?php echo BASE_URL; ?>/public/dashboard/profile/password" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Current Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                
                                <label class="form-label">Confirm New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <div id="confirm-password-feedback" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary" disabled >
                                </i>Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

            
        </div>
    </div>
</div>

<style>
.avatar-placeholder {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    font-weight: bold;
}
.sidebar{
    background: linear-gradient(to right, #4682B4,#7FFFD4);
}
.card-body{
    border: 1px solid black;
}
.security-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.display-6 {
    font-size: 2rem;
    font-weight: 600;
}
</style>

<!-- Include profile.js -->
<script src="<?php echo BASE_URL; ?>/public/assets/js/profile.js"></script>