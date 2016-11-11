<?php
// persolizza i tuoi parametri
$title = "TILE";			// il titolo che comparirà sulla barra del browser
$hostname = "HOST";		// l'host del tuo database
$username = "USER";		// il nome utente per accedere al database
$password = "PASSWORD";	// la password per accedere al database
$database = "DBNAME";	// il nome del tuo database

// non toccare niente qua sotto

$link = mysql_connect($hostname, $username, $password);
mysql_select_db($database);
?>
