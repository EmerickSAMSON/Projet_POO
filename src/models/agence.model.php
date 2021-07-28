<?php

class AgenceModel
{

  private $connexion;

  public function __construct()
  {
    $db = new Database();
    $this->connexion = $db->getPDO();
  }

  public function insert($titreAgence, $adresseAgence, $villeAgence, $descriptionAgence, $cpAgence, $photoAgence)
  {
    var_dump($titreAgence, $adresseAgence, $villeAgence, $descriptionAgence, $cpAgence, $photoAgence);

    $request = $this->connexion->prepare("INSERT INTO agences (titre_agence, adresse, ville, description, cp, photo, date_created) VALUES (:titre_agence, :adresse, :ville, :description, :cp, :photo, NOW())");

    $request->execute([
      ":titre_agence" => $titreAgence,
      ":adresse" => $adresseAgence,
      ":ville" => $villeAgence,
      ":description" => $descriptionAgence,
      ":cp" => $cpAgence,
      ":photo" => $photoAgence
    ]);
  }
}

require_once('../src/config/Database.php');
