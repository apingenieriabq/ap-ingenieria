<?php

class Usuario {
  const INVITADO = 0;
  const SUPERUSER = 1;

  public static function GeoIP($direccionIP = null){
    if(is_null($direccionIP)){
      $direccionIP =  self::ip();
    }
    $PosicionPorIP = json_decode(APIipapi::datos($direccionIP));
    return SesionCliente::valor( 'POSICION_IP', $PosicionPorIP );
  }

  public static function latitud($poslat = null) {
    // echo "***************";var_dump($poslat);
    if(is_null($poslat)){
      self::GeoIP();
      $poslat = SesionCliente::valor('POSICION_IP')->latitude;
      // echo "***************";
    }
      // echo $poslat."***************";
    return SesionCliente::valor('LATITUD', $poslat);
  }
  public static function longitud($poslon = null) {
    if(is_null($poslon)){
      self::GeoIP();
      $poslon = SesionCliente::valor('POSICION_IP')->longitude;
    }
    return SesionCliente::valor('LONGITUD', $poslon);
  }
  public static function ip() {
      $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP')) {
          $ipaddress = getenv('HTTP_CLIENT_IP');
      } else if (getenv('HTTP_X_FORWARDED_FOR')) {
          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      } else if (getenv('HTTP_X_FORWARDED')) {
          $ipaddress = getenv('HTTP_X_FORWARDED');
      } else if (getenv('HTTP_FORWARDED_FOR')) {
          $ipaddress = getenv('HTTP_FORWARDED_FOR');
      } else if (getenv('HTTP_FORWARDED')) {
          $ipaddress = getenv('HTTP_FORWARDED');
      } else if (getenv('REMOTE_ADDR')) {
          $ipaddress = getenv('REMOTE_ADDR');
      } else {

          if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
              $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
          } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
              $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
          } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
              $ipaddress = $_SERVER['REMOTE_ADDR'];
          } else {
              $ipaddress = 'DESCONOCIDA';
          }
      }
      return $ipaddress;
  }


  public static function esAdministrador() {
      if (self::estaLogueado()):
          $dato = SesionCliente::activa();
          if($dato->usuarioADMINISTRADOR == 'SI'):
              return true;
          endif;
      endif;
      return false;
  }

  public static function comoInvitado() {
      $_SESSION['INVITADO'] = 1;
  }
  public static function esInvitado() {
      if (isset($_SESSION['INVITADO']) and $_SESSION['INVITADO'] == 1):
          return true;
      else:
          return false;
      endif;

  }

  public static function estaLogueado() {
      SesionCliente::abrir();
      $ObjUSER = SesionCliente::valor(SESION);
      SesionCliente::cerrar();
      if($ObjUSER){
          return true;
      }
      return false;

  }
  public static function iniciarSesion($nombreUsuario, $claveUsuario){
    $Usuarios = new Usuarios();
    $Usuarios->comprobar($nombreUsuario, $claveUsuario);
    // print_r($Usuarios);
    // die();
    if (isset($Usuarios->usuarioID)){
        $Usuarios->datosCompletos();
        if($Usuarios->usuarioID === 0){
          Usuario::comoInvitado();
        }
        Usuario::abrirSesion($Usuarios);
        return true;
    }
    return false;
  }
  public static function abrirSesion($Usuario) {
      $Usuario->registrarUltimaVisita( Usuario::ip(), Usuario::latitud(), Usuario::longitud());
      SesionCliente::valor('SESION', self::singleton());
      SesionCliente::valor('USUARIO', $Usuario);
      return true;
  }
  public static function estadoSesion() {
      if (!empty($_SESSION['SESION_ESTADO'])):
          return $_SESSION['SESION_ESTADO'];
      else:
          return null;
      endif;
  }
  public static function sesionActiva() {
      if (!empty(SesionCliente::valor('USUARIO'))):
          return SesionCliente::valor('USUARIO');
      else:
          return null;
      endif;
  }
  public static function sesionSuspendida() {
      if (!empty($_SESSION['SESION_ESTADO'])):
          if ($_SESSION['SESION_ESTADO'] == 'INACTIVIDAD'):
              return true;
          else:
              return false;
          endif;
      else:
          return $_SESSION['SESION_ESTADO'];
      endif;
  }
  public static function cerrarSesion() {
      SesionCliente::destruir();
  }


  public static function dato($atributo) {
      if (self::estaLogueado()):
          $dato = SesionCliente::dato($atributo);
          return $dato;
      endif;

  }
  public static function datoSession($nombre, $valor = NULL) {
      return SesionCliente::valor($nombre, $valor);
  }


  public static function tienePermiso($codigoOperacion) {
      $permisosDefault = [ 'iniciarSesion', 'perfilUsuarioSeguridad', 'cerrarSesion' ];
      if (!in_array($codigoOperacion, $permisosDefault)):
        if(ControlAcceso::porIp(self::ip())):
            if(ControlAcceso::delUsaurioPorCodigoOperacion(self::dato('usuarioID'), $codigoOperacion)):
                return true;
            else:
                return false;
            endif;
        else:
            return false;
        endif;
      else:
          return true;
      endif;
  }

  public static function apiTienePermiso($codigoOperacion , $usuario, $ip=null) {
      $permisosDefault = [];
      if (!in_array($codigoOperacion, $permisosDefault) and !empty($usuario)):
          if(ControlAcceso::porIp($usuario , $ip)):
              //if(ControlAcceso::delUsaurio($usuario->usuarioID, $codigoOperacion)):
              if(true):
                  return true;
              else:
                  return false;
              endif;
          else:
              return false;
          endif;
      else:
          return true;
      endif;
  }






  var $nombre;
  var $correo;
  var $cedula;
  public static function usuarioID() {
      return isset($_SESSION['USUARIO']) ? $_SESSION['USUARIO']->usuarioID : null;
  }
  public static function usuarioNOMBRE() {
      return isset($_SESSION['USUARIO']) ? $_SESSION['USUARIO']->usuarioNOMBRE : null;
  }
  public static function usuarioESTADO() {
      return isset($_SESSION['USUARIO']) ? $_SESSION['USUARIO']->usuarioESTADO : null;
  }

  public static function cargoID() {
      return isset($_SESSION['USUARIO']) ? $_SESSION['USUARIO']->cargoID : null;
  }

  public static function colaboradorID() {
      return isset($_SESSION['USUARIO']) ? $_SESSION['USUARIO']->colaboradorID : null;
  }
  public static function cedula() {
      return isset($_SESSION['USUARIO']) ? $_SESSION['USUARIO']->personaIDENTIFICACION : null;
  }
  public static function nombreCompleto() {
      return isset($_SESSION['USUARIO']) ? $_SESSION['USUARIO']->personaNOMBRES . " " . $_SESSION['USUARIO']->personaAPELLIDOS : null;
  }
  public static function nombres() {
      return isset($_SESSION['USUARIO']) ? $_SESSION['USUARIO']->personaNOMBRES : null;
  }
  public static function apellidos() {
      return isset($_SESSION['USUARIO']) ? $_SESSION['USUARIO']->personaAPELLIDOS : null;
  }
  public static function correo() {
      return isset($_SESSION['USUARIO']) ? $_SESSION['USUARIO']->colaboradorEMAIL : null;
  }
  public static function firma() {
      return isset($_SESSION['USUARIO']) ? $_SESSION['USUARIO']->colaboradorFIRMA : null;
  }

  public static $instancia;
  public static function singleton() {
      if (!isset(self::$instancia)) {
          $miclase = __CLASS__;
          self::$instancia = new $miclase;
      }
      return self::$instancia;
  }

  static $ultimaOperacionRegistrada;
  public static function registrarOperacion($accionCOMPONENTE, $accionCONTROLADOR, $accionOPERACION){
    self::$ultimaOperacionRegistrada = new AccionesUsuarios($accionCOMPONENTE, $accionCONTROLADOR, $accionOPERACION);
  }
  public static function registrarRespuesta($respuesta){
    self::$ultimaOperacionRegistrada->respuesta($respuesta);
  }
  public static function registrarPosicion($latitud = null, $longitud = null){
    if(is_null($latitud)){
      if(isset($_POST['usuarioULTIMALATITUD'])){
        $latitud = $_POST['usuarioULTIMALATITUD'];
      }elseif(!empty(SesionCliente::valor('LATITUD'))){
        $latitud = SesionCliente::valor('LATITUD');
      }
    }
    if(is_null($longitud)){
      if(isset($_POST['usuarioULTIMALONGITUD'])){
        $longitud = $_POST['usuarioULTIMALONGITUD'];
      }elseif(!empty(SesionCliente::valor('LONGITUD'))){
        $longitud = SesionCliente::valor('LONGITUD');
      }
    }
    $Usuarios = new Usuarios();
    $Usuarios->registrarUltimaVisita(
      Usuario::ip(), Usuario::latitud($latitud), Usuario::longitud($longitud), Usuario::usuarioID()
    );
    if(empty(SesionCliente::valor('POSICION_IP'))){
      $datosIP = Usuario::GeoIP();
    }else{
      $datosIP = SesionCliente::valor('POSICION_IP');
    }
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."";

    try{
      $Ubicacion = new UbicacionesUsuarios();
      $Ubicacion->nuevo(
        Usuario::usuarioID(),
        $actual_link,
        $datosIP->ip,
        $datosIP->continent_name,
        $datosIP->country_name,
        $datosIP->city,
        $datosIP->region_name,
        $datosIP->zip,
        $latitud,
        $longitud,
        $datosIP->location->capital,
        $datosIP->location->country_flag,
        $datosIP->location->calling_code
      );
    }catch(Exception $e){
    }
  }


}
