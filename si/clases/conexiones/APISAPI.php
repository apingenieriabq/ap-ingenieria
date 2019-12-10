<?php
/**
 * ##### CONEXION ENTRE UNA APLICACION PHP Y UN SERVIDOR SICAM DE LA CCSM
 *        @Fecha: 2018 marzo 26
 *        @Autor: Ing. Juan Pablo Llinás Ramírez
 *        @Version: 1.0
 *
 * DESCRIPCION
 * ================================================================================================================
 *      Clase para conectar una aplicacion PHP con el SICAM
 *
 * PATRONES
 * ================================================================================================================
 *      Uso del patron de diseño Singleton para garantizar la correcta y unica instanciacion de la clase
 *
 * PROPIEDADES DE CLASE
 * ================================================================================================================
 *      $istancia         privada y estatica              Guarda la istancia de la clase
 *      $repositoryUrl        publica               URL para conectar con Alfresco
 *      $userName            publica               Nombre de usuario
 *      $password         publica               Contraseña de usuario
 *      $ticket         publica               Ticket ID de conexion
 *      $session         publica               ID de inicio de sesion Alfresco
 *      $repository      publica               Referencia al repositorio de Alfresco
 *      $spacesStore      publica               Referencia al Space store de Alfresco
 *
 * METODOS
 * ================================================================================================================
 *      getIstance()                        Metodo para obtener la instancia de la clase
 *                                    para evitar la duplicacion de objetos (Singleton)
 *
 *      __construct()                        Constructor. La unica manera de instanciar es con getIstance()
 *
 *      __clone()                           Metodo para evitar que se puedan clonar istancias.
 *
 *      connectRepository($url, $user, $pass)                      Metodo para conectar, autentificar y referenciar una sesion
 *                                       alfresco y el space store
 *                                        Parametros:
 *                                           $url  -> Direccion URL donde tengo alojado Alfresco
 *                                           $user -> Nombre de usuario de inicio de sesion
 *                                           $pass -> Contraseña de usuario de inicio de sesion
 *      Getters:
 *         getRepositoryUrl()      getPassword()               getSession()           getSpacesStore()
 *         getUserName()         getTicket()         getRepository()           *getInstace()*
 *
 * ================================================================================================================
 * #### USO
 * ================================================================================================================
 *      require_once "Alfresco/Service/Conexion.php";
 *      $conexion = Conexion::getIstance();
 *      $conexion->connectRepository("http://localhost:8080/alfresco/api", "admin", "admin");
 * */
class APISAPI {

    const URL = URL_API;
    const USERNAME = 'superusuario';
    const PASSWORD = 'superusuario';

    private $recursosCURL = array();
    private $conexionApi = null;
    private static $instancia;
    private $curl_multiple;

    // Singleton
    // public static function getIstance() {
    //     if (!isset(self::$instancia)) {
    //         $obj = __CLASS__;
    //         self::$instancia = new $obj;
    //     }
    //     return self::$instancia;
    // }

    public function __construct() {
        $this->curl_multiple = curl_multi_init();
    }

    private function __clone() {
        throw new Exception("Este objeto no se puede clonar");
    }



    public function preparaConsultas($componente, $controlador, $operacion, array $parametros = null, $soloMENSAJE = true) {
        $nombreUsuarioAPI = Cliente::estaLogueado() ? Cliente::usuarioNOMBRE() : self::USERNAME;
        $claveUsuarioAPI = Cliente::estaLogueado() ? (Cliente::usuarioCLAVE()) : self::PASSWORD;
        $JSONRespuesta = null;
        $estadoConexion = false;

        // echo "Cadena de conexion >>>  ".$nombreUsuarioAPI . ":" . $claveUsuarioAPI." <br />";
        // print_r($_SESSION);
        $conexionApi = curl_init();
        curl_setopt($conexionApi, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($conexionApi, CURLOPT_USERPWD, $nombreUsuarioAPI . ":" . $claveUsuarioAPI);
        curl_setopt($conexionApi, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($conexionApi, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($conexionApi, CURLOPT_RETURNTRANSFER, true);

        $urlCompleta = self::URL . $componente . "/" . $controlador . "/" . $operacion;
        $parametros_string = "";
        curl_setopt($conexionApi, CURLOPT_URL, $urlCompleta);
        if (!is_null($parametros)) {
            // foreach ($parametros as $parametro) {
            //     $urlCompleta .= "/" . $parametro;
            // }
            foreach($parametros as $key=>$value) {
                if(is_array($value)){
                    foreach($value as $dato){
                        $parametros_string .= $key.'[]='.$dato.'&';
                    }
                }else{
                    $parametros_string .= $key.'='.$value.'&';
                }
            }
            rtrim($parametros_string, '&');
        }
        curl_setopt($conexionApi,CURLOPT_POST, count($parametros));
        curl_setopt($conexionApi,CURLOPT_POSTFIELDS, $parametros_string);

        array_push($this->recursosCURL, $conexionApi);
        curl_multi_add_handle($this->curl_multiple,$conexionApi);


    }


    public function ejecutarTodas(){

        $active = null;
        // Ejecuta los recursos
        do {
            $mrc = curl_multi_exec($this->curl_multiple, $active);
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);

        while ($active && $mrc == CURLM_OK) {
            if (curl_multi_select($this->curl_multiple) != -1) {
                do {
                    $mrc = curl_multi_exec($this->curl_multiple, $active);
                    curl_multi_select($this->curl_multiple);
                } while ($mrc == CURLM_CALL_MULTI_PERFORM);
            }
        }
        print_r($mrc);
        // Cierra los recursos
        foreach($this->recursosCURL as $CURLactivo){
            curl_multi_remove_handle($this->curl_multiple, $CURLactivo);
            curl_multi_remove_handle($this->curl_multiple, $CURLactivo);
        }
        curl_multi_close($this->curl_multiple);
    }


    public function ejecutar($componente, $controlador, $operacion, array $parametros = null, $soloMENSAJE = true) {
        $nombreUsuarioAPI = Cliente::estaLogueado() ? Cliente::usuarioNOMBRE() : self::USERNAME;
        $claveUsuarioAPI = Cliente::estaLogueado() ? (Cliente::usuarioCLAVE()) : self::PASSWORD;
        $JSONRespuesta = null;
        $estadoConexion = false;

        // echo "Cadena de conexion >>>  ".$nombreUsuarioAPI . ":" . $claveUsuarioAPI." <br />";
        // print_r($_SESSION);
        $this->conexionApi = curl_init();
        curl_setopt($this->conexionApi, CURLOPT_POST, true);
        curl_setopt($this->conexionApi, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->conexionApi, CURLOPT_USERPWD, $nombreUsuarioAPI . ":" . $claveUsuarioAPI);
        curl_setopt($this->conexionApi, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($this->conexionApi, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->conexionApi, CURLOPT_FRESH_CONNECT, true);

        $urlCompleta = self::URL . $componente . "/" . $controlador . "/" . $operacion;
        $parametros_string = "";
        curl_setopt($this->conexionApi, CURLOPT_URL, $urlCompleta);
        if (!is_null($parametros)) {
            // foreach ($parametros as $parametro) {
            //     $urlCompleta .= "/" . $parametro;
            // }
            foreach($parametros as $key=>$value) {
                if(is_array($value)){
                    foreach($value as $dato){
                        $parametros_string .= $key.'[]='.$dato.'&';
                    }
                }else{
                    $parametros_string .= $key.'='.$value.'&';
                }
            }
            rtrim($parametros_string, '&');
        }
        // print_r($parametros);
        curl_setopt($this->conexionApi,CURLOPT_POST, (is_array($parametros) ? count($parametros, COUNT_RECURSIVE) : null ));
        curl_setopt($this->conexionApi,CURLOPT_POSTFIELDS, $parametros_string);

        $resultado = curl_exec($this->conexionApi);
        // print_r(json_decode($resultado));
        if($soloMENSAJE){
            $JSONRespuesta =  $this->procesarRESPUESTA($resultado);
        // print_r($resultado);
            return $JSONRespuesta;
        }else{
            try{
                $respuesta = json_decode($resultado);
                if (json_last_error() === JSON_ERROR_NONE) {
                    return ($respuesta);
                }else{
                    return ($resultado);
                }
            }catch(Exception $ex){
             return ($resultado);
            }
            //  return ($resultado);
        }
    }




    private function cearArchivoCURL($file)
    {
        $mime = mime_content_type($file);
        $info = pathinfo($file);
        $name = $info['basename'];
        $output = new CURLFile($file, $mime, $name);
        return $output;
    }

    public function enviar($componente, $controlador, $operacion, $parametros = null, $archivos = null, $soloMENSAJE = true) {
        $JSONRespuesta = null;
        $estadoConexion = false;
        $this->conexionApi = curl_init();
        curl_setopt($this->conexionApi, CURLOPT_POST, true);
        curl_setopt($this->conexionApi, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->conexionApi, CURLOPT_USERPWD, self::USERNAME . ":" . self::PASSWORD);
        curl_setopt($this->conexionApi, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($this->conexionApi, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->conexionApi, CURLOPT_FRESH_CONNECT, true);
        $urlCompleta = self::URL . $componente . "/" . $controlador . "/" . $operacion;
        curl_setopt($this->conexionApi, CURLOPT_URL, $urlCompleta);



        $paraEnviar = array();
        if (!is_null($parametros)) {
            foreach($parametros as $clave => $valor ) {
                // if(!empty($valor)){
                    $paraEnviar[$clave] = $valor;
                // }
            }
        }

        if (!is_null($archivos)) {
            foreach ($archivos as $clave => $valor) {
                if(!empty($valor)){
                    $paraEnviar[$clave] = $this->cearArchivoCURL($valor);
                }
            }
        }
        curl_setopt($this->conexionApi,CURLOPT_POST, count($paraEnviar));
        curl_setopt($this->conexionApi,CURLOPT_POSTFIELDS, $paraEnviar);

        $resultado = curl_exec($this->conexionApi);
        // print_r($resultado);die();
        if($soloMENSAJE){
            $JSONRespuesta =  $this->procesarRESPUESTA($resultado);
        // print_r($resultado);
            return $JSONRespuesta;
        }else{
            try{
                $respuesta = json_decode($resultado);
                if (json_last_error() === JSON_ERROR_NONE) {
                    return ($respuesta);
                }else{
                    return ($resultado);
                }
            }catch(Exception $ex){
             return ($resultado);
            }
            //  return ($resultado);
        }

    }

    public function procesarRESPUESTA($resultado){
        $JSONRespuesta = null;
        $respuesta = json_decode($resultado);
        if (json_last_error() === JSON_ERROR_NONE) {
            if(isset($respuesta->RESPUESTA)){
                if ($respuesta->RESPUESTA == 'EXITO') {
                    if (!session_status() == PHP_SESSION_ACTIVE)
                        session_start();
                    $estadoConexion = $_SESSION['API_CONEXION'] = true;
                    session_write_close();
                    $info = curl_getinfo($this->conexionApi);
                    return $JSONRespuesta = $respuesta->DATOS;
                }else{
                    // return $JSONRespuesta = $respuesta->MENSAJE;
                    echo $resultado;die();
                }
            }else{
            // var_dump($respuesta);
            }
        }
        $this->cerrar();
        return $JSONRespuesta;
    }

    /**
     *
     * @param void
     * @return SimpleXMLElement
     * @desc this connects but also sends and retrieves
      the information returned in XML
     */
    public function conectar() {
        $estadoConexion = false;
        $this->conexionApi = curl_init();
        curl_setopt($this->conexionApi, CURLOPT_URL, self::URL . "conectar");
        curl_setopt($this->conexionApi, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->conexionApi, CURLOPT_USERPWD, self::USERNAME . ":" . self::PASSWORD);
        curl_setopt($this->conexionApi, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $output = curl_exec($this->conexionApi);
        print_r($output);
        echo "                      ";
        $respuesta = json_decode($output);
        if (json_last_error() === JSON_ERROR_NONE) {
            if ($respuesta->RESPUESTA == 'EXITO') {
                if (!session_status() == PHP_SESSION_ACTIVE)
                    session_start();
                $estadoConexion = $_SESSION['API_CONEXION'] = true;
                session_write_close();
                $info = curl_getinfo($this->conexionApi);
            }
        }
        return $estadoConexion;
    }

    private function cerrar() {
        return curl_close($this->conexionApi);
    }

    public function desconectar() {
        $estadoConexion = true;
        $this->conexionApi = curl_init();
        curl_setopt($this->conexionApi, CURLOPT_URL, self::URL . "desconectar");
        curl_setopt($this->conexionApi, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->conexionApi, CURLOPT_USERPWD, self::USERNAME . ":" . self::PASSWORD);
        curl_setopt($this->conexionApi, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $output = curl_exec($this->conexionApi);
        // print_r($output);
        $respuesta = json_decode($output);
        if (json_last_error() === JSON_ERROR_NONE) {
            if ($respuesta->RESPUESTA == 'EXITO') {
                if (!session_status() == PHP_SESSION_ACTIVE)
                    session_start();
                $estadoConexion = $_SESSION['API_CONEXION'] = false;
                session_write_close();
                $info = curl_getinfo($this->conexionApi);
            }
        }
        return $estadoConexion;
    }

}
