<?php

class Colaboradores extends ModeloDatos {


  function todosCompletos(){
    $Colaboradores = $this->todos();
    $ColaboradoresCompletos = array();
    foreach($Colaboradores as $i => $Colaborador){
    $NewColaborador = new Colaboradores();
      $ColaboradoresCompletos[$i] = $NewColaborador->datosCompletos($Colaborador->colaboradorID);
    }
    return $ColaboradoresCompletos;
   }

  function conCargo($cargoID){
    $Colaboradores = $this->todos(['cargoID' => $cargoID]);
    foreach($Colaboradores as $i => $Colaborador){
      $Colaboradores[$i] = $this->datosCompletos($Colaborador->colaboradorID);
    }
    return $Colaboradores;
   }

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
      $this->Persona = new Personas($Colaborador->personaID);
      $this->Cargo = new Cargos($Colaborador->cargoID);
      $this->JefeInmediato = new Colaboradores($Colaborador->colaboradorJEFEINMEDIATO);
      $this->Aprobador = new Colaboradores($Colaborador->colaboradorAPROBADOR);
      $this->Usuario = new Usuarios();
      $this->Usuario->porColaboradorID($colaboradorID);
    }
    return $this;
   }

  public function __construct($colaboradorID = null) {
    if(filter_var($colaboradorID, FILTER_VALIDATE_EMAIL)){
      parent::__construct('Colaboradores', 'colaboradorID', null);
      $this->datos(['colaboradorEMAIL' => $colaboradorID]);
      $colaboradorID = $this->colaboradorID;
    }else{
      if(filter_var($colaboradorID, FILTER_VALIDATE_INT)){
        parent::__construct('Colaboradores', 'colaboradorID', $colaboradorID);
      }else{
        parent::__construct('Colaboradores', 'colaboradorID', null);
      }
    }

    if(!is_null($colaboradorID)){
      // $this->datosCompletos($colaboradorID);
    }
    return $this;
  }

  public function crear($cargoID, $personaID, $tipoColaboradorID, $colaboradorEMAIL, $colaboradorEXTENSION, $colaboradorCELULAR, $colaboradorFCHINGRESO, $colaboradorFOTO, $colaboradorFIRMA, $colaboradorJEFEINMEDIATO, $colaboradorAPROBADOR){

    if(!empty($personaID)){
      $this->colaboradorID = $this->insertar([
        'personaID' => $personaID,
        'cargoID' => $cargoID,
        'tipoColaboradorID' => $tipoColaboradorID,
        'colaboradorEMAIL' => $colaboradorEMAIL,
        'colaboradorEXTENSION' => $colaboradorEXTENSION,
        'colaboradorCELULAR' => $colaboradorCELULAR,
        'colaboradorFCHINGRESO' => $colaboradorFCHINGRESO,
        'colaboradorFOTO' => $colaboradorFOTO,
        'colaboradorFIRMA' => $colaboradorFIRMA,
        'colaboradorJEFEINMEDIATO' => $colaboradorJEFEINMEDIATO,
        'colaboradorAPROBADOR' => $colaboradorAPROBADOR
      ]);

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