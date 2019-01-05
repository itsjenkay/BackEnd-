<?php 

$host = "localhost";
$user = "root";
$password = "";
$db_name = "my-blog-sept";
$link = mysqli_connect($host,$user,$password,$db_name);
 ?>
<?php 

function sanitize($input)
{
	global $link;
	$input= trim($input);
	$input = strip_tags($input,"<a><b><p><i><u><img><h1>");
	$input = mysqli_real_escape_string($link,$input);

	return $input;
}
 ?>
