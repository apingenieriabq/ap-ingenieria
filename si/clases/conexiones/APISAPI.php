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

    const URL = 'https://si-ap-ingenieria-puroingeniosamario.c9users.io/api/';
    const USERNAME = 'superusuario';
    const PASSWORD = 'superusuario';

    private $conexionApi = null;
    private static $instancia;

    // Singleton
    public static function getIstance() {
        if (!isset(self::$instancia)) {
            $obj = __CLASS__;
            self::$instancia = new $obj;
        }
        return self::$instancia;
    }

    public function __construct() {

    }

    private function __clone() {
        throw new Exception("Este objeto no se puede clonar");
    }

    public function ejecutar($componente, $controlador, $operacion, array $parametros = null, $soloMENSAJE = true) {
        $nombreUsuarioAPI = Cliente::estaLogueado() ? Cliente::usuarioNOMBRE() : self::USERNAME;
        $claveUsuarioAPI = Cliente::estaLogueado() ? (Cliente::usuarioCLAVE()) : self::PASSWORD;
        $JSONRespuesta = null;
        $estadoConexion = false;

        // echo "Cadena de conexion >>>  ".$nombreUsuarioAPI . ":" . $claveUsuarioAPI." <br />";
        // print_r($_SESSION);

        $this->conexionApi = curl_init();
        curl_setopt($this->conexionApi, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->conexionApi, CURLOPT_USERPWD, $nombreUsuarioAPI . ":" . $claveUsuarioAPI);
        curl_setopt($this->conexionApi, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($this->conexionApi, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->conexionApi, CURLOPT_RETURNTRANSFER, true);

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
        curl_setopt($this->conexionApi,CURLOPT_POST, count($parametros));
        curl_setopt($this->conexionApi,CURLOPT_POSTFIELDS, $parametros_string);

        $resultado = curl_exec($this->conexionApi);
        if($soloMENSAJE){
            return $JSONRespuesta =  $this->procesarRESPUESTA($resultado);
        }else{
            return $resultado;
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
                    return $JSONRespuesta = $respuesta->MENSAJE;
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
