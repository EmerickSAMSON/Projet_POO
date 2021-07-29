<?php
require_once('../src/models/agence.model.php');
//require_once('../src/controllers/agence.controller.php');
require_once('../src/controllers/vehicule.controller.php');
require_once('../src/models/vehicule.model.php');


if (!empty ($_POST['titre']) && !empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['prix']) && !empty($_POST['description']) && !empty($_FILES['photo'])) {
  if (isset($_FILES['photo'])) {
//RAJOUT DE $_GET !empty($_GET['titre_agence']) &&


    $tmpName = $_FILES['photo']['tmp_name'];
    $name = $_FILES['photo']['name'];

    $extensions = ['image/jpg', 'image/png', 'image/jpeg'];
    if (in_array($_FILES['photo']['type'], $extensions)) {
      move_uploaded_file($tmpName, './upload/' . $name);

      $vehicule = new VehiculeController($_GET['id_agence'], $_POST['titre'], $_POST['marque'], $_POST['modele'], $_POST['description'], './upload/' . $name, $_POST['prix']);
      $vehicule->inscription();
    } else {
      echo "Mauvaise extension";
    }
  }
}

$result = new AgenceModel;
// var_dump($result);
$results=$result->read();
// echo '<pre>';
// var_dump($results);
// echo '</pre>';

$resultOne = new VehiculeModel;
$resultUn = $resultOne->read();
// echo '<pre>';
// var_dump($resultUn);
// echo '</pre>';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des véhicules</title>
</head>

<body>
  <h1>Gestion des véhicules</h1>
<form method="get" action="vehicule.php">
<select name="id_agence">
      <option>--Selection Agence--</option>
      <?php foreach ($results as $values):?>
      <option value="<?=$values['id_agence'];?>"><?= $values["titre_agence"];?></option>
      <?php endforeach;?>
    </select>
    <button>Rediriger vers l'agence</button>
</form>

<br>
<form action="vehicule.php?id_agence=<?=$_GET['id_agence'] ?>" method="post" enctype="multipart/form-data">
    <label for="titre">Titre</label>
    <input type="text" id="titre" name="titre" placeholder="Titre de l'annonce">

    <label for="marque">Marque</label>
    <input type="text" id="marque" name="marque" placeholder="Marque">

    <label for="modele">Modele</label>
    <input type="text" id="modele" name="modele" placeholder="Modele">

    <label for="prix">Prix</label>
    <input type="text" id="prix" name="prix" placeholder="Prix journalier">


    <label for="description">Description</label>
    <input type="text" id="description" name="description">
    <br>

    <label for="photo">Photo</label>
    <input type="file" id="photo" name="photo">
    <br>
    <br>
    <br>
    <br>
    <br>
<!--FAIRE TABLEAU -->
    <button>Enregistrer</button>

  </form>
</body>

</html>