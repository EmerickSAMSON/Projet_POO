<?php

require_once('../src/controllers/voiture.controller.php');
require_once('../src/models/voiture.model.php');

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
  <form action="voiture.php" method="post" enctype="multipart/form-data">

  <label for="titre">Titre</label>
  <input type="text" id="titre" name="titre" placeholder="Titre de l'annonce">

  <label for="marque">Marque</label>
  <input type="text" id="marque" name="marque" placeholder="Marque">

  <label for="modele">Modele</label>
  <input type="text" id="modele" name="modele" placeholder="Modele">

  <label for="prix">Prix</label>
  <input type="text" id="prix" name="prix" placeholder="Prix journalier">
 

  <label for="description">Description</label>
  <textarea id="description" name="description">Description de votre véhicule</textarea>

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