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
				Ricerca beni 
				<?php include "menu.php"; ?>
			</div>
			<p>
			Inserisci le chiavi di ricerca<br />
			<form method="post" action="search.php">
				<input type="text" name="chiave" value="<?php echo $_POST["chiave"];  ?>" />
				<input type="submit" value="cerca" />
			</form>
<?php
	if ( ! get_magic_quotes_gpc() ) {
  		$_POST["chiave"] = addslashes($_POST["chiave"]);
  	}
	$chiave=$_POST["chiave"];
    if (isset($chiave) == false || $chiave == "")
    {
		?>
		<p>Specificare un criterio di ricerca.</p>
		<?php
    }else{
		$query_user="SELECT id,nome FROM user";
		$out_user=mysql_query($query_user, $link);
		$arr_user=array();
		while($user = mysql_fetch_array($out_query_user)){
			$arr_user[$tec[0]] = $user[1];
		}
        $arr_txt = explode(" ", $chiave);
        $sql = "SELECT * FROM asset WHERE ";
        for ($i=0; $i<count($arr_txt); $i++)
        {
            if ($i > 0)
            {
                $sql .= " AND ";
            }
            $sql .= "(descr LIKE '%" . $arr_txt[$i] . "%' OR cod LIKE '%" . $arr_txt[$i] . "%')";
        }
	$sql .= " ORDER BY id DESC";
        $query = mysql_query($sql, $link);
	//echo $sql;
        $quanti = mysql_num_rows($query);
		//echo $quanti;
        if($quanti == 0){
			echo "<p>Nessun risultato!</p>";
        }elseif($quanti > 0){
			?>
			<table class="tabella">
				<tr>
					<th>Cod/Inv</th>
					<th>Descrizione</th>
					<th>Ubicazione</th>
					<th>Quantità</th>
					<th>Ultimo movimento</th>
					<th> &nbsp;</th>
				</tr>
			<?php
            for($x=0; $x<$quanti; $x++)
            {
                $row = mysql_fetch_row($query);
				$id=$rs[7];
				echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[6]</td>";
				echo "<td ";
				if($row[4] < 5 && $row[4] > 0){
					echo "style=\"background-color: #FFEB3B\"";
				}
				if($row[4] <= 0){
					echo "style=\"background-color: #FF3D00\"";
				}
				echo "><a href=\"del.php?id=$row[0]\"><img src=\"img/del_small.png\" alt=\"scarica\" /></a>
                                <a href=\"add.php?id=$row[0]\"><img src=\"img/add_small.png\" alt=\"carica\" /></a>";
				echo "<a href=\"addshop.php?id=$row[0]\"><img src=\"img/shopping.png\" alt=\"ordina\" /></a>";
				echo "</tr>";
            }
            echo "</table>";
        }
    }
?>

			</p>
</body>
</html>
