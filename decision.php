<?php
// Show PHP errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['decision'])) {
        $decision = $_POST['decision'];

        // Absolute path for safe file writing
        $file = '/var/www/html/practice/decision.txt';

        // Attempt to write to the file
        if (file_put_contents($file, $decision)) {
            echo "Decision recorded: " . htmlspecialchars($decision);
        } else {
            http_response_code(500);
            echo "Error: Failed to write to decision file.";
        }
    } else {
        http_response_code(400);
        echo "Error: No decision received.";
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo "Error: Invalid request method.";
}
?>
