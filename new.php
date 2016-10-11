<?php
include "config.php";
if(isset($_POST['descr']) && isset($_POST['loc']) && isset($_POST['quantity']) && isset($_POST['unit'])){
	$cod=addslashes(strip_tags($_POST['cod']));
	$descr=addslashes(strip_tags($_POST['descr']));
	$loc=addslashes(strip_tags($_POST['loc']));
	$quantity=addslashes(strip_tags($_POST['quantity']));	
	$unit=addslashes(strip_tags($_POST['unit']));	
	$query="INSERT INTO asset VALUE('', '$cod', '$descr', '$loc', '$quantity', '$unit', now());";
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
				Bene aggiunto.
				<img src="img/ok.png" alt="Bene aggiunto" />
			</p>
		</article>
	</section>
</body>
</html>
