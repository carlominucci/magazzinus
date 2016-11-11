<?php
// persolizza i tuoi parametri
$title = "Magazzinus";			// il titolo che comparirà sulla barra del browser
$hostname = "localhost";		// l'host del tuo database
$username = "root";		// il nome utente per accedere al database
$password = "cf81003";	// la password per accedere al database
$database = "magazzinus";	// il nome del tuo database

// non toccare niente qua sotto

$link = mysql_connect($hostname, $username, $password);
mysql_select_db($database);
?>
