
<?php require_once'header.inc.php' ?>

	<?php 
	if (!isset($_GET['post_id'])) {
		header("location:index.php");
		exit();
	}else{
		$post_id=intval(urldecode($_GET['post_id']));

		$sql="SELECT posts.*,users.* FROM posts INNER JOIN users WHERE posts.post_id='$post_id' AND 
		posts.user_id=users.user_id";
		$query=mysqli_query($link,$sql);

		if ($query) {
			$row=mysqli_fetch_array($query);
			$title=$row['title'];
			//for paragraphswhile fetching it from the data base
			$body=nl2br($row['body']);
			$date=date("jS F,Y", $row['post_date']);
			$authour=$row['fullname'];
			$auth_img_path="admin/".$row['user_image_path'];
			$post_img_path="admin/".$row['image_path'];
			$auth_profile=$row['profile_desc'];
			$email=$row['email'];
			$comm_num=$row['comm_num'];

		}
	}

	 ?>
	<div class="slider">
	
		<a href="#">SPORTS</a>
	</div>
<div class="read">
	<div class="social">
		<div class="media">
			<i class="fa fa-facebook"></i><span>Facebook</span>
		</div>
		<div class="media">
			<i class="fa fa-twitter"></i><span>Twitter</span>
		</div>
		<div class="media">
			<i class="fa fa-google-plus"></i>
		</div>
		
	</div>
		<div class="display" style="background-image: url(<?php echo $post_img_path; ?>);">
	
		<h3><?php echo $title; ?><br><span><?php echo $date; ?></span></h3>

	</div>
		<p>
			<?php echo $body; ?>
		</p>
<div class="about">
	<h3>ABOUT THE WRITER</h3>
	<div class="image" style="background-image: url(<?php echo $auth_img_path; ?>);"></div>
	<div class="about-right">
	<h4> <?php echo $email; ?></h4>
	<p><?php echo $auth_profile; ?></p>
	</div>
</div>
<div class="comments">
	<a id="comment"></a>
	<h3>COMMENTS</h3>
	<span>Type Your Comments Below:</span>
	<form method="POST" action="add-comment.php">
		<input type="text" name="fullname" placeholder="Enter Your FullName" required>
		<input type="email" name="email" placeholder="Enter Your Email Address" required>
		<input type="text" name="post_id">
		<textarea name="comment" placeholder="Type Your Comments"></textarea>
		<input type="submit" name="submit" value="Send">
	</form>

</div>
<div class="commented">
	<h3><span><?php echo $comm_num; ?></span> Responses on "<?php echo $title ?>"</h3>
	<?php 

		$sql="SELECT * FROM comments WHERE post_id='$post_id' ORDER BY comm_date DESC LIMIT 10 ";
		$query=mysqli_query($link,$sql);
		if ($query) {
				while ($row=mysqli_fetch_array($query)) {
					$fullname=$row['fullname'];
					$email=$row['email'];
					$comm_date=date('jS F, Y', $row['comm_date']);
					$comment=nl2br($row['comment']);
	?>

	<div class="boxes">
		<div class="dp" style="background-image: url(<?php echo $auth_img_path; ?>)"></div>
		<div class="comment">
		<span><?php echo $comm_date; ?></span><span> | <?php echo $fullname; ?></span>
		<p><?php echo $comment; ?> ...</p></div>
	</div>

	<?php
				}
		}
	 ?>
	
</div>
</div>
	<div class="ads">
	<div class="stay">
		<div class="pop">
			<a href="#">STAY CONNECTED</a>
			</div>
			<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fgoal%2F&tabs=timeline&width=312&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="312" height="900" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
			</div>
	</div>

	<div class="sport">
				<div class="green">RELATED ARTICLES</div>
			</div>
			<div class="welcome">
				<div class="well">
					<div class="in" style="background-image: url(<?php echo 'images/11.jpg'; ?>);">
				
						<a href="#">Sports</a>
					</div>
					<h4>Deadline Day Steal, Serge Aurier Will Make Tottenham Title Contenders</h4>
					<span>September 5, 2017</span>
					<p>Serge Aurier may be known to everyone as the 'bad guy', but the Ivory Coast... </p>
				</div>
				<div class="well">
					<div class="in" style="background-image: url(<?php echo 'images/12.jpg'; ?>);">
						
						<a href="#">English Premier League</a>
					</div>
					<h4>352 Predictions: The English Premier League Top Six (6) Predictions For The 2017/18 Season</h4>
					<span>August 14, 2017</span>
					<p>Welcome to the 2017/2018 English Premier League season. Friday’s dustup between Arsenal and Leicester gave...  </p>
				</div>
				<div class="well">
					<div class="in" style="background-image: url(<?php echo 'images/13.jpg'; ?>);">
						
						<a href="#">Previews</a>
					</div>
					<h4>Premiership Preview: What To Expect From Arsenal, City & Spurs</h4>
					<span>August 2, 2017</span>
					<p>With the 2017/2018 Premiership season speeding towards us like the scramble for recruitments across all... </p>
				</div>
			</div>
		
	
	<footer>
		<div class="footer">
			<div class="foot">
				<img src="images/cammiebanner.png">
				<p>myBlog is a football blog with an extra focus on fans. Run by fans of the game for the true fans of the game.</p>
				<span>Contact us: info@352.com.ng</span>
			</div>
			<div class="foot">
			<h1>POPULAR POST</h1>
				<div class="inside">
				<div class="inside-img" style="background-image: url(<?php echo 'images/16.jpg'; ?>);"></div>
					<p>José Mourinho: Be careful what you wish for!</p>
					<span>May 27, 2016</span>
				</div>
				<div class="inside">
					<div class="inside-img" style="background-image: url(<?php echo 'images/15.jpg'; ?>);"></div>
					<p>WE NEED MORE FOOTBALLERS NOW</p>
					<span>May 24, 2016</span>
				</div>
				<div class="inside">
					<div class="inside-img" style="background-image: url(<?php echo 'images/14.jpg'; ?>);"></div>
					<p>Which is the Best League in the World, Really?</p>
					<span>May 25, 2016</span>
				</div>
			</div>
			<!-- Sport69
    Opinions58
    Fans corner43
    Previews36
    Reviews25
    Euros Special20
    Transfer18 -->
			<div class="foot">
				<h1>POPULAR CATEGORY</h1>
				<h5>Articles <span>166</span></h5>
				<h5> English Premier League<span>92</span></h5>
				<h5> Sport<span>69</span></h5>
				<h5> Opinions<span>58</span></h5>
				<h5> Fans Corner<span>43</span></h5>
				<h5> Previews<span>36</span></h5>
				<h5> Reviews<span>25</span></h5>
				<h5> Euros Special<span>20</span></h5>
				<h5> Transfer<span>18</span></h5>
			</div>
		</div>
	</footer>
</div>
</body>
</html>