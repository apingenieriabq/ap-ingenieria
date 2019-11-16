<?php
class Vistas {

    public static function cargar($componente, $vista, $datos = array()) {
        $twig = Main::twigConfigPlantilla(DIR_VISTAS);
        if( isset($datos['hash_vista_padre'])){
          $datos['hash_vista'] = $datos['hash_vista_padre'];
        }else{
          $datos['hash_vista'] = uniqid();
        }
        $datos['Usuario'] = Cliente::datos();
        $datos['URL_ARCHIVOS'] = URL_ARCHIVOS;
        $rutaVista = $componente . DS . $vista . EXT_VISTA;
        try{
            SesionCliente::cerrar();
            // print_r($datos);
            $htmlENCABEZADO = '';
            return $htmlENCABEZADO.($twig->render( $rutaVista,$datos));
        }catch (Exception $Ex){
            return (
                'ERROR AL CARGAR VISTA [' . $rutaVista . '], COMUNICARSE CON GESTION TICS.' .
                $Ex->xdebug_message
                );
        }
    }

    public static function mostrar($componente, $vista, $datos = array()) {
        echo self::cargar($componente, $vista, $datos);
    }

    public static function mostrarSencillo($componente, $vista, $datos = array()) {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        require_once DIR_VISTAS . DS . $componente . DS . $vista . EXT_VISTA;
    }

}
