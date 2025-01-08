<?php
include '../includes/header.php'; // Include the header with the CSS link
?>

<div class="login-container">
	<h1>Login Page</h1>
	<form action="process_login.php" method="post">
		<div class="form-group">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required>
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
		</div>
		<button type="submit">Login</button>
	</form>
</div>

<?php
include '../includes/footer.php'; // Include the footer
?>