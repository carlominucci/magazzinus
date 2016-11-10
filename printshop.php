<?php 
if(file_exists("config.php")){
	include("config.php");
}else{
	header("Location: install.php");
}
?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title>
		<style>
		<?php include 'style.css'; ?>
		</style>
		
	</head>
<body>
<?php
foreach ($_POST as $key => $entry)
{
	if($key == "description"){
		echo "<p>$entry</p><table>";
		echo "<tr><td>Descrizione</td><td>Quantità</td></tr>";
	}else if($key == "x" || $key == "y"){
	}else{	
		echo "<tr><td>";
		echo str_replace("_", " ", $key);
		echo "</td><td>";
		echo $entry;
		echo "</td></tr>";
	}
}
?>
</table>
<br /><br />
<p>
Data <?php echo date("d/m/Y"); ?>
</p>
<p>Firma ..........................................</p>
</body>
</html>
