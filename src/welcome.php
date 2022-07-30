<?php 

session_start();

require_once __DIR__ . '/src/session.php';

try {
    $session = SessionManager::getCurrentSession();
} catch (Exception $exception) {
    header('Location: index.php');
    exit(0);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Welcome</title>
</head>
<body>
	<div class="container">
		<form action="index.php" method="POST" class="login-username">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
            <?php echo "<h3>Welcome " . $_SESSION['username'] . "</h3>"; ?>
			</div>
			<div class="input-group">
            <p class="login-register-text" align="center">your login is success, you can logout now</p>
			</div>
			<div class="input-group">
				<a href="logout.php" name="submit" class="btn" >Logout</a>
			</div>
		</form>
	</div>
</body>
</html>
