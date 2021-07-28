<?php
require_once('../src/controllers/vehicule.controller.php');
require_once('../src/models/vehicule.model.php');


if (!empty($_POST['titre']) && !empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['prix']) && !empty($_POST['description']) && !empty($_FILES['photo'])) {
  if (isset($_FILES['photo'])) {

    $tmpName = $_FILES['photo']['tmp_name'];
    $name = $_FILES['photo']['name'];

    $extensions = ['image/jpg', 'image/png', 'image/jpeg'];
    if (in_array($_FILES['photo']['type'], $extensions)) {
      move_uploaded_file($tmpName, './upload/' . $name);

      $vehicule = new VehiculeController($_POST['id_agence'],$_POST['titre'], $_POST['marque'], $_POST['modele'], $_POST['description'], './upload/' . $name, $_POST['prix']);
      $vehicule->inscription();
    } else {
      echo "Mauvaise extension";
    }
  }
}

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

  <form action="vehicule.php" method="post" enctype="multipart/form-data">
    
  <select name="id_agence">
      <option value="1">Agence Paris</option>
      <option value="2">Agence Lyon</option>

    </select>
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

    <button>Enregistrer</button>

  </form>
</body>

</html>