<?php
// Database configuration for Vercel deployment
$db_host = $_ENV['DB_HOST'] ?? 'localhost';
$db_user = $_ENV['DB_USER'] ?? 'root';
$db_pass = $_ENV['DB_PASS'] ?? '';
$db_name = $_ENV['DB_NAME'] ?? 'trac_portal';

// For development, use local MySQL
// For production, use environment variables set in Vercel
try {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    
    if ($conn->connect_error) {
        // Log error but don't expose in production
        error_log("Database connection failed: " . $conn->connect_error);
        $conn = null; // Set to null for fallback to sample data
    }
} catch (Exception $e) {
    error_log("Database error: " . $e->getMessage());
    $conn = null; // Fallback to sample data
}
?>
