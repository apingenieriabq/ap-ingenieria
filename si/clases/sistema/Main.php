<?php

class Main
{
    public static function init()
    {
        self::twigConfigPlantilla();
    }

    public static function twigConfigPlantilla($dirPlantilla)
    {
        $loader = new Twig_Loader_Filesystem(array($dirPlantilla));
        $twig = new Twig_Environment(
            $loader,
            array(
         'debug' => true,
            )
        );
        $twig->addExtension(new Twig_Extension_Debug());
        // // $twig->addGlobal('Params', new Parametros());
        // // $twig->addGlobal('Parametros', new Parametros());
        // $filter = new Twig_Filter('Parametro', function ($PARAMETRO) {
        //     return Parametros::valor($PARAMETRO);
        // });
        // $twig->addFilter($filter);
        return $twig;
    }

    public static function getGlobals()
    {
        // SesionCliente::abrir();

        return array(
        // 'favicon' => 'favicon.html.php',
        // 'login' => PLANTILLA_ACTIVA.'login.html.php',
        // 'dashboard' => PLANTILLA_ACTIVA.'dashboard.html.php',
        // 'mantenimiento' => PLANTILLA_ACTIVA.'mantenimiento.html.php',
        // 'bloqueo' => PLANTILLA_ACTIVA.'bloqueo.html.php',
        // 'inactividad' => PLANTILLA_ACTIVA.'inactividad.html.php',
        // 'estaLogueado' => Cliente::estaLogueado(),
        // 'isEstadoSesion' => Cliente::estadoSesion(),
        // 'session' => Cliente::getUsuario(),
        // 'estado_session' => Cliente::get('ESTADO'),
        // 'session_desde' => SesionCliente::valor('LOGIN_DESDE'),
        // 'session_ip' => SesionCliente::valor('LOGIN_IP'),
        // 'isMantenimiento' => Parametros::valor('MODO_MANTENIMIENTO'),
        // 'URL_SICAM' => URL_SICAM,
        // 'VERSION_SICAM_EJECUCION' => VERSION_SICAM_EJECUCION,
        // 'hash_vista' => uniqid(),
        // 'URL_ARCHIVOS' => URL_ARCHIVOS,
        );
    }
}
