<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Signup</title>
	<link rel="stylesheet" href="../assets/style.css">
</head>

<body>
	<div class="signup-container">
		<h2>Signup</h2>
		<form action="process_signup.php" method="POST">
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" required>
			</div>
			<button type="submit">Signup</button>
		</form>
	</div>
</body>

</html>