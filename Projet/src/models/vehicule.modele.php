<?php
require_once('../src/config/Database.php');

// $Vehicule1 = new VehiculeModel();
// $Vehicule1->insert(1,"Test","test","PHP","Meilleur langage du monde","/upload/blabla",300);
class VehiculeModel
{
  private $connexion;
  public function __construct()
  {
    $db = new Database();
    $this->connexion = $db->getPDO();
  }

  public function insert($IDAgence, $titreVehicule, $marqueVehicule, $modeleVehicule, $descriptionVehicule, $photoVehicule, $prixVehicule)
  {
    var_dump($IDAgence, $titreVehicule, $marqueVehicule, $modeleVehicule, $descriptionVehicule, $photoVehicule, $prixVehicule);
    var_dump('Test model');

    $request = $this->connexion->prepare('INSERT INTO vehicule 
    (id_agence, titre_vehicule, marque, modele, description, photo, prix_journalier)
     VALUES 
    (:id_agence, :titre_vehicule, :marque, :modele, :description, :photo, :prix_journalier)');


    // 'INSERT INTO vehicule (id_agence, titre_vehicule, marque, model, description, photo, prix_journalier) VALUES (:id_agence, :titre_vehicule, :marque, :modele, :description, :photo, :prix_journalier)'
    //

    $request->execute([
      ":id_agence"=> $IDAgence,
      ":titre_vehicule" => $titreVehicule,
      ":marque" => $marqueVehicule,
      ":modele" => $modeleVehicule,
      ":description" => $descriptionVehicule,
      ":photo" => $photoVehicule,
      ":prix_journalier" => $prixVehicule
    ]);
  }

//   public function getOne($IDAgence){
//   $request = $this->connexion->prepare('SELECT id_agence FROM agences WHERE id_agence=1');
//   var_dump($request); 
//   $request->execute([
//       ':id_agence' => $IDAgence
//   ]);
// }
}

