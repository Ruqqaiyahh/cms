<?php
include './header.php'; // Include the header with the CSS link
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<!-- Include Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
	<div class="container d-flex justify-content-center align-items-center vh-100">
		<div class="card p-4 shadow-sm">
			<h1 class="text-center mb-4">Login Page</h1>
			<form action="process_login.php" method="post">
				<div class="form-group">
					<label for="username">Username:</label>
					<input type="text" id="username" name="username" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" class="form-control" required>
				</div>
				<button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
			</form>
			<div class="text-center mt-3">
				<p>Don't have an account?</p>
				<a href="signup.php?role=user" class="btn btn-link">Create User Account</a>
				<a href="signup.php?role=admin" class="btn btn-link">Create Admin Account</a>
			</div>
		</div>
	</div>

	<?php
    include './footer.php'; // Include the footer
    ?>
</body>

</html>