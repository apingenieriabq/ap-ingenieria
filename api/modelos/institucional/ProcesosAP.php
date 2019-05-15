<?php
class ProcesosAP extends ModeloDatos
{


  public function __construct($procesoID = null) {
    return parent::__construct('ProcesosAP', 'procesoID', $procesoID);
  }


    private static function generarCodigo($procesoTITULO){
        return strtoupper( substr ( $procesoTITULO , 0, 4 ) );
    }

    public function guardarSoloTitulo($procesoTITULO)
    {
        $procesoCODIGO = self::generarCodigo($procesoTITULO);
        $procesoID = $this->insertar([
            'procesoCODIGO' => $procesoCODIGO,
            'procesoTITULO' => $procesoTITULO,
            'procesoUSRCREA'=> Usuario::id()
        ]);
        return $this->porID($procesoID);
    }

    public static function guardar($procesoCODIGO, $procesoTITULO, $procesoDESCRIPCION, $procesoRESPONSABLE)
    {
        $sqlQuery = ProcesosSQL::CREAR_REGISTRO;
        return BasededatosAP::insertFila($sqlQuery,array($procesoCODIGO, $procesoTITULO, $procesoDESCRIPCION, $procesoRESPONSABLE, Usuario::usuarioID()));
    }

    public static function actualizar($procesoID, $procesoCODIGO, $procesoTITULO, $procesoDESCRIPCION, $procesoRESPONSABLE)
    {
        $sqlQuery = ProcesosSQL::ACTUALIZAR_REGISTRO;
        return BasededatosAP::actualizarFila(
            $sqlQuery,
            array(
            $procesoCODIGO, $procesoTITULO, $procesoDESCRIPCION, $procesoRESPONSABLE, Usuario::usuarioID(), $procesoID
            )
        );
    }

    /**
     * Recibe un identificador de ControlConsecutivos y elimina el registro.
     * @param int $consecutivosID Identificador del registro
     * ha eliminar.
     * @return int Cantidad de registros eliminados
     */
    public static function eliminar($procesoID)
    {
        $sqlQuery = ProcesosSQL::ELIMINAR_REGISTRO;
        return BasededatosAP::actualizarFila($sqlQuery, array($procesoID));
    }

    public static function asignarAplicacion($aplicacionID, $procesoID)
    {
        $sqlQuery = ProcesosSQL::ASIGNAR_APLICACION;
        return BasededatosAP::insertFila(
            $sqlQuery,
            array(
               $aplicacionID, $procesoID, Usuario::usuarioID()
            )
        );
    }

    public static function eliminarAsignacionAplicacion($aplicacionID, $procesoID)
    {
        $sqlQuery = ProcesosSQL::ELIMINAR_REGISTRO_ASIGNACION_APLICACION;
        return BasededatosAP::actualizarFila($sqlQuery, array($aplicacionID, $procesoID));
    }
}
