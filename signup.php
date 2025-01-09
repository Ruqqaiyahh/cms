<?php
include './header.php'; // Include the header with the CSS link

$role = $_GET['role'] ?? 'user'; // Determine the role from the query parameter
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Signup Page</title>
	<!-- Include Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
	<div class="container d-flex justify-content-center align-items-center vh-100">
		<div class="card p-4 shadow-sm">
			<h1 class="text-center mb-4">Signup Page</h1>
			<form action="process_signup.php" method="post">
				<input type="hidden" name="role" value="<?php echo htmlspecialchars($role); ?>">
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="username">Username:</label>
					<input type="text" id="username" name="username" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" id="email" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="retype_password">Retype Password:</label>
					<input type="password" id="retype_password" name="retype_password" class="form-control" required>
				</div>
				<?php if ($role === 'admin'): ?>
				<div class="form-group">
					<label for="invitation_code">Invitation Code:</label>
					<input type="text" id="invitation_code" name="invitation_code" class="form-control" required>
				</div>
				<?php endif; ?>
				<button type="submit" class="btn btn-primary btn-block mt-3">Sign Up</button>
			</form>
		</div>
	</div>

	<?php
    include './footer.php'; // Include the footer
    ?>
</body>

</html>