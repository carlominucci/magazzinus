<?php include "config.php"; ?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title></head>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
		<div class="titolo">
			Scarica bene	
			<?php include "menu.php"; ?>
		</div>
<?php
if (!$link) {
   	die('Could not connect: ' . mysql_error());
}else{
	$query="SELECT * FROM asset WHERE id = '" . $_GET[id] . "'";
	$result = mysql_query($query);
	if (!$result) {
    		die('Invalid query: ' . mysql_error());
	}
}

while ($row = mysql_fetch_array($result, MYSQL_NUM)){
	$id=$row[0];
	$cod=$row[1];
	$desc=$row[2];
	$loc=$row[3];
	$unit=$row[5];
}
mysql_close($link);
?>

<form action="delete.php" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>">
	<p class="tabella">
		<table>
			<tr>
				<td>Codice</td>
				<td>
<?php echo $cod; ?>
				</td>
			</tr>
			<tr>
				<td>Descrizione / Nome</td>
				<td>
<?php echo $desc; ?>
				</td>
			</tr>
			<tr>
				<td>Ubicazione</td>
				<td>
<?php echo $loc; ?>
				</td>
			</tr>
			<tr>
				<td>Quantità</td>
				<td>
					<acronym title="Inserisci la quantità numerica del bene">
						<input type="text" name="quantity" size="10" value="1" />
					<acronym>
				</td>
			</tr>
			<tr>
				<td>Unità di misura</td>
				<td>
<?php echo $unit; ?>
				</td>
			</tr>
                        <tr>
                                <td>Nominativo</td>
                                <td>
					<select name="name">
						<option value="$id">ciao</option>
						<option value="$id">arrivederci</option>
					</select>
                                </td>
                        </tr>

			<tr>
				<td>Scarica</td>
				<td>
					<acronym title="Scarica bene">
						<input type="image" src="img/del.png" alt="Scarica">
					</acronym>
				</td>
			</tr>
	
		</table>
	</form>
</body>
</html>
