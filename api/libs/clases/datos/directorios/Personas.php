<?php
class Personas extends ModeloDatos {
  public function __construct($personaID = null) {
    parent::__construct('Personas', 'personaID', $personaID);
  }
}