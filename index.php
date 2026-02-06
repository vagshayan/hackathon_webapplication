<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Learnme</title>

    <!-- Learnme App Logo as Tab Icon -->
    <link rel="icon" type="image/png" href="assets/images/learnme-logo.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
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
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="overview.php">Overview</a>
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

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1>Welcome to Learnme</h1>
            <p>Your Personal Self-Learning Platform</p>
            <p class="lead">
                Empower yourself with tools for effective learning, note-taking,
                time management, and productivity.
            </p>

            <?php if (!isLoggedIn()): ?>
                <a href="register.php" class="btn btn-light btn-lg me-2">Get Started</a>
                <a href="login.php" class="btn btn-outline-light btn-lg">Login</a>
            <?php else: ?>
                <a href="dashboard.php" class="btn btn-light btn-lg">Go to Dashboard</a>
            <?php endif; ?>
        </div>
    </section>

    <!-- Website Details -->
    <section class="container mt-5 mb-5">
        <div class="row">

            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="text-highlight-teal mb-3">What is Learnme?</h3>
                        <p>
                            Learnme is a comprehensive self-learning platform designed
                            to help students manage their educational journey effectively.
                            It combines note-taking, task management, time tracking,
                            and AI-powered summarization.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="text-highlight-orange mb-3">Key Benefits</h3>
                        <ul>
                            <li>Organize notes with Jotpad and file uploads</li>
                            <li>Track assignments, exams, and tasks</li>
                            <li>Improve focus using Pomodoro timer</li>
                            <li>AI-powered content summarization</li>
                            <li>Efficient todo list management</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Floating Chatbot Button -->
    <button class="floating-chatbot-btn" data-bs-toggle="modal"
            data-bs-target="#chatbotModal" title="Chat with us">
        <i class="fas fa-comments"></i>
    </button>

    <!-- Chatbot Modal -->
    <div class="modal fade chatbot-modal" id="chatbotModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Ask me about Learnme</h5>
                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="chatbot-container">

                        <div class="chatbot-messages" id="chatbotMessages">
                            <div class="chat-message bot">
                                <strong>Bot:</strong>
                                Hello! Ask me anything about Learnme 🚀
                            </div>
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control"
                                   id="chatInput"
                                   placeholder="Type your question here...">
                            <button class="btn btn-primary"
                                    id="sendChatBtn">Send</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content text-center">
                <p>&copy; 2024 Learnme. All rights reserved.</p>

                <div class="social-media-icons">
                    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chatbot JS -->
    <script src="assets/js/chatbot.js"></script>

</body>
</html>
