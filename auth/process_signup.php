<?php
include '../includes/db.php'; // Include the database connection

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize form data
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Validate input
        if (empty($username) || empty($email) || empty($password)) {
            throw new Exception("All fields are required.");
        }

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }

        // Check if email already exists
        $email_check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        if (!$email_check_stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }
        $email_check_stmt->bind_param("s", $email);
        $email_check_stmt->execute();
        $email_check_stmt->store_result();

        if ($email_check_stmt->num_rows > 0) {
            throw new Exception("Email already registered.");
        }
        $email_check_stmt->close();

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        // Execute the statement
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }

        // Success message and redirection
        echo "Signup successful!";
        header("Location: ../../../user/dashboard.php");
        exit();
    }
} catch (Exception $e) {
    // Log the error message
    error_log($e->getMessage());

    // Display a user-friendly error message
    echo "An error occurred during signup. Please try again later.";
} finally {
    // Close the statement and connection if they were initialized
    if (isset($stmt) && $stmt instanceof mysqli_stmt) {
        $stmt->close();
    }
    if (isset($conn) && $conn instanceof mysqli) {
        $conn->close();
    }
}
?>