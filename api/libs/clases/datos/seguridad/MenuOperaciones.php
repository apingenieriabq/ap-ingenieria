<?php

class MenuOperaciones {






    public static function delUsuario($idUsuario){
        $sqlQuery = ControlAccesoSQL::OPERACIONES_POR_USUARIO_Y_COMPONENTES
        . ' WHERE (Usuarios.usuarioID = ? OR UsuariosRol.usuarioID = ?) '
            .' ORDER BY MenuOperaciones.menuORDEN ' ;
        return BasededatosAP::selectVariasFilas($sqlQuery, array($idUsuario, $idUsuario));
    }

    public static function delMenuComponente($componenteID){
        $sqlQuery = ControlAccesoSQL::OPERACIONES_POR_COMPONENTES
            .' WHERE MenuOperaciones.componenteID = ? AND MenuOperaciones.menuMENU = "SI" '
            .' ORDER BY MenuOperaciones.menuORDEN ' ;
        return BasededatosAP::selectVariasFilas($sqlQuery, array($componenteID));
    }











    public static function ultimos30DiasUsuario( $usuarioID, $cantidad = 12 ){
        $Usos = Log::operacionesUltimos30DiasUsuario($usuarioID, $cantidad);
        $Operaciones = array();
        $contador = 0;
        if(count($Usos)){
          foreach($Usos as $UsoOperacion){
              if(empty($UsoOperacion->operacionID)) continue;
              $Operacion =  Operaciones::datosCompletos($UsoOperacion->operacionID);
              if( $Operacion->operacionACCESORAPIDO == 'SI' ){
                  array_push( $Operaciones, $Operacion);
                  $contador++;
              }
              if( $contador >= $cantidad ){
                  break;
              }
          }
        }
        return $Operaciones;
    }

    public static function masUsadasUsuario( $usuarioID, $cantidad = 12 ){
        $Usos = Log::operacionesUsadasUsuario($usuarioID, $cantidad);
        $Operaciones = array();
        $contador = 0;
        foreach($Usos as $UsoOperacion){
            if(empty($UsoOperacion->operacionID)) continue;
            $Operacion =  Operaciones::datosCompletos($UsoOperacion->operacionID);
            if( $Operacion->operacionACCESORAPIDO == 'SI' ){
                array_push( $Operaciones, $Operacion);
                $contador++;
            }
            if( $contador >= $cantidad ){
                break;
            }
        }
        return $Operaciones;
    }

    public static function todos(){
        $sqlQuery = OperacionesSQL::DATOS_COMPLETOS
            .' ORDER BY ControlOperaciones.operacionORDEN ';
        return BasededatosAP::selectVariasFilas($sqlQuery, array());
    }

    public static function datos($operacionID){
        $sqlQuery = OperacionesSQL::DATOS
            . ' WHERE ControlOperaciones.operacionID = ? ';
        return BasededatosAP::selectUnaFila($sqlQuery, array($operacionID));
    }

    public static function datosCompletos($operacionID){
        $sqlQuery = OperacionesSQL::DATOS_COMPLETOS
            . ' WHERE ControlOperaciones.operacionID = ? ';
        return BasededatosAP::selectUnaFila($sqlQuery, array($operacionID));
    }

    public static function todosDelComponente($componenteID){
        $sqlQuery = ControlAccesoSQL::OPERACIONES_POR_COMPONENTES . ' WHERE ControlComponentes.componenteID = ? '
            .'ORDER BY ControlOperaciones.operacionORDEN ';
        return BasededatosAP::selectVariasFilas($sqlQuery, array($componenteID));
    }

    public static function delControlador($controladorID){
        $sqlQuery = ControlAccesoSQL::OPERACIONES_POR_COMPONENTES
            . ' WHERE ControlControladores.controladorID = ? '
            .'';
        return BasededatosAP::selectVariasFilas($sqlQuery, array($controladorID));
    }

    public static function delMenuControlador($controladorID){
        $sqlQuery = ControlAccesoSQL::OPERACIONES_POR_COMPONENTES
            .' WHERE ControlControladores.controladorID = ? AND ControlOperaciones.operacionMENU = "SI" '
            .' ORDER BY ControlOperaciones.operacionORDEN ' ;
        return BasededatosAP::selectVariasFilas($sqlQuery, array($controladorID));
    }

    public static function delMenuPorUsuario($idUsuario, $controladorID){
        $sqlQuery = ControlAccesoSQL::OPERACIONES_POR_USUARIO_Y_COMPONENTES . ' WHERE (Usuarios.usuarioID = ? OR UsuariosRol.usuarioID = ? )'
            . 'AND ControlOperaciones.operacionMENU = "SI" AND ControlOperaciones.controladorID = ? '
            .'GROUP BY ControlOperaciones.operacionID '
            .'ORDER BY ControlOperaciones.operacionORDEN ' ;
        return BasededatosAP::selectVariasFilas($sqlQuery, array($idUsuario, $idUsuario, $controladorID));
    }

    public static function datosPorCodigo($codigoOperacion){
        $sqlQuery = ControlAccesoSQL::DATOS_COMPLETOS . 'WHERE ControlOperaciones.operacionCODIGO = ? ';
        return BasededatosAP::selectUnaFila($sqlQuery, array($codigoOperacion));
    }

    public static function datosPorCombinacion($componenteCARPETA, $controladorCLASE, $operacionFUNCION ){
        $sqlQuery = ControlAccesoSQL::DATOS_COMPLETOS .
            ' WHERE ControlComponentes.componenteCARPETA = ? '.
            ' AND ControlControladores.controladorCLASE = ? '.
            ' AND ControlOperaciones.operacionFUNCION = ? ';
        return BasededatosAP::selectUnaFila($sqlQuery, array($componenteCARPETA, $controladorCLASE, $operacionFUNCION));
    }

    //
    //
    ///
    ///
    /////
    /////
    /////////
    /////////



    public static function guardar( $controladorID , $operacionCODIGO , $operacionTITULO ,
        $operacionFUNCION , $operacionNOMBRETAB , $operacionMENU , $operacionMENUICONO , $operacionMENUTITULO ) {
        $sqlQuery = "INSERT INTO BasededatosAP.ControlOperaciones ( "
        ."controladorID , operacionCODIGO , operacionTITULO , operacionFUNCION ,  "
        ."operacionNOMBRETAB , operacionMENU , operacionMENUICONO , operacionMENUTITULO , operacionUSRCREO  "
        .") VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ";
        return BasededatosAP::insertFila(
            $sqlQuery, array(
                $controladorID , $operacionCODIGO , $operacionTITULO , $operacionFUNCION , $operacionNOMBRETAB ,
                $operacionMENU , $operacionMENUICONO , $operacionMENUTITULO, Cliente::usuarioID()
            )
        );
    }


}