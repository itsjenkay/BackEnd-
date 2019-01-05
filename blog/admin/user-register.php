<?php include_once 'header.inc.php'; ?>
<?php 
if (isset($_POST['submit'])) {
	// var_dump($_POST);
	// var_dump($_FILES);
	if(!empty($_POST['name'])){
		$name = sanitize($_POST['name']);
	}else{
		$err[]="Please provide your full name";
		$err_flag= true;
	}

	if(!empty($_POST['email'])){
		$email = sanitize($_POST['email']);
	}else{
		$err[]="Please provide your email";
		$err_flag= true;
	}

	if(!empty($_POST['phone'])){
		$phone = sanitize($_POST['phone']);
	}else{
		$err[]="Please provide your phone number";
		$err_flag= true;
	}

	if(!empty($_POST['gender'])){
		$gender = sanitize($_POST['gender']);
	}else{
		$err[]="Please indicate your gender";
		$err_flag= true;
	}

	if(!empty($_POST['u_role'])){
		$u_role = sanitize($_POST['u_role']);
		$u_role = intval($u_role);
	}else{
		$err[]="Please Select user role";
		$err_flag= true;
	}

	if(!empty($_POST['bio'])){
		$bio = sanitize($_POST['bio']);
	}else{
		$err[]="Please provide User Info.";
		$err_flag= true;
	}

	if(!empty($_POST['password'])){
		$password = sanitize($_POST['password']);
	}else{
		$err[]="Please provide your password";
		$err_flag= true;
	}

	if(!empty($_POST['password2'])){
		$password2 = sanitize($_POST['password2']);
	}else{
		$err[]="Please confirm your password";
		$err_flag= true;
	}

	if(@$password === @$password2){
		$password  = md5($password);
	}else{
		$err[] = "Passwords mis-matched! Please try again";
		$err_flag =true;
	}

	if(isset($_FILES['p_picture'])){
		$img_size = $_FILES['p_picture']['size'];
		$img_name = $_FILES['p_picture']['name'];
		$img_type = $_FILES['p_picture']['type'];
		$img_temp = $_FILES['p_picture']['tmp_name'];

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

		if (isset($email)) {
			$emailsql = "SELECT * FROM users WHERE email = '$email'";
			$emailquery = mysqli_query($link,$emailsql);
			if (mysqli_num_rows($emailquery) > 0) {
				$err[] = "The email addresss you entered has already been taken";
				$err_flag = true;
			}
		}

		$file_dir = "uploads/".$img_name;

		if (!(isset($err))) {
			$send = move_uploaded_file($img_temp, $file_dir);
			if ($send) {
					$img_file_path = $file_dir;
					$sql = "INSERT INTO users (fullname, email, profile_desc, image_path, password,gender,user_level) VALUES ('$name','$email','$bio','$img_file_path','$password','$gender','$u_role')";
					$query = mysqli_query($link,$sql);

					if ($query) {
						$msgstatus = true;
						$msg = "<p style='color:green'>User registered successfully</p>";
					}else{
						$msg2 = "<p style='color:red'>Sorry User cannot be registered. Please try again</p>";
					}
				}else{
					$err[] = "Sorry Image could not be uploaded";
				}	
		}


	}
}
 ?>
		<div class="content">
		<div class="register_user">
			<h1>Register User</h1>
			<div class="reg_form">
				<form method="post" enctype="multipart/form-data">
					
					<div class="user_input">
						<label for="name">Full name</label>
						<input type="text" name="name" id="name" placeholder="Enter your full name">
					</div>

					<div class="user_input">
						<label for="email">Email address</label>
						<input type="email" name="email" id="email" placeholder="Enter your email address">
					</div>

					<div class="user_input">
						<label for="phone">Phone number</label>
						<input type="tel" name="phone" id="phone" placeholder="Mobile number">
					</div>

					<div class="user_input">
						<label for="u_role">User Role</label>
						<select name="u_role">
							<option value="2">Admin</option>
							<option value="1">User</option>
						</select>
					</div>

					<div class="user_input gender_div">						
						<input type="radio" name="gender" id="male" value="male">
						<label for="male" style="display: inline;">Male</label>
						<input type="radio" name="gender" id="female" value="female">
						<label for="female"  style="display: inline;">Female</label>
					</div>

					<div class="user_input">
						<label for="p_picture">Profile Picture</label>
						<label for="p_picture" id="remove_me">Browse Picture</label>
						<input type="file" name="p_picture" id="p_picture" accept="jpg,png,gif,jpeg" onchange="upload(this)" multiple>
					</div>

					<div class="user_input">
						<label for="bio">Brief Bio</label>
						<textarea id="bio" name="bio" placeholder="Brief biography"></textarea>
					</div>
					<div class="user_input">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" placeholder="Password">
					</div>

					<div class="user_input">
						<label for="password2">Confirm Password</label>
						<input type="password" name="password2" id="password2" placeholder="Re-type password">
					</div>

					<div class="user_input">
						<input type="submit" name="submit" value="Register">
					</div>
					<?php 
						if (isset($err)) {
							foreach ($err as $error) {
								echo "<p style='color:red'>".$error."</p>";
							}
						}

						// if (isset($msg)) { 
						// 	echo $msg;
						// }
					 ?>
				</form>
			</div><div class="image_prev">
				<div class="image_holder">
					<img src="../images/10.png" id="profileImg">
				</div>
			</div>
		</div>
		</div>
	</div>
	<script type="text/javascript">
function upload(f) {
	var fiePath = $('#p_picture').val();
	var reader = new FileReader();
	reader.onload = function (e) {
		$('#profileImg').attr('src',e.target.result);
	};
	reader.readAsDataURL(f.files[0]);
}
</script>
<?php include_once 'footer.inc.php'; ?>
<?php 
if (isset($msg)) {?>
	<script type="text/javascript">
		swal("Good job!", "User registered successfully", "success");
	</script>
<?php }?>

<?php 
if (isset($msg2)) {?>
	<script type="text/javascript">
		swal("Ooops!", "Sorry, something went wrong. Could not register user!", "error");
	</script>
<?php }?>