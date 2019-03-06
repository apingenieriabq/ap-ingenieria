<?php

class Cargos extends ModeloDatos {

  public function __construct($cargoID = null) {
    parent::__construct('Cargos', 'cargoID', $cargoID);
  }

}