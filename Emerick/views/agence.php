
<?php

require_once('../src/controllers/agence.controller.php');
require_once('../src/models/agence.model.php');

if (!empty($_POST['titre']) && !empty($_POST['adresse']) && !empty(['description']) && !empty($_POST['ville']) && !empty($_POST['cp']) && !empty($_FILES['file'])) {

  $tmpName = $_FILES['file']['tmp_name'];
  $name = $_FILES['file']['name'];

  move_uploaded_file($tmpName, './upload/' . $name);

  $Agence = new AgenceController($_POST['titre'],$_POST['adresse'],$_POST['description'],$_POST['ville'],$_POST['cp'],$_FILES);
  
  $Agence->inscription();

  // echo '<pre>';
  // print_r($Agence);
  // echo '</pre>';
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Agences</title>
</head>
<body>

  <form action="agence.php" method="post" enctype="multipart/form-data">

  <h1>Gestion des Agences</h1>

  <label for="titre">Titre</label>
  <input type="text" id="titre" name="titre">

  <label for="adresse">Adresse</label>
  <input type="text" id="adresse" name="adresse">

  <label for="description">description</label>
  <input type="text" id="description" name="description">

  <label for="ville">Ville</label>
  <input type="text" id="ville" name="ville">

  <label for="cp">Code Postal</label>
  <input type="text" id="cp" name="cp">

  <label for="photo">Photo</label>
  <input type="file" id="photo" name="photo">

  <br>
  <br>
  <br>
  <br>
  <br>

  <button>Enregistrer</button>


  <?php

  // echo '<pre>';
  // print_r($Agence);
  // print_r(get_declared_classes());
  // echo '</pre>';

?>



  </form>











  
</body>
</html>