<?php 
function sanitize($input)
{

$host = "localhost";
$user = "root";
$password = "";
$db_name = "my-blog-sept";
$link = mysqli_connect($host,$user,$password,$db_name);

	global $link;
	$input= trim($input);
	$input = strip_tags($input,"<a><b><p><i><u><img><h1>");
	$input = mysqli_real_escape_string($link,$input);

	return $input;

		}

		function replace($image){

			if (isset($image)) {
				$date=time();
				if(isset($_FILES['post_img'])){
		$img_size = $_FILES['post_img']['size'];
		$img_name = $_FILES['post_img']['name'];
		$img_type = $_FILES['post_img']['type'];
		$img_temp = $_FILES['post_img']['tmp_name'];

		$allowed_ext = array("jpg", "png","gif","jpeg");
		$img_ext = explode('/', $img_type);
		$img_ext = strtolower(end($img_ext));

		if (in_array($img_ext, $allowed_ext)) {
			$img_ext = $img_ext;
		}else{
			$err[] = "Image type not allowed. (Please upload an image with the following extensions: .jpg, .png, .jpeg or .gif)";
			$err_flag = true;
		}

		if ($img_size > 512000) {
			$err[] = "Your image size is too large. Please select an image below 500kb file size.";
			$err_flag = true;
		}

		$file_dir = "uploads/".$date.'.'.$img_ext;

		if (!(isset($err))) {
			$send = move_uploaded_file($img_temp, $file_dir);
			return $file_dir;
		}

		}	
	}
}


 ?>
