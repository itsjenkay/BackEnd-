<?php require_once'header.inc.php' ?>
	<div class="updates">

	<?php  
	$sql="SELECT * FROM posts ORDER BY post_date DESC LIMIT 5";
	$query=mysqli_query($link,$sql);

	if ($query) {
		while ($row=mysqli_fetch_assoc($query) ){
			$post_id=$row['post_id'];
			$post_id=urlencode($post_id);
			$title=$row['title'];
			$categories=$row['cat_id'];
			$img_path=$row['image_path'];
			$date=$row['post_date'];

	?>
		<div class="box">
		<img src="<?php echo 'admin/'.$img_path;?> ">
		<div class="write">
		<?php echo '<a href="post-view.php?post_id='.$post_id.'" style="font-size:14px;">'.$title.'</a>' ?>
		<p><?php echo $categories;?></p>
		<span style="color:white;"><?php echo date(' jS  F Y ', $date);?></span>
		</div>
		</div>
		
<?php }	} ?>



	</div>
	<div class="left">
		<div class="popular">
		<div class="pop">
			<a href="#">POPULAR NEWS</a>
			</div>
			<div class="link">
				<ul>
					<li><a href="#">All</a></li>
					<li><a href="#">Articles</a></li>
					<li><a href="#">Bundesliga</a></li>
					<li><a href="#">Commentaries</a></li>
					<li><a href="#">More</a></li>
				</ul>
			</div>
		</div>

		<?php 
		$sql2=" SELECT * FROM posts ORDER BY post_date DESC LIMIT 4 OFFSET 5";
		$query2=mysqli_query($link,$sql2);
		if ($query2) {
			while ($row=mysqli_fetch_assoc($query2)) {
				$post_id=urlencode($row['post_id']);
				$title=$row['title'];

				//geting a little portion of the body
				$body=substr($row['body'],0,150);
				$date=date('jS F Y', $row['post_date']);
				$img_path=$row['image_path'];

			?>


			
		<div class="pep">
			<div class="pix" style="background-image:url(<?php echo 'admin/'.$img_path;?>)">
				<a href="#">ARTICLES</a>
			</div>
			<h3><a href="post-view.php?post_id=<?php echo $post_id;?>"> <?php echo $title;?></a><h3>
			<span><?php echo $date ?></span>
			<p><?php echo $body; ?></p>
		</div>

		<?php }} ?>

		<div class="euro">
		<div class="special">
			<a href="#">EUROS SPECIAL</a>
		</div>
		<?php 
		
		 ?>
	<div class="uefa" >
	<div class="uefa-img" style="background-image: url(<?php echo 'images/7.jpg'; ?>);"></div>
			<p>UEFA Champions League:<br> Welcome Back! Returnees and Newbies<br><span>September 13, 2017</span></p>
			
		</div>
	
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
				<div class="green">SPORT</div>
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
		<div class="random">
			<div class="news">RANDOM NEWS</div>
		</div>
		<div class="rand">
			<div class="inner">
				<h3>Conte’s 3-5-2: To Be or Not To Be?</h3>
				<a href="#">Articles</a>
				<span>August 8, 2016</span>
			</div>
			<div class="inner">
				<h3>The Defensive Midfielder: Don’t Forget Your Shields!</h3>
				<a href="#">Sport</a>
				<span>August 20, 2016</span>
			</div>
			<div class="inner">
				<h3>Dear Joe, How Could Guardiola Be So Hartless?</h3>
				<a href="#">Articles</a>
				<span>August 21, 2016</span>
			</div>
		</div>
<?php require_once'footer.inc.php' ?>
	