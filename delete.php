<?php
	include "constants.php";
	include "connect_bdd.php";

	$sth = $dbh->prepare("SELECT id, nom, description, cout, pays_origine, musiciens, email, photo FROM groupe");
	$sth->execute();
	$groupe = $sth->fetchAll(PDO::FETCH_ASSOC);

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		if(isset($_POST['button_delete'])){
			$sth = $dbh->prepare("DELETE FROM groupe WHERE id=:id");
			$isNotError = $sth->execute(['id' => $_POST['id']]);
			if ($isNotError) {
				header("Location: index.php?msg=". SUCCESSFULLY_DELETED);
				exit();
			} else{
				print_r($sth->errorInfo());
			}
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete</title>
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
			<form class="flex-page" method="POST" action="delete.php">
				<input type="hidden" name="id" value="<?= $groupe[$_GET['id']]['id']; ?>">
				<div>
					<input class="button-submit margin" type="submit" name="button_delete" value="Delete" onclick="return confirm('Voulez-vous vraiment supprimer le groupe ?')">
				</div>
			</form>
</body>
</html>