<table class="tabella">
					<tr>
						<th>Codice</th>
						<th>Descrizione</th>
						<th>Ubicazione</th>
						<th>Quantità</th>
						<th>Unità di misura</th>
						<th>&nbsp;</th>
					</tr>

<?php
$query="SELECT * FROM asset ORDER BY id";
if (!$link){
	die('Could not connect: ' . mysql_error());
}else{
	$query="SELECT * FROM asset ORDER BY id";
	$result = mysql_query($query);
	if (!$result) {
   			die('Invalid query: ' . mysql_error());
	}
	while ($row = mysql_fetch_array($result, MYSQL_NUM)){
		echo "<tr>\n";
		echo "<td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td>\n";
		echo "<td><a href=\"#\"><img src=\"img/del_small.png\" alt=\"scarica\" /></a></td>\n";
		echo "</tr>\n";
	}
}
mysql_close($link);
?>
</table>