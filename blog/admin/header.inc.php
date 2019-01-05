<?php
session_start();
require_once('includes/config.inc.php');
require_once('includes/functions.inc.php');
if (!isset($_SESSION['user_id'])) {
	header("Location: index.php");
	exit();
}
else{
	$user_id = intval($_SESSION['user_id']);
	$sql = "SELECT * FROM users WHERE user_id='$user_id'";
	$query = mysqli_query($link,$sql);
	if ($query) {
		$row= mysqli_fetch_array($query);
		$email =  $row['email'];
		$name = $row['fullname'];
		$imgPath = $row['image_path'];
		if ($row['user_level'] == 1) {
			$userRole = "Moderator";
		}elseif ($row['user_level'] == 2) {
			$userRole = "Administrator";
		}else{
			$userRole = "User";
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | MyBlog</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/user-register.css">
	<link rel="stylesheet" type="text/css" href="css/add-post.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<div class="container">
	<div class="header">
		<h1>Myblog</h1>
	</div>
	<div class="nav">
		<ul>
			<li><a href="dashboard.php">Dasboard</a></li>
			<li><a href="user-register.php">Register User </a></li>
			<li><a href="add-post.php">Add Post</a></li>
			<li><a href="add-category.php">Add Category</a></li>
			<li><a href="posts-view.php">View Posts</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<p>Logged in as: <?php echo $email; ?></p>
		<div class="users" style="background-image: url(<?php echo $imgPath ?>);">	
		</div>
		<div class="users">
			<p><?php echo $name; ?></p>
			<p>Access Level: <?php echo $userRole; ?></p>
		</div>
	</div>
	<div class="right">
		<h1>Dashboard</h1>
		<div class="box">
			<h1>Posts</h1>
			<h2>34</h2>
		</div>
		<div class="box">
			<h1>Registered users</h1>
			<h2>189</h2>
		</div>
		<div class="box">
			<h1>Category</h1>
			<h2>62</h2>
		</div>
		<div class="box">
			<h1>Categories</h1>
			<h2>8</h2>
		</div>