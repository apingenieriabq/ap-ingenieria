<?php
class DocumentosAP extends ModeloDatos
{


  public function __construct($documentoID = null) {
    return parent::__construct('DocumentosAP', 'documentoID', $documentoID);
  }

  public function todosSinProceso($documentoPUBLICADO = 'SI'){
    return $this->todos([ 'procesoID' => null, 'documentoPUBLICADO' => $documentoPUBLICADO ]);
  }

  public function todosSinProcesoDelUsuario($documentoPUBLICADO = 'SI'){
    return $this->todos([ 'procesoID' => null, 'documentoPUBLICADO' => $documentoPUBLICADO ]);
  }

  public function todosDelProceso($procesoID, $documentoPUBLICADO = 'SI'){
    return $this->todos([ 'procesoID' => $procesoID, 'documentoPUBLICADO' => $documentoPUBLICADO ]);
  }

  public function todosConProcesoDelUsuario($procesoID, $documentoPUBLICADO = 'SI'){
    return $this->todos([ 'procesoID' => $procesoID, 'documentoPUBLICADO' => $documentoPUBLICADO ]);
  }

  public function nuevo( $procesoID, $documentoVERSION , $documentoPUBLICADO , $documentoNOMBRE , $documentoCONTENIDO ,
    $documentoURL , $documentoRESPONSABLE , $documentoOBSERVACIONES){

    $Proceso = new ProcesosAP($procesoID);
    $CantDocumentos = count($this->todosDelProceso($procesoID));
    echo $documentoCODIGO = $Proceso->procesoCODIGO."-".str_pad($Proceso->procesoID,2,"0",STR_PAD_LEFT)."".str_pad($CantDocumentos, 3, "0", STR_PAD_LEFT);

    return $this->insertar([ 'procesoID' => $procesoID ,
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
