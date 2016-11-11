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
	<div class="titolo">
		Ordine materiale 
		<?php include("menu.php"); ?>
	</div>
<?php
?>
<h3>Elenco materiale da ordinare</h3>
<form method="post" action="printshop.php">
<textarea name="description" rows="5" cols="40"></textarea>
<table class="tabella">
					<tr>
						<th>Descrizione</th>
						<th>Quantità</th>
						<th>Unità di misura</th>
					</tr>

<?php
if($_GET[del] == all){
	$query = "DELETE FROM shop WHERE 1";
	
}else{
	$query="SELECT asset.descr, asset.quantity, asset.unit FROM asset,shop WHERE asset.id = shop.id_asset ORDER BY asset.descr";
}
if (!$link){
	die('Could not connect: ' . mysql_error());
}else{
	$result = mysql_query($query);
	if (!$result) {
   			die('Invalid query: ' . mysql_error());
	}
	$i=0;
	while ($row = mysql_fetch_array($result, MYSQL_NUM)){
		echo "<tr>\n";
		echo "<td>" . $row[0] . "</td><td><input name=\"" . $row[0] . "\" type=\"text\" size=\"2\" /></td><td>" . $row[2];
		echo "</td></tr>\n";
	}
}
mysql_close($link);
?>
</table>
<p>
<input type="image" src="img/print.png" alt="Submit Form" />
<a href="shop.php?del=all"><img src="img/delete.png" alt="Cancella Ordine" /></a>
</form>
</p>
</body>
</html>
