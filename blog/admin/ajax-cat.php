 <?php 
	require_once "includes/config.inc.php";

	if (!empty($_POST['category'])) {
		$category = strtolower(trim($_POST['category']));

		$sql1 = "SELECT cat_name FROM categories WHERE cat_name='$category' ";
		$query1 = mysqli_query($link, $sql1);
		if (@mysqli_num_rows($query1) > 0) {
			echo "This entry already exists in the database.";
			exit();
		}else{
			$sql = "INSERT INTO categories(cat_name) VALUES('$category') ";

			$query = mysqli_query($link, $sql);

			if ($query) {
				echo "New category added successfully";
			}else{
				echo "Sorry, action not successful";
			}
		}
	}else{
		echo "Empty filed not allowed";
	}

 ?>