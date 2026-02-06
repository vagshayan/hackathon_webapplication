<?php
require_once 'config.php';
requireLogin();

$conn = getDBConnection();
$user_id = getUserId();

// Get user details
$stmt = $conn->prepare("SELECT name, email, phone, institute, about FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Handle profile update
$update_success = '';
$update_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $name = trim($_POST['name'] ?? '');
    $about = trim($_POST['about'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $institute = trim($_POST['institute'] ?? '');
    
    $stmt = $conn->prepare("UPDATE users SET name = ?, about = ?, phone = ?, institute = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $name, $about, $phone, $institute, $user_id);
    
    if ($stmt->execute()) {
        $update_success = 'Profile updated successfully!';
        $user['name'] = $name;
        $user['about'] = $about;
        $user['phone'] = $phone;
        $user['institute'] = $institute;
    } else {
        $update_error = 'Failed to update profile.';
    }
    $stmt->close();
}

// Get calendar events
$events = [];
$stmt = $conn->prepare("SELECT id, title, description, event_type, event_date, event_time FROM calendar_events WHERE user_id = ? ORDER BY event_date, event_time");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $events[] = $row;
}
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Learnme</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><circle cx='50' cy='50' r='45' fill='%2320b2aa'/><text x='50' y='70' font-size='60' text-anchor='middle' fill='white'>L</text></svg>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/logo.svg" alt="Learnme Logo" class="navbar-brand-logo">
                <span>Learnme</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="overview.php">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="features.php">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger btn-md" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <h2 class="mb-4">Dashboard</h2>

        <!-- User Profile Section -->
        <div class="dashboard-section">
            <h3 class="text-highlight-teal mb-4">Your Profile</h3>
            
            <?php if ($update_success): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($update_success); ?></div>
            <?php endif; ?>
            
            <?php if ($update_error): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($update_error); ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($user['name'] ?? ''); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="phone" value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Institute</label>
                        <input type="text" class="form-control" name="institute" value="<?php echo htmlspecialchars($user['institute'] ?? ''); ?>">
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">About</label>
                        <textarea class="form-control" name="about" rows="3"><?php echo htmlspecialchars($user['about'] ?? ''); ?></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Calendar Section -->
        <div class="dashboard-section">
            <h3 class="text-highlight-orange mb-4">Calendar</h3>
            <div class="calendar-container">
                <div class="calendar-header">
                    <button class="btn btn-outline-primary" id="prevMonth">← Previous</button>
                    <h4 id="currentMonth"></h4>
                    <button class="btn btn-outline-primary" id="nextMonth">Next →</button>
                </div>
                <div class="calendar-grid" id="calendarGrid"></div>
            </div>
            
            <!-- Add Event Modal -->
            <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addEventModal">Add Event</button>
        </div>

        <!-- Events List -->
        <div class="dashboard-section">
            <h3 class="text-highlight-teal mb-4">Upcoming Events</h3>
            <div id="eventsList">
                <?php if (empty($events)): ?>
                    <p>No events scheduled.</p>
                <?php else: ?>
                    <?php foreach ($events as $event): ?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5><?php echo htmlspecialchars($event['title']); ?></h5>
                                <p class="mb-1"><strong>Type:</strong> <?php echo ucfirst($event['event_type']); ?></p>
                                <p class="mb-1"><strong>Date:</strong> <?php echo date('F j, Y', strtotime($event['event_date'])); ?></p>
                                <?php if ($event['event_time']): ?>
                                    <p class="mb-1"><strong>Time:</strong> <?php echo date('g:i A', strtotime($event['event_time'])); ?></p>
                                <?php endif; ?>
                                <?php if ($event['description']): ?>
                                    <p class="mb-0"><?php echo htmlspecialchars($event['description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Add Event Modal -->
    <div class="modal fade" id="addEventModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select class="form-select" name="event_type" required>
                                <option value="task">Task</option>
                                <option value="assignment">Assignment</option>
                                <option value="exam">Exam</option>
                                <option value="reminder">Reminder</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="event_date" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Time (Optional)</label>
                            <input type="time" class="form-control" name="event_time">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveEventBtn">Save Event</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <p>&copy; 2024 Learnme. All rights reserved.</p>
                <div class="social-media-icons">
                    <a href="https://facebook.com" target="_blank" class="facebook" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="twitter" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="instagram" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="linkedin" title="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://youtube.com" target="_blank" class="youtube" title="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/calendar.js"></script>
    <script>
        // Save event
        document.getElementById('saveEventBtn').addEventListener('click', function() {
            const form = document.getElementById('eventForm');
            const formData = new FormData(form);
            formData.append('action', 'add_event');
            
            fetch('api/calendar.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            });
        });
    </script>
</body>
</html>

