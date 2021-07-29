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
  public function read(){ //rajout de a.titre_agence en tant que test
    $request = $this->connexion->prepare('SELECT * FROM vehicule LEFT JOIN agences ON vehicule.id_agence = agences.id_agence');
  $request->execute(/*[":id_agence"=>$_GET['titre_agence']]*/);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}

