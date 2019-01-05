<?php session_start(); 
if (isset($_SESSION['user_id'])) {
	header("Location: dashboard.php");
	exit();
} 

?>
<?php 
require_once 'includes/config.inc.php';
?>
<?php 

if (isset($_POST['submit'])) {
	if (!empty($_POST['email'])) {
		$email = strip_tags(trim($_POST['email']));
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	}else{
		$email_err = true;
		$err_flag = true;
	}

	if (!empty($_POST['password'])) {
		$password = strip_tags(trim($_POST['password']));
		// $password = md5($password);
		$password = ($password);
	}else{
		$pass_err = true;
		$err_flag = true;
	}

	if (!isset($err_flag)) {
		$sql = "SELECT user_id FROM users WHERE email = '$email' AND password = '$password'";
		$query = mysqli_query($link,$sql);
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
			$_SESSION['user_id'] = $row['user_id'];
			header('Location: dashboard.php');
			exit();
		}else{
			$user_err = "<p style='color:red;'>Incorrect login details. Please try again<br/>";
		}
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Blog</title>
	<link rel="stylesheet" type="text/css" href="css/styles-index.css">
</head>
<body>
<div class="container">
	<div class="header">
		
	</div>
	<div class="box">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<h1>Welcome to MyBlog</h1>
			<p>Please provide correct login detals to Login:</p>
			<?php 
				if (isset($user_err)) {
					echo $user_err;
				}
			 ?>
			<input type="email" name="email" required placeholder="Email">
			<?php 
				if (isset($email_err)) {
					echo "<p>Empty email field not allowed</p>";
				}
			 ?>
			<input type="password" name="password" required placeholder="Password">
			<?php 
				if (isset($pass_err)) {
					echo "<p>Empty password field not allowed</p>";
				}
			 ?>
			<input type="submit" name="submit" value="Login">
		</form>
	</div>
</div>
</body>
</html>