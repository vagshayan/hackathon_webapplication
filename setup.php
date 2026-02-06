<?php
/**
 * Setup script for Learnme
 * Run this file once to create necessary directories
 */

echo "Learnme Setup Script\n";
echo "====================\n\n";

// Create uploads directory
$uploads_dir = __DIR__ . '/uploads/notes';
if (!file_exists($uploads_dir)) {
    if (mkdir($uploads_dir, 0777, true)) {
        echo "✓ Created uploads/notes directory\n";
    } else {
        echo "✗ Failed to create uploads/notes directory\n";
    }
} else {
    echo "✓ uploads/notes directory already exists\n";
}

// Check database connection
require_once 'config.php';
try {
    $conn = getDBConnection();
    echo "✓ Database connection successful\n";
    $conn->close();
} catch (Exception $e) {
    echo "✗ Database connection failed: " . $e->getMessage() . "\n";
    echo "  Please check your database configuration in config.php\n";
}

echo "\nSetup complete!\n";
echo "Next steps:\n";
echo "1. Import database.sql to create the database and tables\n";
echo "2. Configure database credentials in config.php if needed\n";
echo "3. Access the application in your browser\n";
?>

