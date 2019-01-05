<?php include_once 'header.inc.php'; ?>
<?php 
	if (isset($_POST['submit'])) {
		if (!empty($_POST['post_subject'])) {
			$title = sanitize(trim($_POST['post_subject']));
		}else{
			$err_flag = true;
			$err[] = "Please give a title to your post.";
		}
		$cat_id=intval($_POST['category']);
		if (!empty($_POST['post_body'])) {
			$body = sanitize(trim($_POST['post_body']));
		}else{
			$err_flag = true;
			$err[] = "Please body of your post is empty.";
		}

		$date = time();
		$user_id = intval($_SESSION['user_id']);

	$image=$_FILES['post_img'];
	$replace=replace($image);


	if ($replace) {
		$img_file_path = $replace;
					$sql = "INSERT INTO posts(user_id, cat_id, title,image_path, body,post_date) VALUES('$user_id','$cat_id','$title' ,'$img_file_path','$body','$date'  ) ";
					$query = mysqli_query($link,$sql);

					if ($query) {
						$err[] = "<p style='color:green'>Post added succesfully</p>";
					}else{
						$err[] = "<p style='color:red'>Sorry User cannot upload. Please try again</p>";
					}
	}

			else{
					$err[] = "Sorry post could not be uploaded";
				}	
		}
?>

		<div class="content">
			<h1>Add Post</h1>

		    <div class="post_wrapper">
		      <form enctype="multipart/form-data" method="post" id="add_news_panel_form">
		        <div class="post_input">
		            <label for="post_subject">Post Subject/Heading</label>
		            <input type="text" id="post_subject" name="post_subject" placeholder="Enter post subject">     
		        </div>

		        <div class="post_input">
		            <label for="post_cat">Post Category</label><br>
		            <select name="category" style="width: 100%; height: 40px; border-radius: 3px;padding: 8px; font-size: 18px;">
		            	<option value="uncategorized">Select post category</option>

		            	<?php  
		            		$sql = "SELECT * FROM categories WHERE 1";
		            		$query = mysqli_query($link, $sql);
		            		if ($query) {
		            			while($row = mysqli_fetch_assoc($query)){
		            				$cat_id = $row['cat_id'];
		            				$cat_name = ucfirst($row['cat_name']);
		            	?>
		            	<option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>

		            	<?php }
		            		} ?>

		            </select>
		        </div>

		        <div class="post_input">
		            <label for="post_body">Write the Post</label>
		            <div class="text_editor">
		              <textarea id="post_bod" name="post_body"></textarea>

		             <div class="post_input">
			            <label for="post_image">Select post image</label>
			            <input type="file" id="post_image" name="post_img" placeholder="Enter post subject">        
			        </div>

		              <div class="end_text_editor">
		                <button type="submit" name="submit"><i class="fa fa-plus"></i> Add Post</button>
		              </div>
		            </div>     
		        </div>
		        <?php if (isset($err)) {
		        		foreach ($err as $key => $error) {
		        			echo '<p styles="color:red">'.$error.'</p>';
		        		}
		        } ?>
		      </form>
		    </div>

		</div>
	</div>
<?php include_once 'footer.inc.php'; ?>
<?php 
if (isset($msg)) {?>
	<script type="text/javascript">
		swal("Good job!", "Post added succesfully", "Good job");
	</script>
<?php }?>

<?php 
if (isset($msg2)) {?>
	<script type="text/javascript">
		swal("Ooops!", "Sorry, something went wrong. Could not add post!", "error");
	</script>
<?php }?>