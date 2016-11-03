<?php
$debug=0;
?>
<table class="tabella">
					<tr>
						<th>Codice</th>
						<th><a href="?order=descr">Descrizione</a></th>
						<th><a href="?order=unit">Ubicazione</a></th>
						<th><a href="?order=quantity">Quantità</a></th>
						<th>Unità di misura</th>
						<th><a href="?order=date">Ultimo movimento</a></th>
						<th>&nbsp;</th>
					</tr>

<?php
if(isset($_GET[order])){
	$query="SELECT * FROM asset ORDER BY " . $_GET[order];
}else{
	$query="SELECT * FROM asset ORDER BY descr";
}
if (!$link){
	die('Could not connect: ' . mysql_error());
}else{
	$result = mysql_query($query);
	if (!$result) {
   			die('Invalid query: ' . mysql_error());
	}
	while ($row = mysql_fetch_array($result, MYSQL_NUM)){
		echo "<tr>\n";
		echo "<td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4];
		echo "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td>\n";
		echo "<td ";
		if($row[4] < 5 && $row[4] > 0){
			echo "style=\"background-color: #FFEB3B\"";
		}
		if($row[4] <= 0){
			echo "style=\"background-color: #FF3D00\"";
		}
		echo "><a href=\"del.php?id=$row[0]\"><img src=\"img/del_small.png\" alt=\"scarica\" /></a>
				<a href=\"add.php?id=$row[0]\"><img src=\"img/add_small.png\" alt=\"carica\" /></a>";
		if($row[4] < 5){
                        echo "<img src=\"img/warning.png\" alt=\"warning\" />";
                }
		if($debug == 1){
			echo "<a href=\"remove.php?id=$row[0]\"><img src=\"img/remove.png\" alt=\"elimina voce definitivamente\" </a></td>\n";
		}
		echo "</tr>\n";
	}
}
mysql_close($link);
?>
</table>
