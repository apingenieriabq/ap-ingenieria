<?php
class Motor {

  static function procesar($modulo, $controlador, $operacion){
    Usuario::registrarOperacion($modulo, $controlador, $operacion);
    if (isset($controlador) and isset($modulo)) {
      $modulo = trim(strtolower($modulo));
      $controlador = ucfirst(trim(ucwords(strtolower($controlador))));
      $archivoControlador =DIR_API . 'modulos' . DS .$modulo . DS .'controladores' . DS .$controlador. EXT_CONTROLADOR;
      if (file_exists($archivoControlador)) {
          require_once $archivoControlador;
          $nombreClase = ($controlador) . 'Controlador';
          if (class_exists($nombreClase)) {
              $classCtrl = new $nombreClase();
              if ($classCtrl instanceof $nombreClase) {
                  $nombreFuncion = $operacion;
                  if (method_exists($classCtrl, $nombreFuncion)) {
                      Usuario::registrarRespuesta( $classCtrl->$nombreFuncion() );
                      return true;
                  } else {
                      $respuesta = RespuestasSistema::error('NO EXISTE LA OPERACION [' . $nombreClase . '::' . $nombreFuncion . ']');
                  }
              } else {
                  $respuesta = RespuestasSistema::error('NO ES UN OBJETO VALIDO [' . $classCtrl . ']');
              }
          } else {
              $respuesta = RespuestasSistema::error('NO EXISTE LA CLASE [' . $nombreClase . ']');
          }
      } else {
          $respuesta = RespuestasSistema::error('NO EXISTE EL ARCHIVO [' . $archivoControlador . ']');
      }
    } else {
        $respuesta = RespuestasSistema::error('NO LLEGARON DATOS PARA LA OPERACION');
    }
    Usuario::registrarRespuesta( $respuesta );
    return false;
  }

     static function init() {
        self::twigConfigPlantilla();
    }

     static function twigConfigPlantilla($dirPlantilla) {
        $loader = new Twig_Loader_Filesystem(array($dirPlantilla));
        $twig = new Twig_Environment($loader, array('debug' => true));
        $twig->addExtension(new Twig_Extension_Debug());
        // $twig->addGlobal('Params', new Parametros());
        // $twig->addGlobal('Parametros', new Parametros());
        $filter = new \Twig\TwigFilter('Parametro', function ($PARAMETRO) {
            return Parametros::valor($PARAMETRO);
        });
        $twig->addFilter($filter);

        $function = new Twig_SimpleFunction('imagenTooltip', function ($idElemento, $srcImagen) {
            echo '<div class="titulo-flotante" data-tooltip-content="#'.$idElemento.'" ><i class="fa fa-picture-o" aria-hidden="true"></i>';
            echo '<div class="tooltip_imagen">'.
                    '<span id="'.$idElemento.'">'.'<img src="'.$srcImagen.'" />'.'</span>'.
                '</div>';
            echo '</div>';
        });
        $twig->addFunction($function);

        $function = new Twig_SimpleFunction('pdfTooltip', function ($idElemento, $srcPDF) {
            echo '<div class="titulo-flotante" data-tooltip-content="#'.$idElemento.'" ><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i>';
            echo '<div class="tooltip_imagen">'.
                    '<span id="'.$idElemento.'">'.
                        '<iframe src="'.$srcPDF.'" style="border:0px #ffffff none;" name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="400px" width="600px" allowfullscreen></iframe>'.
                    '</span>'.
                '</div>';
            echo '</div>';
        });
        $twig->addFunction($function);

        $function = new Twig_SimpleFunction('labelEstado', function ($estadoCODIGO, $estadoTITULO = '') {
            if(empty($estadoTITULO)){ $estadoTITULO = $estadoCODIGO; }
            echo '<span class="label label-default label-'.$estadoCODIGO.'">'.$estadoTITULO.'</span>';
        });
        $twig->addFunction($function);

        $function = new Twig_SimpleFunction('enlace', function ( $enlaceURL, $enlaceTITULO = '') {
            if(!empty($enlaceURL))
                echo '<a class="btn-link" href="javascript:void(0)" onclick="popUp(\''.htmlspecialchars($enlaceURL).'\', \''.$enlaceURL.'\');" >'.$enlaceTITULO.'<i class="fa fa-external-link" aria-hidden="true"></i></a>';
        });
        $twig->addFunction($function);

        $function = new Twig_SimpleFunction('existeURL', function ($archivoURL) {
            $curl = curl_init($archivoURL);
            curl_setopt($curl, CURLOPT_NOBODY, true);
            $result = curl_exec($curl);
            if ($result !== false)
            {
              $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
              if ($statusCode == 404)
              {
                return false;
              }
              else
              {
                 return true;
              }
            }
            else
            {
              return false;
            }


        });
        $twig->addFunction($function);

        return $twig;
    }

     static function getGlobals() {
        SesionCliente::abrir();
        return array(
         'favicon' => 'favicon.html.php',
         'login' => PLANTILLA_ACTIVA . 'login.html.php',
         'dashboard' => PLANTILLA_ACTIVA . 'dashboard.html.php',
         'mantenimiento' => PLANTILLA_ACTIVA . 'mantenimiento.html.php',
         'bloqueo' => PLANTILLA_ACTIVA . 'bloqueo.html.php',
         'inactividad' => PLANTILLA_ACTIVA . 'inactividad.html.php',
         'estaLogueado' => Cliente::estaLogueado(),
         'isEstadoSesion' => Cliente::estadoSesion(),
         'session' => Cliente::getUsuario(),
         'estado_session' => Cliente::get('ESTADO'),
         'session_desde' => SesionCliente::valor('LOGIN_DESDE'),
         'session_ip' => SesionCliente::valor('LOGIN_IP'),
         'isMantenimiento' => Parametros::valor('MODO_MANTENIMIENTO'),
         'URL_SICAM' => URL_SICAM,
         'VERSION_SICAM_EJECUCION' => VERSION_SICAM_EJECUCION,
         'hash_vista' => uniqid(),
         'URL_ARCHIVOS' => URL_ARCHIVOS,
        );
    }

}

