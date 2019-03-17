<?php
class Personas extends ModeloDatos {
  public function __construct($personaID = null) {
    return parent::__construct('Personas', 'personaID', $personaID);
  }
}