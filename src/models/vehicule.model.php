<?php

class VehiculeModel
{
  private $connexion;
  public function __construct()
  {
    $db = new Database();
    $this->connexion = $db->getPDO();
  }

  public function insert($titreVehicule, $marqueVehicule, $modeleVehicule, $descriptionVehicule, $photoVehicule, $prixVehicule)
  {
    var_dump($titreVehicule, $marqueVehicule, $modeleVehicule, $descriptionVehicule, $photoVehicule, $prixVehicule);

    $request = $this->connexion->prepare("INSERT INTO vehicule(titre_vehicule, marque,modele,description, photo, prix_journalier) VALUES(:titre_vehicule, : marque, :modele, :description, :photo, :prix_journalier");

    $request->execute([
      ":titre_vehicule" => $titreVehicule,
      ":adresse" => $marqueVehicule,
      ":modele" => $modeleVehicule,
      ":description" => $descriptionVehicule,
      ":photo" => $photoVehicule,
      ":prix_journalier" => $prixVehicule
    ]);
  }
}

require_once('../src/config/Database.php');


