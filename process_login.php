<?php
session_start(); // Start the session

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
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        // Validate input
        if (empty($username) || empty($password)) {
            throw new Exception("All fields are required.");
        }

        // Prepare and execute the query for both users and admins
        $stmt = $conn->prepare("
            SELECT id, password, 'user' AS role FROM users WHERE username = ?
            UNION
            SELECT id, password, 'admin' AS role FROM admins WHERE username = ?
        ");
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($user_id, $hashed_password, $role);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, start a session
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;

                // Redirect based on role
                if ($role === 'admin') {
                    header("Location: ./admin_dashboard.php");
                } else {
                    header("Location: ./user_dashboard.php");
                }
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