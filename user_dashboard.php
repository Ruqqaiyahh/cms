<?php
include './header.php'; // Include the header with the CSS link
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Dashboard</title>
	<!-- Include Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
	<div class="container mt-5">
		<h1 class="text-center mb-4">User Dashboard</h1>
		<div class="card p-4 shadow-sm">
			<h2 class="text-center mb-4">Submit a Complaint</h2>
			<form action="process_complaint.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="title">Complaint Title:</label>
					<input type="text" id="title" name="title" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="description">Description:</label>
					<textarea id="description" name="description" class="form-control" rows="5" required></textarea>
				</div>
				<div class="form-group">
					<label for="category">Category:</label>
					<select id="category" name="category" class="form-control" required>
						<option value="">Select a category</option>
						<option value="billing">Billing</option>
						<option value="service">Service</option>
						<option value="technical">Technical</option>
						<option value="other">Other</option>
					</select>
				</div>
				<div class="form-group">
					<label for="attachment">Attachment (optional):</label>
					<input type="file" id="attachment" name="attachment" class="form-control-file">
				</div>
				<button type="submit" class="btn btn-primary btn-block mt-3">Submit Complaint</button>
			</form>
		</div>
	</div>

	<?php
    include './footer.php'; // Include the footer
    ?>
</body>

</html>