<?php include 'header.php'; ?>

<main class="d-flex justify-content-center align-items-center vh-100 bg-light">
	<div class="container text-center bg-white p-4 rounded shadow">
		<h1>Welcome to Our Platform</h1>
		<p>Please choose your sign-in option:</p>
		<a href="login.php?role=user" class="btn btn-primary m-2">Sign in as User</a>
		<a href="login.php?role=admin" class="btn btn-primary m-2">Sign in as Admin</a>
	</div>
</main>

<?php include 'footer.php'; ?>