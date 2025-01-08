<?php
session_start(); // Start the session

include '../includes/db.php'; // Include the database connection

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize form data
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        // Validate input
        if (empty($username) || empty($password)) {
            throw new Exception("All fields are required.");
        }

        // Prepare and execute the query
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($user_id, $hashed_password);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, start a session
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;

                // Redirect to a protected page
                header("Location: ../../../user/dashboard.php");
                exit();
            } else {
                throw new Exception("Invalid username or password.");
            }
        } else {
            throw new Exception("Invalid username or password.");
        }

        $stmt->close();
    }
} catch (Exception $e) {
    // Log the error message
    error_log($e->getMessage());

    // Display a user-friendly error message
    echo "An error occurred during login. Please try again later.";
} finally {
    // Close the connection if it was initialized
    if (isset($conn) && $conn instanceof mysqli) {
        $conn->close();
    }
}
?>