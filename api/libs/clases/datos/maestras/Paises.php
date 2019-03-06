<?php

class Paises extends ModeloDatos {


  public function __construct($paisID = null) {
    parent::__construct('Paises', 'paisID', $paisID);
  }

}