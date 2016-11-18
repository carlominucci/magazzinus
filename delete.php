<?php
include "config.php";
$id_asset = addslashes(strip_tags($_POST['id']));
$quantity = addslashes(strip_tags($_POST['quantity']));
$id_user= addslashes(strip_tags($_POST['name']));
	$query_update = "UPDATE asset SET quantity = quantity - $quantity, date = now() WHERE id = $id_asset";
	$query = "INSERT INTO get VALUES('', '$id_asset', '$quantity', '$id_user', now())";
	if (!$link) {
   		die('Could not connect: ' . mysql_error());
	}else{
		$result = mysql_query($query);
		if (!$result) {
    			die('Invalid query: ' . mysql_error());
		}

		$result = mysql_query($query_update);
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
				Dato aggiornato.	
				<img src="img/ok.png" alt="Dato aggiornato" />
			</p>
		</article>
	</section>
</body>
</html>
