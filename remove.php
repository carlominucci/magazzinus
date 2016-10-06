<?php
include "config.php";
if(isset($_GET['id'])){
	$query="DELETE FROM asset WHERE id = '" . $_GET[id] . "'";
	if (!$link) {
   		die('Could not connect: ' . mysql_error());
	}else{
		$result = mysql_query($query);
		if (!$result) {
    			die('Invalid query: ' . mysql_error());
		}
	}
	mysql_close($link);
	
}	
?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<meta HTTP-EQUIV="Refresh" content="<?php echo rand(1,5); ?>; url=index.php">
		<title><?php echo $title; ?></title></head>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
	<section>
		<article>
			<div class="titolo">
				<?php include("menu.php"); ?>
			</div>
		</article>
		<article>
			<p>
				Bene cancellato definitivamente.
				<img src="img/ok.png" alt="Bene cancellato definitivamente" />
			</p>
		</article>
	</section>
</body>
</html>
