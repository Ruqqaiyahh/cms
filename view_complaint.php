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

// Fetch complaint details
$sql = "SELECT id, title, description, category, status FROM complaints WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $complaintId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $complaint = $result->fetch_assoc();
} else {
    die("Complaint not found.");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Complaint</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
	<div class="container mt-5">
		<h1 class="text-center mb-4">Complaint Details</h1>
		<div class="card p-4 shadow-sm">
			<h2><?php echo htmlspecialchars($complaint['title']); ?></h2>
			<p><strong>Description:</strong> <?php echo htmlspecialchars($complaint['description']); ?></p>
			<p><strong>Category:</strong> <?php echo htmlspecialchars($complaint['category']); ?></p>
			<p><strong>Status:</strong> <?php echo htmlspecialchars($complaint['status']); ?></p>
			<a href="admin_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
		</div>
	</div>
</body>

</html>