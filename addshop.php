<?php
include "config.php";
$id_asset = addslashes(strip_tags($_GET['id']));
	$query = "INSERT INTO shop VALUES('', '$id_asset')";
	if (!$link) {
   		die('Could not connect: ' . mysql_error());
	}else{
		$result = mysql_query($query);
		if (!$result) {
    			die('Invalid query: ' . mysql_error());
		}
	}
	mysql_close($link);
	
?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<meta HTTP-EQUIV="Refresh" content="<?php echo rand(1,3); ?>; url=<?php echo $_SERVER['HTTP_REFERER']; ?>">
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
				Aggiunto alla lista degli ordini.	
				<img src="img/ok.png" alt="Aggiunto alla lista degli ordini" />
			</p>
		</article>
	</section>
</body>
</html>
