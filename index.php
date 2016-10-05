<?php 
if(file_exists("config.php")){
	include("config.php");
}else{
	header("Location: install.php");
}
?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title>
		<style>
		<?php include 'style.css'; ?>
		</style>
		
	</head>
<body>
	<div class="titolo">
		Gestione Magazzino 
		<?php include("menu.php"); ?>
	</div>
	<?php include("view.php"); ?>
</body>
</html>
