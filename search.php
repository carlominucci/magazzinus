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
            $sql .= "('descr' LIKE '%" . $arr_txt[$i] . "%' OR cod LIKE '%" . $arr_txt[$i] . "%')";
        }
	$sql .= " ORDER BY id DESC";
	echo $sql;
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
					<th>Computer</th>
					<th>Ubicazione</th>
					<th>Problema Riscontrato</th>
					<th>Data Chiusura</th>
					<th>Soluzione</th>
					<th>Tecnico chiusura</th>
				</tr>
			<?php
            for($x=0; $x<$quanti; $x++)
            {
                $rs = mysql_fetch_row($query);
				$id=$rs[7];
				echo "<tr><td>$rs[10]</td><td>$rs[1]</td><td>$rs[2]</td><td>$rs[3]</td><td>$rs[8]</td><td>$rs[6]</td><td>$arr_tecnici[$id]</td></tr>";
            }
            echo "</table>";
        }
    }
?>

			</p>
</body>
</html>