<?php include_once 'header.inc.php'; ?>


		<div class="content">
			<div class="register_user">
			<h1>Add Category</h1>
			<div class="reg_form">
				<form method="post">
					
					<div class="user_input">
						<label for="category">Add New Category</label>
						<input type="text" name="category" id="cat" placeholder="Enter New Category Name" required>
					</div>

					
					<div class="user_input">
						<input type="submit" name="submit" value="Add Category" id="addBtn">
					</div>
					<div id="result" style="background-color: green; color: #eee; text-align: center; padding: 15px; width: 100%; display: none; height: 50px;">
					</div>
				</form>
				<script type="text/javascript">
					$(document).ready(function(){
						$('#addBtn').on('click', function(e){
							e.preventDefault();
							$('#addBtn').attr('value','Adding...');
							var category = $('#cat').val();
							if (category=="") {
								$('#addBtn').attr('disabled',true);
							}

							$.ajax({
								url: 'ajax-cat.php',
								type:'post',
								data:'category='+category,
								success:function(result){
									$('#result').show().html(result);
									$('#result').css("display","block");
									$('#cat').val('');
									$('#addBtn').attr('value', 'Add Category');
								}
							});
						}); 
					});
				</script>

			</div>
		</div>
	</div>
<?php include_once 'footer.inc.php'; ?>

