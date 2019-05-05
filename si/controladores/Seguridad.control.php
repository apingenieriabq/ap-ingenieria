<?php

class SeguridadControlador extends Controladores {

  public function datosOperacion(){
    global $Api;
    $Respuesta = $Api->ejecutar(
      'seguridad', 'operaciones', 'datosOperacion',
      array( 'modulo' => $this->modulo,  'operacion ' => $this->operacion )
    );
    // print_r($Respuesta);
    if(!is_null($Respuesta)){
      echo RespuestasSistema::exito($Respuesta);
      return $Respuesta;
    }else{
      echo RespuestasSistema::error('Ocurrio un eror en la consutla a la API.', $Respuesta);
    }
    return null;
}

  public function menu(){
    global $Api;
    $Respuesta = $Api->ejecutar(
      'seguridad', 'usuarios', 'mostrarMenu',
      array( 'usuarioID' => Cliente::datos()->usuarioID )
    );
    // print_r($Respuesta);
    if(!is_null($Respuesta)){
      echo RespuestasSistema::exito($Respuesta);
      return $Respuesta;
    }else{
      echo RespuestasSistema::error('Ocurrio un eror en la consutla a la API.', $Respuesta);
    }
    return null;
  }

  public function login(){

    global $Api;
    $Clave = base64_decode($this->claveDelColaborador);
    $Respuesta = $Api->ejecutar(
      'seguridad', 'usuarios', 'verificarLoginCedulaColaborador',
      array( 'personaIDENTIFICACION' => $this->cedulaDelColaborador, 'usuarioCLAVE' => $Clave), true
    );
    if(!is_null($Respuesta)){
      if(is_object($Respuesta)){
        // var_dump($Respuesta);
        Cliente::abrirSesion($Respuesta);
        Cliente::nombreUsuario($Respuesta->usuarioNOMBRE);
        Cliente::claveUsuario($this->claveDelColaborador);
        echo RespuestasSistema::exito('Bienvenido al Sistema '.$Respuesta->usuarioNOMBRE.'. Tu último ingreso fue '.$Respuesta->usuarioULTIMAVISITA.'.',$Respuesta);
      }else{
        echo RespuestasSistema::fallo("No hemos podido iniciar con ese usuario.<br /><h3>".$Respuesta."</h3>", $Respuesta);
      }
    }else{
      echo RespuestasSistema::error('Ocurrio un eror en la consutla a la API.', $Respuesta);
    }
  }

  public function logout(){
    global $Api;
    $Api->desconectar();
    Cliente::cerrarSesion();
    echo RespuestasSistema::exito();
  }


}