<?php

class Colaboradores extends ModeloDatos {


  function datosCompletos($colaboradorID = null){
    if(is_null($colaboradorID)){
      $colaboradorID =  $this->colaboradorID;
    }
    $Colaborador = $this->porID($colaboradorID);
    if(!empty($Colaborador)){
      $Colaborador->Cargo = new Cargos($this->colaboradorID);
      $Colaborador->Persona = new Personas($this->colaboradorID);
      $Colaborador->JefeInmediato = new Colaboradores($this->colaboradorJEFEINMEDIATO);
    }
    return $Colaborador;
   }

  public function __construct($colaboradorID = null) {
    $this->nombreTabla = 'Colaboradores';
    $this->nombreCampoID = 'colaboradorID';
    $this->colaboradorID = $colaboradorID;
    $this->datos();
  }

}