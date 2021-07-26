<?php

class AgenceModel{
  
  private $connexion;

  public function __construct()
  {
    $db= new Database();
    $this->connexion=$db->getPDO();
  }
  
}

require_once('./Emerick/src/config/Database.php');

