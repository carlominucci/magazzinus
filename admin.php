<?php include "config.php"; ?>
<?php
if ( ! get_magic_quotes_gpc() ) {
  $_POST['add'] = addslashes(strip_tags($_POST['add']));
  $_POST['location'] = addslashes(strip_tags($_POST['location']));
  $_POST['user'] = addslashes(strip_tags($_POST['user']));
  $_GET['enable'] = addslashes(strip_tags($_GET['enable']));
  $_GET['disable'] = addslashes(strip_tags($_GET['disable']));
  $_GET['action'] = addslashes(strip_tags($_GET['action']));
}

if($_GET[enable]){
	$query="UPDATE user SET state = '1' WHERE id = '" . $_GET[enable] . "'";
	$result = mysql_query($query);
}elseif($_GET[disable]){
	$query="UPDATE user SET state = '0' WHERE id = '" . $_GET[disable] . "'";
	$result = mysql_query($query);
}

if($_GET[action] == "adduser"){
	if($_POST[user] == ""){
		$error = "<p class=\"error\">Non puoi lasciare vuoto il campo del nome...</p>";
	}else{
		$query="INSERT INTO user VALUES('', '" . $_POST[user] . "', '" . $_POST[location] . "', '0')";
		$result = mysql_query($query);
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
	if($rowuser[3] == "1"){
		echo "	<td>
				<acronym title=\"Utente abilitato. Clicka per disabilitarlo\">
					<a href=\"admin.php?disable=" . $rowuser[0] . "\">
					<img src=\"img/enable.png\" alt=\"Disabilita\" />
				</acronym>
			</td>
		</tr>";
	}elseif($rowuser[3] == "0"){
		echo "<td><acronym title=\"Utente disabilitato. Clicka per abilitarlo\"><a href=\"admin.php?enable=" . $rowuser[0] . "\"><img src=\"img/disable.png\" alt=\"Abilita\" /></acronym></td></tr>";
	}
	//echo "<td><a href=\"admin.php?deluser=" . $rowuser[0] . "\"><img src=\"img/del.png\" alt=\"cancella\" /></a></td></tr>";
}
?>
							<tr>
								<td>
									<form action="admin.php?action=adduser" method="post">
										<input type="text" name="user" />
								</td>
								<td>
									<input type="text" name="location" />
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
			</p>
</td></tr></table>
</body>
</html>
