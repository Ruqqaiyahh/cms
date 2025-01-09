<?php
session_start(); // Start the session to access user information

// Include the database connection
$servername = "localhost";
$dbUsername = "Stosh"; // Replace with your database username
$dbPassword = "Lionelneymar10"; // Replace with your database password
$dbname = "complaint_management"; // Replace with your database name

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize form data
        $userId = $_SESSION['user_id']; // Assuming user_id is stored in session
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $category = trim($_POST['category']);

        // Validate input
        if (empty($title) || empty($description) || empty($category)) {
            throw new Exception("All fields are required.");
        }

        // Insert complaint into the database
        $stmt = $conn->prepare("INSERT INTO complaints (user_id, title, description, category, status) VALUES (?, ?, ?, ?, 'Pending')");
        $stmt->bind_param("isss", $userId, $title, $description, $category);

        if ($stmt->execute()) {
            echo "<script>
                alert('Complaint submitted successfully!');
                window.location.href = 'user_dashboard.php'; // Redirect to User Dashboard
            </script>";
        } else {
            throw new Exception("Error submitting complaint: " . $stmt->error);
        }

        $stmt->close();
    }
} catch (Exception $e) {
    // Log the error message
    error_log($e->getMessage());

    // Display a user-friendly error message
    echo "<div class='alert alert-danger'>An error occurred while submitting your complaint. Please try again later.</div>";
} finally {
    // Close the connection if it was initialized
    if (isset($conn) && $conn instanceof mysqli) {
        $conn->close();
    }
}
?>