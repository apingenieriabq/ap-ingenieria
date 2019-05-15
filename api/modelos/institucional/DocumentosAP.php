<?php
class DocumentosAP extends ModeloDatos
{


  public function __construct($documentoID = null) {
    return parent::__construct('DocumentosAP', 'documentoID', $documentoID);
  }


  public function actualizarIMAGEN($documentoIMAGEN, $documentoID = null){
    if(is_null($documentoID)){
      $documentoID = $this->documentoID;
    }
    return $this->actualiza([ 'documentoIMAGEN' => $documentoIMAGEN], [ 'documentoID' => $documentoID] );
  }


  public function todosSinProceso($documentoPUBLICADO = null){
    if(!is_null($documentoPUBLICADO)){
      return $this->todos([ 'procesoID' => null, 'documentoPUBLICADO' => $documentoPUBLICADO ]);
    }
    return $this->todos([ 'procesoID' => null]);
  }

  public function todosSinProcesoDelUsuario(){
    return $this->todos([ 'procesoID' => null]);
  }

  public function todosDelProceso($procesoID, $documentoPUBLICADO = null){
    if(!is_null($documentoPUBLICADO)){
      return $this->todos([ 'procesoID' => $procesoID, 'documentoPUBLICADO' => $documentoPUBLICADO ]);
    }
    return $this->todos([ 'procesoID' => $procesoID]);
  }

  public function todosConProcesoDelUsuario($procesoID, $documentoPUBLICADO = null){
    if(!is_null($documentoPUBLICADO)){
      return $this->todos([ 'procesoID' => $procesoID, 'documentoPUBLICADO' => $documentoPUBLICADO ]);
    }
    return $this->todos([ 'procesoID' => $procesoID]);
  }

  public function nuevo( $procesoID, $documentoVERSION , $documentoPUBLICADO , $documentoNOMBRE , $documentoCONTENIDO ,
    $documentoURL , $documentoRESPONSABLE , $documentoOBSERVACIONES){

    $Proceso = new ProcesosAP($procesoID);
    $CantDocumentos = count($this->todosDelProceso($procesoID));
    $documentoCODIGO = $Proceso->procesoCODIGO."-".str_pad($Proceso->procesoID,2,"0",STR_PAD_LEFT)."".str_pad($CantDocumentos, 3, "0", STR_PAD_LEFT);
    $nuevo = $this->insertar([ 'procesoID' => $procesoID ,
          'documentoCODIGO' => $documentoCODIGO ,
          'documentoVERSION' => $documentoVERSION ,
          'documentoPUBLICADO' => $documentoPUBLICADO ,
          'documentoNOMBRE' => $documentoNOMBRE ,
          'documentoCONTENIDO' => $documentoCONTENIDO ,
          'documentoURL' => $documentoURL ,
          'documentoRESPONSABLE' => $documentoRESPONSABLE ,
          'documentoOBSERVACIONES' => $documentoOBSERVACIONES,
          'documentoUSRCREACION' => Usuario::id(),
          'documentoUSRACTUALIZACION' => Usuario::id()
        ]);
    return $this->porID($nuevo);
  }




    public static function guardar($documentoCODIGO, $documentoTITULO, $documentoDESCRIPCION, $documentoRESPONSABLE)
    {
        $sqlQuery = DocumentosSQL::CREAR_REGISTRO;
        return BasededatosAP::insertFila($sqlQuery,array($documentoCODIGO, $documentoTITULO, $documentoDESCRIPCION, $documentoRESPONSABLE, Usuario::usuarioID()));
    }

    public static function actualizar($documentoID, $documentoCODIGO, $documentoTITULO, $documentoDESCRIPCION, $documentoRESPONSABLE)
    {
        $sqlQuery = DocumentosSQL::ACTUALIZAR_REGISTRO;
        return BasededatosAP::actualizarFila(
            $sqlQuery,
            array(
            $documentoCODIGO, $documentoTITULO, $documentoDESCRIPCION, $documentoRESPONSABLE, Usuario::usuarioID(), $documentoID
            )
        );
    }

    /**
     * Recibe un identificador de ControlConsecutivos y elimina el registro.
     * @param int $consecutivosID Identificador del registro
     * ha eliminar.
     * @return int Cantidad de registros eliminados
     */
    public static function eliminar($documentoID)
    {
        $sqlQuery = DocumentosSQL::ELIMINAR_REGISTRO;
        return BasededatosAP::actualizarFila($sqlQuery, array($documentoID));
    }


}
