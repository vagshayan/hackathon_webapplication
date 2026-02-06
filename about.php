<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Learnme</title>
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
                        <a class="nav-link" href="overview.php">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="features.php">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">About</a>
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
        <h1 class="text-center mb-5">About Learnme</h1>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="text-highlight-teal mb-3">Website Ownership</h3>
                        <p>Learnme is owned and operated by the Learnme Development Team. Our mission is to provide students and learners worldwide with powerful, intuitive tools that enhance the learning experience and promote academic success.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="text-highlight-orange mb-3">Our Mission</h3>
                        <p>We believe that effective learning requires the right tools and organization. Learnme was created to bridge the gap between traditional learning methods and modern technology, providing a comprehensive platform that supports students throughout their educational journey.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="text-highlight-teal mb-3">What We Offer</h3>
                        <ul>
                            <li><strong>Free Access:</strong> Core features are available to all registered users at no cost</li>
                            <li><strong>Privacy First:</strong> Your data is securely stored and protected</li>
                            <li><strong>Continuous Improvement:</strong> We regularly update and enhance our platform based on user feedback</li>
                            <li><strong>User Support:</strong> We're committed to providing excellent user experience and support</li>
                        </ul>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="text-highlight-orange mb-3">Contact Information</h3>
                        <p>For inquiries, support, or feedback, please reach out to us through the platform or contact our support team.</p>
                        <p><strong>Email:</strong> support@learnme.com</p>
                        <p><strong>Platform:</strong> www.learnme.com</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="text-highlight-teal mb-3">Terms of Service</h3>
                        <p>By using Learnme, you agree to use the platform responsibly and in accordance with our terms of service. We reserve the right to update these terms as needed to ensure the best experience for all users.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="text-highlight-orange mb-3">Privacy Policy</h3>
                        <p>We take your privacy seriously. All personal information is encrypted and stored securely. We do not share your data with third parties without your explicit consent. For more details, please refer to our comprehensive privacy policy.</p>
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

