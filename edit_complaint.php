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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    $updateSql = "UPDATE complaints SET title = ?, description = ?, category = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("sssi", $title, $description, $category, $complaintId);

    if ($updateStmt->execute()) {
        echo "<div class='alert alert-success'>Complaint updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating complaint: " . $updateStmt->error . "</div>";
    }

    $updateStmt->close();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Complaint</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
	<div class="container mt-5">
		<h1 class="text-center mb-4">Edit Complaint</h1>
		<div class="card p-4 shadow-sm">
			<form method="post">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" id="title" name="title" class="form-control"
						value="<?php echo htmlspecialchars($complaint['title']); ?>" required>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea id="description" name="description" class="form-control" rows="5"
						required><?php echo htmlspecialchars($complaint['description']); ?></textarea>
				</div>
				<div class="form-group">
					<label for="category">Category</label>
					<input type="text" id="category" name="category" class="form-control"
						value="<?php echo htmlspecialchars($complaint['category']); ?>" required>
				</div>
				<button type="submit" class="btn btn-primary">Update Complaint</button>
				<a href="admin_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
			</form>
		</div>
	</div>
</body>

</html>