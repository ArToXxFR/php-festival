<?php

	include "constants.php";
	include "connect_bdd.php";

	$sth = $dbh->prepare("SELECT id, nom, description, cout, pays_origine, musiciens, email, photo from groupe;");
	$sth->execute();
	$groupe = $sth->fetchAll(PDO::FETCH_ASSOC);

	
	if(isset($_GET['id']) && ($_GET['id'] < 0 || $_GET['id'] >= count($groupe))){
		header("Location: index.php?msg=". ERROR_OCCURED);
		exit();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Show</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header class="head">
		<a href='index.php' class="button-header">HOME</a>
		<a href='create.php' class="button-header">CREATE</a>
	</header>
	<div class="page">
		<div class="flex-page">
			<h1 class="titre"><?= $groupe[$_GET['id']]['nom']; ?></h1>
			<div class="style-infos-big border">
				<?= "Description : ". $groupe[$_GET['id']]['description']; ?>
			</div>
			<div class="style-infos-small border">
				<?= "Prix : ". $groupe[$_GET['id']]['cout']. " €"; ?>
			</div>
			<div class="style-infos-small border">
				<?= "Pays d'origine : ". $groupe[$_GET['id']]['pays_origine']; ?>
			</div>
			<div class="style-infos-big border">
				<?= "Musiciens : ". $groupe[$_GET['id']]['musiciens']; ?>
			</div>
			<div class="style-infos-email border">
				<?= "Email : ". $groupe[$_GET['id']]['email']; ?>
			</div>
			<div>
				<img class ="style-infos-image border" src="<?= $groupe[$_GET['id']]['photo']; ?>">
			</div>
			<div>
				<a href="edit.php?id=<?=$_GET['id'];?>"><input class="button-submit" type="button" value="Cliquez-ici pour éditer"></a>
				<a href="delete.php?id=<?=$_GET['id'];?>"><input class="button-submit" type="button" value="Cliquez-ici pour delete"></a>
			</div>
		</div>
	</div>
</body>
</html>