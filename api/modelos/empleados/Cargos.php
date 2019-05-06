<?php

class Cargos extends ModeloDatos {

  public function __construct($cargoID = null) {
    return parent::__construct('Cargos', 'cargoID', $cargoID);
  }

}