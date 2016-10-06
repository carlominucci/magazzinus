<?php include "config.php"; ?>
<?php
if ( ! get_magic_quotes_gpc() ) {
  $_POST['add'] = addslashes(strip_tags($_POST['add']));
  $_POST['nomelab'] = addslashes(strip_tags($_POST['nomelab']));
  $_POST['nometecnico'] = addslashes(strip_tags($_POST['nometecnico']));
  $_GET['dellab'] = addslashes(strip_tags($_GET['dellab']));
  $_GET['deltecnico'] = addslashes(strip_tags($_GET['deltecnico']));
  $_GET['enable'] = addslashes(strip_tags($_GET['enable']));
  $_GET['disable'] = addslashes(strip_tags($_GET['disable']));
  $_GET['blocconote'] = addslashes(strip_tags($_GET['blocconote']));
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
				Pannello di Ammistrazione
				<?php include "menu.php"; ?>
			</div>
<?php
if($error != ""){
echo $error;
}
?>
<table class="tabella">
	<tr>
		<th>Gestione Nominativi</th>
		<th>Altro</th>
	</tr>
		<td>
						<table class="tabella">

						<tr><th>Nome</th><th>Posto</th><th>Stato</th></tr>
<?php
$queryuser="SELECT * FROM user";
$resultuser = mysql_query($queryuser);
while($rowuser = mysql_fetch_array($resultuser)){
	echo "<tr><td>" . $rowuser[1] . "</td>";
	echo "<td>" . $rowuser[2] . "</td>";
	if($rowuser[2] == 1){
		echo "	<td>
				<acronym title=\"Utente abilitato. Clicka per disabilitarlo\">
					<a href=\"admin.php?disable=" . $rowuser[0] . "\">
					<img src=\"img/enable.png\" alt=\"Disabilita\" />
				</acronym>
			</td>
		</tr>";
	}elseif($rowuser[2] == 0){
		echo "<td><acronym title=\"Utente disabilitato. Clicka per abilitarlo\"><a href=\"admin.php?enable=" . $rowuser[0] . "\"><img src=\"img/disable.png\" alt=\"Abilita\" /></acronym></td></tr>";
	}
	//echo "<td><a href=\"admin.php?deluser=" . $rowuser[0] . "\"><img src=\"img/del.png\" alt=\"cancella\" /></a></td></tr>";
}
?>
							<tr>
								<td>
									<form action="admin.php" method="post">
										<input type="text" name="user" />
								</td>
								<td>
										<acronym title="Aggiungi">
											<input type="image" name="add" value="adduser" src="img/save.png" alt="add" />
										</acronym>
									</form>
								</td>
							</tr>
						</table>
</td><td>
				<table class="tabella">
<tr><td>
			<p>
				Legenda:<br />
				<img src="img/enable.png" alt="Enable" /> Abilitato. Clicka per disabilitarlo.<br />
				<img src="img/disable.png" alt="Disable" /> Disabilitato. Clicka per abilitarlo.<br />
				<img src="img/del.png" alt="Cancella" /> Elimina definitivamente.<br />
				<img src="img/add.png" alt="Aggiungi" /> Aggiungi campo.
			</p>
</td></tr></table>
</body>
</html>
