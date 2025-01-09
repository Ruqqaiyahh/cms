<?php
// Database connection
$servername = "localhost";
$username = "Stosh"; // Replace with your database username
$password = "Lionelneymar10"; // Replace with your database password
$dbname = "complaint_management"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$retypePassword = $_POST['retype_password'];
$role = $_POST['role'] ?? 'user'; // Ensure role is retrieved from POST data

// Check if passwords match
if ($password !== $retypePassword) {
    die('Passwords do not match. Please try again.');
}

// Hash the password for security
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

if ($role === 'admin') {
    $invitationCode = $_POST['invitation_code'] ?? '';
    $validInvitationCode = 'SECRET123'; // This should be stored securely

    // Validate invitation code
    if ($invitationCode !== $validInvitationCode) {
        die('Invalid invitation code. You are not authorized to create an admin account.');
    }

    // Insert into admin table
    $sql = "INSERT INTO admins (name, username, email, password) VALUES (?, ?, ?, ?)";
    $redirectUrl = 'admin_dashboard.php'; // Redirect to Admin Dashboard
} else {
    // Insert into user table
    $sql = "INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)";
    $redirectUrl = 'user_dashboard.php'; // Redirect to User Dashboard
}

// Prepare and bind
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("ssss", $name, $username, $email, $hashedPassword);

// Execute the statement
if ($stmt->execute()) {
    echo "<script>
        alert('Account created successfully!');
        window.location.href = '$redirectUrl'; // Redirect based on role
    </script>";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>