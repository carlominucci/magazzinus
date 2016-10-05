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
<form action="update.php" method="post">
	<p class="tabella">
		<table>
			<tr>
				<td>Codice</td>
				<td>
					<acronym title="Inserisci l'eventuale codice del bene.">
						<input type="text" name="cod" size="15" />
					</acronym>
				</td>
			</tr>
			<tr>
				<td>Descrizione / Nome</td>
				<td>
					<acronym title="Inserisci il nome del bene.">
						<input type="text" name="desc" size="40" />
					</acronym>
				</td>
			</tr>
			<tr>
				<td>Ubicazione</td>
				<td>
					<acronym title="Inserisci l'ubicazione del bene.">
						<input type="text" name="loc" size="40" />
					</acronym>
				</td>
			</tr>
			<tr>
				<td>Quantità</td>
				<td>
					<acronym title="Inserisci la quantità numerica del bene">
						<input type="text" name="quantity" size="10" />
					<acronym>
				</td>
			</tr>
			<tr>
				<td>Unità di misura</td>
				<td>
					<acronym title="Inserisci l'unità di misura">
						<input type="text" name="unit" size="40"/>
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
