<?php

class Main {

    public static function  procesarPeticion($modulo, $operacion){
        if (isset($modulo) and isset($operacion)) {
            $archivoControlador = DIR_CONTROLADORES . (ucfirst($modulo)) . EXT_CONTROLADOR;
            if (file_exists($archivoControlador)) {
                require_once $archivoControlador;
                $nombreClase = ucfirst($modulo) . 'Controlador';
                if (class_exists($nombreClase)) {
                    $classCtrl = new $nombreClase();
                    if ($classCtrl instanceof $nombreClase) {
                        if (method_exists($classCtrl, $operacion)) {
                            $classCtrl->$operacion();
                        } else {
                            echo RespuestasSistema::error('NO EXISTE LA OPERACION [' . $nombreClase . '::' . $operacion . ']');
                        }
                    } else {
                        echo RespuestasSistema::error('NO ES UN OBJETO VALIDO [' . $classCtrl . ']');
                    }
                } else {
                    echo RespuestasSistema::error('NO EXISTE LA CLASE [' . $nombreClase . ']');
                }
            } else {
                echo RespuestasSistema::error('NO EXISTE EL ARCHIVO [' . $archivoControlador . ']');
            }
        } else {
            echo RespuestasSistema::error('NO LLEGARON DATOS PARA LA OPERACION');
        }
        if (@session_start()) {
            @session_write_close();
        }
    }

    public static function init()
    {
        self::twigConfigPlantilla();
    }

    public static function twigConfigPlantilla($dirPlantilla)    {
        $loader = new Twig_Loader_Filesystem(array($dirPlantilla));
        $twig = new Twig_Environment(
            $loader,
            array(
         'debug' => true,
            )
        );
        $twig->addExtension(new Twig_Extension_Debug());
        // $twig->addGlobal('Params', new Parametros());
        $function = new Twig_SimpleFunction('encabezadosVistas', function (
                $titulo, $subtitulo = '', $ObjetoDatos = null, $btn_eliminar = '', $btn_guardar = true, $btn_limpiar = true
            ) {

            $botonera = '';
            $botonera .= '<div class="page-header row no-gutters py-4"> ';
            $botonera .= '<div class="col-12 col-sm-8 text-center text-sm-left mb-0"> ';
            $botonera .= '<span class="text-uppercase page-subtitle">'.$subtitulo.'</span> ';
            $botonera .= '<h3 class="page-title">'.$titulo.'</h3> ';
            $botonera .= '</div> ';
            $botonera .= '<div class="col-12 col-sm-4 align-items-right"> ';
            if($btn_limpiar){
            $botonera .= '<button type="reset" class="btn btn-sm btn-warning ml-auto"><i class="fas fa-broom"></i> Limpiar</button> ';
            }
            if($btn_guardar){
            $botonera .= '<button type="submit" class="btn btn-sm btn-accent ml-auto"><i class="material-icons">save</i> Guardar</button>';
            }
            if(!is_null($ObjetoDatos)){
                if(!empty($btn_eliminar)){
                $botonera .= '<button type="button" onclick="'.$btn_eliminar.'" class="btn btn-sm btn-danger"><i class="material-icons">delete</i> Eliminar</button>';
                }
            }
            $botonera .= '</div> ';
            $botonera .= '</div>';

            return $botonera;
        },['is_safe' => array('html')]);
        $twig->addFunction($function);
        return $twig;
    }

    public static function parametros()
    {
        global $Api;
        $datos = $Api->ejecutar(
            'sistema','parametros','valores',
            array( 'parametrosCODIGOS' => array( 'LOGOAP_PNG', 'URL_PUBLICA') )
        );


        $Menu = null;
        $estaLogueado = Cliente::estaLogueado();
        if($estaLogueado){
        // echo "--->>>>>>mostrarMenu>>>>>>>>>     <br /><br /><br />";
            $Menu = $Api->ejecutar(
              'seguridad', 'usuarios', 'mostrarMenu'
            //   , array( 'usuarioID' => Cliente::datos()->usuarioID )
            // , null, false
            );
        // echo "--->>>>>>>>>>>>>>>    <br /><br /><br />";
            // print_r($Menu);
            // die();
        }

        return array(
            'logo' => $datos[0],
            'url_api' => $datos[1],
        'favicon' => 'favicon.html.php',
        'login' => PLANTILLA_ACTIVA.'login.html.php',
        'admin' => PLANTILLA_ACTIVA.'admin.html.php',
        'mantenimiento' => PLANTILLA_ACTIVA.'mantenimiento.html.php',
        'bloqueo' => PLANTILLA_ACTIVA.'bloqueo.html.php',
        'inactividad' => PLANTILLA_ACTIVA.'inactividad.html.php',
        'estaLogueado' => $estaLogueado,
        'Menu' => $Menu,
        'Usuario' => Cliente::datos(),
        'hash_vista' => uniqid()
        );
    }
}
