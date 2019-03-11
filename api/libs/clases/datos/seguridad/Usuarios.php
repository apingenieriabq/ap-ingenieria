<?php
class Usuarios extends ModeloDatos {

  function datosCompletos($usuarioID = null){
    if(is_null($usuarioID)){
      $usuarioID =  $this->usuarioID;
    }
    $Usuario = $this->datos(['usuarioID'=> $usuarioID]);
    if(!empty($Usuario)){
      $Usuario->Colaborador = new Colaboradores($this->colaboradorID);
      $Usuario->Colaborador->datosCompletos();
    }
    return $Usuario;
   }

  function porID($usuarioID = 0){
     return $this->datos(['usuarioID'=> $usuarioID]);
   }

  function nuevo( $nombre, $contrasena){
        return $this->usuarioID = self::insertar(array(
        	"usuarioNOMBRE" =>$nombre,
        	"usuarioHASH" => password_hash($contrasena, PASSWORD_DEFAULT)
        ));
    }

  function comprobar( $nombre, $contrasena){
    $datos = $this->datos(array("usuarioNOMBRE" =>$nombre));
    if(!empty($datos)){
      if (password_verify($contrasena, $datos->usuarioHASH)) {
          return $datos;
      }
    }
    return null;
  }

  function registrarUltimaVisita( $usuarioIP, $usuarioLATITUD, $usuarioLONGITUD, $usuarioID = null){
    if(is_null($usuarioID)){
      $usuarioID = $this->usuarioID;
    }
    // print_r(array($usuarioID, $usuarioIP, $usuarioLATITUD, $usuarioLONGITUD));
    $cambios = self::actualiza(
      [ "usuarioULTIMAVISITA" => date('Y-m-d h:i:s') , "usuarioULTIMAIP" => $usuarioIP, "usuarioULTIMALATITUD" => $usuarioLATITUD, "usuarioULTIMALONGITUD" => $usuarioLONGITUD],
      [ "usuarioID" => $usuarioID ]
    );
  }

  public function __construct($usuarioID = null) {
    parent::__construct('Usuarios', 'usuarioID', $usuarioID);
  }

}