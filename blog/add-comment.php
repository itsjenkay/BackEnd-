  <?php 
require_once('includes/config.inc.php');
require_once('includes/functions.inc.php');


if (isset($_POST['submit'])) {
	if (!empty($_POST['fullname'])) {
		$fullname=sanitize($_POST['fullname']);

	}else{
		$err_flag=true;
		
	}
	if (!empty($_POST['email'])) {
		$email=sanitize($_POST['email']);

	}else{
		$err_flag=true;
		
	}
	$post_id=$_POST['post_id'];

	if (!empty($_POST['comment'])) {
		$comment=sanitize($_POST['comment']);

	}else{  c		$err_flag=true;
	}
	$comm_date=time();
	if (!isset($err_flag)) {
		$sql="INSERT INTO comments (comment,post_id,comm_date,fullname,email) VALUES ('$comment','$post_id','$comm_date','$fullname','$email')";
		$query=mysqli_query($link,$sql);
		if ($query) {
			$sql="UPDATE post SET comm_num=comm_num+1 WHERE post_id='$post_id'";
			$query=mysqli_query($link,$sql);
			header("location:post-view.php?post_id=$post_id#comment");
			exit();
		}else{
			echo "something went wrong";
		}
	}
}
 ?>
