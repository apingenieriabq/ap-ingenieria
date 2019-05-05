<?php
/*
 * Copyright 2017-09-07  Cámara de Comercio de Santa Marta para el Magdalena.
 * Autor: Luis Montoya <lmontoya@ccsm.org.co at www.ccsm.org.co>.
 * Archivo: Controlador.
 *
 * Licenciado bajo la Licencia Apache, VersiÃ³n 2.0;
 * Usted no puede usar este archivo excepto en conformidad con la Licencia.
 * Usted puede obtener una copia de la Licencia en
 *
 *   	http://www.apache.org/licenses/LICENSE-2.0
 *
 * A menos que sea requerido por la ley aplicable o acordado por escrito, el software
 * Distribuido bajo la licencia se distribuye en una "AS IS" o  "COMO ESTA" BASE,
 * SIN GARANTÃ�AS NI CONDICIONES DE NINGÃšN TIPO, expresas o implÃ­citas.
 * Consulte la Licencia para los permisos y Limitaciones bajo la Licencia.
 */
/**
 * Description of Controlador
 *
 * @author Luis Montoya <lmontoya@ccsm.org.co at www.ccsm.org.co>
 */
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
    }


}