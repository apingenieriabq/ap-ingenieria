<?php

class Colaboradores extends ModeloDatos {


  function datosPorCedula($cedulaCOLABORADOR){
    $SQL = 'SELECT `Colaboradores`.colaboradorID FROM `Colaboradores` INNER JOIN `Personas` ON (`Colaboradores`.`personaID` = `Personas`.`personaID`) WHERE `Personas`.personaIDENTIFICACION = :cedula ';
    $Colaborador = $this->consultaUNO(
      $SQL, [ ':cedula' => $cedulaCOLABORADOR]
    );
    if(!is_null($Colaborador)){
      $Colaborador = $this->datosCompletos($Colaborador->colaboradorID);
    }
    return $Colaborador;
   }

  function datosPorCorreo($colaboradorEMAIL = null){
    if(is_null($colaboradorEMAIL)){
      $colaboradorEMAIL =  $this->colaboradorEMAIL;
    }
    $Colaborador = $this->datos([ 'colaboradorEMAIL' => $colaboradorEMAIL]);
    if(!is_null($Colaborador)){
      $Colaborador = $this->datosCompletos($Colaborador->colaboradorID);
    }
    return $Colaborador;
   }

  function usuarioAsociado($colaboradorID = null){
    $Colaborador = $this->consulta([ 'colaboradorID' => $colaboradorID]);
    if(!is_null($Colaborador)){
      $Colaborador = $this->datosCompletos($Colaborador->colaboradorID);
    }
    return $Colaborador;
   }

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
      if(isset($this->cargoID)) $this->Cargo = new Cargos($this->cargoID);
      if(isset($this->personaID)) $this->Persona = new Personas($this->personaID);
    }
    return $this;
  }

  public function crear($cargoID, $personaID, $tipoColaboradorID, $colaboradorEMAIL, $colaboradorFCHINGRESO, $colaboradorEXTENSION, $colaboradorCELULAR, $colaboradorFIRMA, $colaboradorFOTO, $colaboradorJEFEINMEDIATO, $colaboradorAPROBADOR){

    if(!empty($personaID)){
      $this->colaboradorID = $this->insertar([
        'personaID' => $personaID,
        'cargoID' => $cargoID,
        'tipoColaboradorID' => $tipoColaboradorID,
        'colaboradorEMAIL' => $colaboradorEMAIL,
        'colaboradorFCHINGRESO' => $colaboradorFCHINGRESO,
        'colaboradorEXTENSION' => $colaboradorEXTENSION,
        'colaboradorCELULAR' => $colaboradorCELULAR,
        'colaboradorFIRMA' => $colaboradorFIRMA,
        'colaboradorFOTO' => $colaboradorFOTO,
        'colaboradorJEFEINMEDIATO' => $colaboradorJEFEINMEDIATO,
        'colaboradorAPROBADOR' => $colaboradorAPROBADOR
      ]);

      if( !empty($this->colaboradorID) ){
        $colaboradorCLAVETEMPORAL =  hash('crc32', $colaboradorEMAIL);
        $Usuario = new Usuarios();
        $Usuario->nuevo( $colaboradorEMAIL, $colaboradorCLAVETEMPORAL, $this->colaboradorID );
        $this->datosCompletos($this->colaboradorID);
        $this->colaboradorCLAVETEMPORAL = $colaboradorCLAVETEMPORAL;
      }
    }
  }

  function modificar($cargoID, $personaID, $tipoColaboradorID, $colaboradorEMAIL, $colaboradorFCHINGRESO, $colaboradorEXTENSION, $colaboradorCELULAR, $colaboradorFIRMA, $colaboradorFOTO, $colaboradorJEFEINMEDIATO, $colaboradorAPROBADOR){
    $actualizo = $this->actualiza([
        'personaID' => $personaID,
        'cargoID' => $cargoID,
        'tipoColaboradorID' => $tipoColaboradorID,
        'colaboradorEMAIL' => $colaboradorEMAIL,
        'colaboradorFCHINGRESO' => $colaboradorFCHINGRESO,
        'colaboradorEXTENSION' => $colaboradorEXTENSION,
        'colaboradorCELULAR' => $colaboradorCELULAR,
        'colaboradorFIRMA' => $colaboradorFIRMA,
        'colaboradorFOTO' => $colaboradorFOTO,
        'colaboradorJEFEINMEDIATO' => $colaboradorJEFEINMEDIATO,
        'colaboradorAPROBADOR' => $colaboradorAPROBADOR
        ] , ['colaboradorID' => $this->colaboradorID]
      );

      if( $actualizo ){
        $Usuario = new Usuarios();
        $Usuario->cambiarNombreParaColaborador( $colaboradorEMAIL, $this->colaboradorID );
        $this->datosCompletos($this->colaboradorID);
      }

      return $actualizo;

  }

  function activar(){
    $actualizo = $this->actualiza(
      ['colaboradorESTADO' => ColaboradoresEstados::ACTIVO], ['colaboradorID' => $this->colaboradorID]
    );

      if( $actualizo ){
        $Usuario = new Usuarios();
        $Usuario->activarParaColaborador( $this->colaboradorID );
        $this->datosCompletos($this->colaboradorID);
      }
      return $actualizo;
  }
  function desactivar(){
    $actualizo = $this->actualiza(
      ['colaboradorESTADO' => ColaboradoresEstados::DESACTIVO], ['colaboradorID' => $this->colaboradorID]
    );
    if( $actualizo ){
        $Usuario = new Usuarios();
        $Usuario->desactivarParaColaborador( $this->colaboradorID );
        $this->datosCompletos($this->colaboradorID);
      }
      return $actualizo;
  }
  function suspender(){
    $actualizo = $this->actualiza(
      ['colaboradorESTADO' => ColaboradoresEstados::SUSPENDIDO], ['colaboradorID' => $this->colaboradorID]
    );
    if( $actualizo ){
        $Usuario = new Usuarios();
        $Usuario->suspenderParaColaborador( $this->colaboradorID );
        $this->datosCompletos($this->colaboradorID);
      }
      return $actualizo;
  }

}