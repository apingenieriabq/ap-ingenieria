<?php
class Controladores {


    public function __construct() {
        if (isset($_POST) and ! empty($_POST)){
            foreach ($_POST as $variable => $valor) {
                // ($variable === 'controlador' or $variable === 'operacion' or $variable === 'componente')
                //  continue;
                $this->$variable = $valor;
                $variable = str_replace("-","_",$variable);
                $this->$variable = $valor;
            }
        }
        if (isset($_FILES) and ! empty($_FILES)){
            $cntArchivos = 0;
            foreach ($_FILES as $variable => $valor) {
                if( is_array($valor['name']) ){
                    $this->$variable = array();
                    foreach ($valor['name'] as $nombre) {
                        if( $valor['size'][$cntArchivos] > 0 ){
                            $archivo = array();
                            $archivo['name'] = $valor['name'][$cntArchivos];
                            $archivo['type'] = $valor['type'][$cntArchivos];
                            $archivo['tmp_name'] = $valor['tmp_name'][$cntArchivos];
                            $archivo['error'] = $valor['error'][$cntArchivos];
                            $archivo['size'] = $valor['size'][$cntArchivos];
                            array_push( $this->$variable, $archivo );
                            $cntArchivos++;
                        }
                    }

                }else{
                    if( $valor['size'] > 0 ){
                        $this->$variable = $valor;
                    }
                }
            }
        }
        // $operacion = Operaciones::datosPorCombinacion($this->componente, $this->controlador, $this->operacion);
        // if(!empty($operacion)):
        //     if(!Cliente::tienePermiso($operacion->operacionCODIGO) and $operacion->operacionSEGURIDAD == "RESTRINGIDA"):
        //         echo RespuestasSistema::alerta(
        //             'No estás autorizad@ para '.$operacion->operacionTITULO.' [' . $this->operacion . ']'
        //         );
        //         //Log::insertarRegistro($_POST['componente'], Cliente::ipUsuario(), $_POST['controlador'], Cliente::getDato('usuarioNOMBRE'), $_POST['operacion'], RespuestasSistema::getRespuesta(), RespuestasSistema::getMensajeRespuesta());
        //         session_write_close();
        //         exit(0);
        //     endif;
        // endif;
    }


}