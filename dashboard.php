<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

include '../includes/header.php'; // Include the header
?>

<div class="dashboard-container">
	<h1>User Dashboard</h1>
	<p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
	<p>This is your user dashboard where you can manage your account and view your information.</p>
	<!-- Add more user-specific content here -->
</div>

<?php
include '../includes/footer.php'; // Include the footer
?>