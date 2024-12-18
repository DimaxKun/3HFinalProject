<style>
        .row {
            background-image: url('https://img.freepik.com/free-vector/leaves-background-with-metallic-foil_79603-956.jpg');
            background-size: cover;       /* Scales the image to cover the entire screen */
            background-position: center;  /* Centers the image */
            background-attachment: fixed; /* Keeps the image fixed while scrolling */
            backdrop-filter: blur(1px);
            
        }
        #currentWeek{
            color:black;
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

        #sidebar {
    width: var(--sidebar-width);
    background: linear-gradient(to right,#7FFFD4,#4682B4);
    transition: all 0.3s;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    z-index: 1000;
    border-right: 1px solid rgba(0,0,0,.05);
}
#sidebar .sidebar-header {
    border-bottom: 1px solid black;
    background-color: #00ffd0;
}
.btn-outline-secondary {
    --bs-btn-color: #2e8583;
    --bs-btn-border-color: #25c9c9;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #21c6d7;
    --bs-btn-hover-border-color: #21c6d7;
    --bs-btn-focus-shadow-rgb: 108, 117, 125;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #6c757d;
    --bs-btn-active-border-color: #6c757d;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #6c757d;
    --bs-btn-disabled-bg: transparent;
    --bs-btn-disabled-border-color: #6c757d;
    --bs-gradient: none;
}

        </style>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Therapist Schedule Management</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAvailabilityModal">
            <i class="bi bi-plus-circle me-2"></i>Add Availability
        </button>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <select id="therapistFilter" class="form-select border-0 bg-light">
                                <option value="">Select Therapist</option>
                                <?php foreach ($therapists as $therapist): ?>
                                    <option value="<?php echo $therapist['user_id']; ?>">
                                        <?php echo htmlspecialchars($therapist['full_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary" id="prevWeek">
                                    <i class="bi bi-chevron-left"></i>
                                </button>
                                <button type="button" class="btn btn-outline-secondary" id="currentWeek" >
                                    This Week
                                </button>
                                <button type="button" class="btn btn-outline-secondary" id="nextWeek">
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Weekly Calendar View -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">Time</th>
                                    <?php 
                                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                    foreach ($days as $day): 
                                        $date = new DateTime();  // Will be updated by JavaScript
                                    ?>
                                    <th class="text-center"><?php echo $day; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $timeSlots = [
                                    '09:00', '10:00', '11:00', '12:00', '13:00', 
                                    '14:00', '15:00', '16:00', '17:00', '18:00'
                                ];
                                foreach ($timeSlots as $time): 
                                ?>
                                <tr>
                                    <td class="align-middle"><?php echo $time; ?></td>
                                    <?php foreach ($days as $day): ?>
                                    <td class="text-center position-relative" style="height: 60px;">
                                        <div class="availability-slot" 
                                             data-day="<?php echo $day; ?>" 
                                             data-time="<?php echo $time; ?>">
                                        </div>
                                    </td>
                                    <?php endforeach; ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Availability Modal -->
<div class="modal fade" id="addAvailabilityModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Therapist Availability</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="availabilityForm">
                    <div class="mb-3">
                        <label class="form-label">Therapist</label>
                        <select class="form-select" name="therapist_id" required>
                            <option value="">Select Therapist</option>
                            <?php foreach ($therapists as $therapist): ?>
                                <option value="<?php echo $therapist['user_id']; ?>">
                                    <?php echo htmlspecialchars($therapist['full_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Day of Week</label>
                        <select class="form-select" name="day_of_week" required>
                            <?php foreach ($days as $day): ?>
                                <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Start Time</label>
                            <select class="form-select" name="start_time" required>
                                <?php foreach ($timeSlots as $time): ?>
                                    <option value="<?php echo $time; ?>"><?php echo $time; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">End Time</label>
                            <select class="form-select" name="end_time" required>
                                <?php foreach ($timeSlots as $time): ?>
                                    <option value="<?php echo $time; ?>"><?php echo $time; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" name="repeat_weekly" id="repeatWeekly">
                        <label class="form-check-label" for="repeatWeekly">Repeat Weekly</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveAvailability()">Save Availability</button>
            </div>
        </div>
    </div>
</div>

<style>
.availability-slot {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    cursor: pointer;
    transition: background-color 0.2s;
}

.availability-slot:hover {
    background-color: rgba(0, 123, 255, 0.1);
}

.availability-slot.available {
    background-color: rgba(40, 167, 69, 0.2);
}

.availability-slot.booked {
    background-color: rgba(220, 53, 69, 0.2);
}
</style>

<!-- Add your custom scripts -->
<script src="<?php echo BASE_URL; ?>/assets/js/admin/therapist-schedule.js"></script>
