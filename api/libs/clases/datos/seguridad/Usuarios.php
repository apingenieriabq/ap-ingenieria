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
  function porNombre($usuarioNOMBRE){
     return $this->datos(['usuarioNOMBRE'=> $usuarioNOMBRE]);
   }
  function porColaboradorID($colaboradorID){
     return $this->datos(['colaboradorID'=> $colaboradorID]);
   }

  function nuevo( $nombre, $contrasena, $colaboradorID = null){
        return $this->usuarioID = self::insertar(array(
        	"usuarioNOMBRE" =>$nombre,
        	"usuarioHASH" => password_hash($contrasena, PASSWORD_DEFAULT),
        	"colaboradorID" => $colaboradorID
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

  function cambiarNombreParaColaborador( $usuarioNOMBRE, $colaboradorID ){
    return $this->actualiza(['usuarioNOMBRE' => $usuarioNOMBRE], ['colaboradorID' => $colaboradorID]);
  }
  function activarParaColaborador($colaboradorID ){
    return $this->actualiza(['usuarioESTADO' => UsuariosEstados::ACTIVO], ['colaboradorID' => $colaboradorID]);
  }
  function desactivarParaColaborador($colaboradorID ){
    return $this->actualiza(['usuarioESTADO' => UsuariosEstados::DESACTIVO], ['colaboradorID' => $colaboradorID]);
  }
  function suspenderParaColaborador($colaboradorID ){
    return $this->actualiza(['usuarioESTADO' => UsuariosEstados::SUSPENDIDO], ['colaboradorID' => $colaboradorID]);
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