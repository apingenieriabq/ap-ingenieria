<?php

class Colaboradores extends ModeloDatos {


  function datosCompletos($colaboradorID = null){
    if(is_null($colaboradorID)){
      $colaboradorID =  $this->colaboradorID;
    }
    $Colaborador = $this->porID($colaboradorID);
    if(!empty($Colaborador)){
      $this->JefeInmediato = new Colaboradores($this->colaboradorJEFEINMEDIATO);
    }
    return $this;
   }

  public function __construct($colaboradorID = null) {
    parent::__construct('Colaboradores', 'colaboradorID', $colaboradorID);
    if(!is_null($colaboradorID)){
      $this->Cargo = new Cargos($this->cargoID);
      $this->Persona = new Personas($this->personaID);
    }
  }

}