<?php 
	
	include "constants.php";
	include "connect_bdd.php";

	$i = 0;

	if(isset($_GET['msg'])){
		if($_GET['msg'] == SUCCESSFULLY_CREATED){
			echo "<script>alert(\"Le groupe a bien été créé !\")</script>";
		} elseif($_GET['msg'] == ERROR_OCCURED){
			echo "<script>alert(\"Une erreur est survenue\")</script>";
		} elseif($_GET['msg'] == SUCCESSFULLY_DELETED){
			echo "<script>alert(\"Le groupe a bien été supprimé !\")</script>";
		}
	}

	$sth = $dbh->prepare("SELECT photo, nom FROM groupe;");
	$sth->execute();
	$groupes = $sth->fetchAll(PDO::FETCH_ASSOC);

	?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<header class="head">
		<a href='index.php' class="button-header">HOME</a>
		<a href='create.php' class="button-header">CREATE</a>
	</header>
	<div class="flex">
		<!-- Si il n'y a aucun groupe d'enregistré, rien ne s'affiche -->
		<?php foreach($groupes as $groupe){ ?>
			<div class="groupes border">
				<a href="show.php?id=<?= $i?>">
					<img src="<?= $groupe['photo'];?>" alt="groupe 1" class="taille-groupes">
					<p class="nom-groupes">
						<?= $groupe['nom'];?>
					</p>
				</a>
			</div>
		<?php $i++; } ?>
	</div>
</body>
</html>