<?php include "config.php"; ?>
<?php
if(isset($_GET[id])){
	$query = "SELECT * FROM asset WHERE id = '" . $_GET[id] . "'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result, MYSQL_NUM)){
		$id = $row[0];
		$cod = $row[1];
		$descr = $row[2];
		$loc = $row[3];
		$quantity = $row[4];
		$unit = $row[5];
	}
}
?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title></head>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
		<div class="titolo">
			Carica bene	
			<?php include "menu.php"; ?>
		</div>
<?php
if(isset($_GET[id])){
	?><form action="update.php" method="post"><?php
}else{
	?><form action="new.php" method="post"><?php
}?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
	<p class="tabella">
		<table>
			<tr>
				<td>Codice</td>
				<td>
					<acronym title="Inserisci l'eventuale codice del bene.">
						<input type="text" name="cod" value="<?php echo $cod; ?>" size="15" />
					</acronym>
				</td>
			</tr>
			<tr>
				<td>Descrizione / Nome</td>
				<td>
					<acronym title="Inserisci il nome del bene.">
						<input type="text" name="descr" value="<?php echo $descr; ?>" size="40" />
					</acronym>
				</td>
			</tr>
			<tr>
				<td>Ubicazione</td>
				<td>
					<acronym title="Inserisci l'ubicazione del bene.">
						<input type="text" name="loc" value="<?php echo $loc; ?>" size="40" />
					</acronym>
				</td>
			</tr>
			<tr>
				<td>Quantità</td>
				<td>
					<acronym title="Inserisci la quantità numerica del bene">
						<input type="text" name="quantity" value="<?php echo $quantity; ?>" size="10" />
					<acronym>
				</td>
			</tr>
			<tr>
				<td>Unità di misura</td>
				<td>
					<acronym title="Inserisci l'unità di misura">
						<input type="text" name="unit" value="<?php echo $unit; ?>"size="40"/>
					</acronym>
				</td>
			</tr>
			<tr>
				<td>Salva</td>
				<td>
					<acronym title="Aggiungi bene">
						<input type="image" src="img/save.png" alt="Aggiungi">
					</acronym>
				</td>
			</tr>
	
		</table>
	</form>
</body>
</html>
