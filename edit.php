<?php

	include "constants.php";
	include "connect_bdd.php";

	$sth = $dbh->prepare("SELECT id, nom, description, cout, pays_origine, musiciens, email, photo FROM groupe");
	$sth->execute();
	$groupe = $sth->fetchAll();

	if(isset($_GET['msg'])){
		if($_GET['msg'] == SUCCESSFULLY_MODIFIED){
			echo "<script>alert(\"Le groupe a bien été modifié !\")</script>";
		}
	}

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		if(isset($_POST['button_edit'])){
			$sth = $dbh->prepare("UPDATE groupe SET nom=:nom, description=:description, cout=:cout, pays_origine=:pays, musiciens=:musiciens, email=:email, photo=:image WHERE id=:id");
			$isNotError = $sth->execute(['nom' => $_POST['nom'], 'description' => $_POST['desc'], 'cout' => $_POST['cout'], 'pays' => $_POST['pays'], 'musiciens' => $_POST['musiciens'], 'email' => $_POST['email'], 'image' => $_POST['image'], 'id' => $_POST['id']]);

			if($isNotError){
				header("Location: edit.php?msg=". SUCCESSFULLY_MODIFIED."&id=$_POST[id_page]");
				exit();
			} else{
				print_r($sth->errorInfo());
			}
			
		} 
	}

	function data_pays($continent, $groupe){ 
		include "connect_bdd.php";
		$sth = $dbh->prepare("SELECT nom_pays, continent FROM pays WHERE continent=:continent");
		$isNotError = $sth->execute(['continent' => $continent]);
		$pays = $sth->fetchAll(PDO::FETCH_ASSOC);

		for($i = 0; $i < count($pays); $i++){ ?>
			<option value="<?= $pays[$i]['nom_pays'];?>" <?= ($groupe[$_GET['id']]['pays_origine'] == $pays[$i]['nom_pays']) ? "selected" : '';?>><?= $pays[$i]['nom_pays'];?></option><?php
		} 
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header class="head">
		<a href='index.php' class="button-header">HOME</a>
		<a href='create.php' class="button-header">CREATE</a>
	</header>
	<div class="page">
		<form class="flex-page" method="POST" action="edit.php">
				<input type="text" class="style-input" name="nom" value="<?= $groupe[$_GET['id']]['nom']; ?>" size="50" required>

				<textarea name="musiciens" class="style-input" maxlength="255" rows="10" cols="50" required><?= $groupe[$_GET['id']]['musiciens']; ?></textarea>

				<input type="email" class="style-input" name="email" value="<?= $groupe[$_GET['id']]['email'];?>" size="50" required>

				<textarea name="desc" class="style-input" maxlength="255" rows="10" cols="50" required><?= $groupe[$_GET['id']]['description'];?></textarea>

				<input type="number" class="style-input" name="cout" min="0" step=".01" value="<?= $groupe[$_GET['id']]['cout'];?>" size="50" required>

				<select class="choisir_pays" name="pays" id="pays" required>
					<option value="" disabled <?= ($groupe[$_GET['id']]['pays_origine'] == NULL) ? "selected" : '';?>>Choisissez un pays</option>
					<optgroup label="Europe">
						<?php data_pays('Europe', $groupe); ?>
					</optgroup>
					<optgroup label="Amérique">
						<?php data_pays('Amérique', $groupe); ?>
					</optgroup>
					<optgroup label="Afrique">
						<?php data_pays('Afrique', $groupe) ?>
					</optgroup>
					<optgroup label="Asie">
						<?php data_pays('Asie', $groupe); ?>
					</optgroup>
				</select>

				<input type="url" class="style-input" name="image" value="<?= $groupe[$_GET['id']]['photo'];?>" size="50" required>

				<input type="hidden" name="id" value="<?= $groupe[$_GET['id']]['id']; ?>">

				<input type="hidden" name="id_page" value="<?= $_GET['id']; ?>">

				<input class="button-submit" type="submit" name="button_edit" value="Edit" onclick="return confirm('Voulez-vous vraiment modifier le groupe ?')">
		</form>
	</div>
</body>
</html>