<?php

require_once('../src/controllers/membre.controller.php');
require_once('../src/models/membre.model.php');

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// commentaire 

if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty(['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])){

    $membre = new MembreController($_POST['pseudo'],$_POST['pass'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['civilite'],$_POST['statut']);

    // 
    $membre->inscription();

    // echo '<pre>';
    // print_r($membre);
    // echo '</pre>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/styles.css">
  <title>Gestion des Membres</title>
</head>
<body>

<?php 

include_once('./template/header.php');

?>

<form action="membre.php" method="post" enctype="multipart/form-data">

<h1>Gestion des Membres</h1>

<div>
  
  
  <label for="pseudo">Pseudo</label>
  <input type="text" id="pseudo" name="pseudo">
  
</div>
<div>
  
  <label for="pass">Pass</label>
  <input type="password" id="Pass" name="pass">
  

  </div>
  <div>
    
    <label for="nom">Nom</label>
    <input type="text" id="Nom" name="nom">
    
    
  </div>
  <div>
    
    <label for="prenom">Prenom</label>
    <input type="text" id="prenom" name="prenom">
    
    
  </div>
  <div>
    
    <label for="email">Email</label>
    <input type="email" id="email" name="email">


  </div>
  <div>
    
    <select name="civilite" id="">
        <option value="">-- Civilité --</option>
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
      </select>


  </div>
  <div>

    <select name="statut" id="">
      <option value="">-- Statut --</option>
      <option value="admin">Admin</option>
      <option value="membre">Membre</option>
    </select>


  </div>
  
  
  <button>Enregistrer</button>
	</form>




  <br>
  <br>
  <br>
  <br>
  <br>



  
</body>
</html>