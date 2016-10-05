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
			Carica bene	
			<?php include "menu.php"; ?>
		</div>
<?php echo $_GET[id]; ?>
<form action="delete.php" method="post">
	<p class="tabella">
		<table>
			<tr>
				<td>Codice</td>
				<td>
codice
				</td>
			</tr>
			<tr>
				<td>Descrizione / Nome</td>
				<td>
Descrizione
				</td>
			</tr>
			<tr>
				<td>Ubicazione</td>
				<td>
Ubicazione
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
Unità di misura
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
