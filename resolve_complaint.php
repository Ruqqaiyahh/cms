<?php
include './header.php'; // Include the header with the CSS link

// Database connection
$servername = "localhost";
$dbUsername = "Stosh"; // Replace with your database username
$dbPassword = "Lionelneymar10"; // Replace with your database password
$dbname = "complaint_management"; // Replace with your database name

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$complaintId = $_GET['id'];

// Update complaint status to resolved
$sql = "UPDATE complaints SET status = 'Resolved' WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $complaintId);

if ($stmt->execute()) {
    echo "<div class='alert alert-success'>Complaint marked as resolved.</div>";
} else {
    echo "<div class='alert alert-danger'>Error resolving complaint: " . $stmt->error . "</div>";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resolve Complaint</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
	<div class="container mt-5">
		<h1 class="text-center mb-4">Resolve Complaint</h1>
		<div class="card p-4 shadow-sm">
			<p>Complaint has been marked as resolved.</p>
			<a href="admin_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
		</div>
	</div>
</body>

</html>