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

// Handle status update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $complaintId = $_POST['complaint_id'];
    $newStatus = $_POST['status'];

    $stmt = $conn->prepare("UPDATE complaints SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $newStatus, $complaintId);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Complaint status updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating status: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

// Fetch complaints from the database
$sql = "SELECT id, title, description, category, status FROM complaints";
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<!-- Include Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
	<div class="container mt-5">
		<h1 class="text-center mb-4">Admin Dashboard</h1>
		<p class="text-center">Welcome to the admin dashboard. Here you can review and manage complaints.</p>
		<div class="card p-4 shadow-sm">
			<h2 class="mb-4">Complaints List</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Description</th>
						<th>Category</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($result->num_rows > 0): ?>
					<?php while ($complaint = $result->fetch_assoc()): ?>
					<tr>
						<td><?php echo htmlspecialchars($complaint['id']); ?></td>
						<td><?php echo htmlspecialchars($complaint['title']); ?></td>
						<td><?php echo htmlspecialchars($complaint['description']); ?></td>
						<td><?php echo htmlspecialchars($complaint['category']); ?></td>
						<td>
							<form method="post" class="d-inline">
								<input type="hidden" name="complaint_id" value="<?php echo $complaint['id']; ?>">
								<select name="status" class="form-control form-control-sm d-inline w-auto">
									<option value="Pending"
										<?php if ($complaint['status'] == 'Pending') echo 'selected'; ?>>Pending
									</option>
									<option value="In Progress"
										<?php if ($complaint['status'] == 'In Progress') echo 'selected'; ?>>In Progress
									</option>
									<option value="Resolved"
										<?php if ($complaint['status'] == 'Resolved') echo 'selected'; ?>>Resolved
									</option>
								</select>
								<button type="submit" name="update_status"
									class="btn btn-primary btn-sm">Update</button>
							</form>
						</td>
						<td>
							<a href="view_complaint.php?id=<?php echo $complaint['id']; ?>"
								class="btn btn-info btn-sm">View</a>
							<a href="edit_complaint.php?id=<?php echo $complaint['id']; ?>"
								class="btn btn-warning btn-sm">Edit</a>
							<a href="resolve_complaint.php?id=<?php echo $complaint['id']; ?>"
								class="btn btn-success btn-sm">Resolve</a>
						</td>
					</tr>
					<?php endwhile; ?>
					<?php else: ?>
					<tr>
						<td colspan="6" class="text-center">No Complaints To Be Reviewed</td>
					</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

	<?php
    include './footer.php'; // Include the footer
    $conn->close(); // Close the database connection
    ?>
</body>

</html>