<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview - Learnme</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><circle cx='50' cy='50' r='45' fill='%2320b2aa'/><text x='50' y='70' font-size='60' text-anchor='middle' fill='white'>L</text></svg>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Learnme</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="overview.php">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="features.php">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <h1 class="text-center mb-5">Platform Overview</h1>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="text-highlight-teal mb-3">What is Learnme?</h3>
                        <p>Learnme is a comprehensive self-learning platform designed to empower students and lifelong learners with powerful tools for effective learning, organization, and productivity. Our platform combines intuitive note-taking capabilities, intelligent calendar management, time-tracking tools, and AI-powered features to create a complete learning ecosystem.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="text-highlight-orange mb-3">Core Functionality</h3>
                        <ul>
                            <li><strong>Personal Dashboard:</strong> Manage your profile, view your information, and access all features from one central location.</li>
                            <li><strong>Smart Calendar:</strong> Organize tasks, assignments, exams, and reminders with our intuitive calendar system.</li>
                            <li><strong>Note Management:</strong> Create, upload, view, and download notes in multiple formats.</li>
                            <li><strong>Productivity Tools:</strong> Pomodoro timer, todo lists, and AI summarization to enhance your learning efficiency.</li>
                            <li><strong>Interactive Learning:</strong> Jotpad for hand-drawn and typed notes, making learning more engaging.</li>
                        </ul>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="text-highlight-teal mb-3">Getting Started</h3>
                        <ol>
                            <li>Register for a free account using your email address</li>
                            <li>Complete your profile with your personal information</li>
                            <li>Explore the dashboard and calendar features</li>
                            <li>Start using the various learning tools available</li>
                            <li>Organize your study schedule and track your progress</li>
                        </ol>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="text-highlight-orange mb-3">Key Benefits</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li>All-in-one learning platform</li>
                                    <li>Easy note organization</li>
                                    <li>Time management tools</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>AI-powered summarization</li>
                                    <li>Mobile-responsive design</li>
                                    <li>Secure data storage</li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
</body>
</html>

