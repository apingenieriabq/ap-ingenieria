<?php

class UsuariosControlador extends Controladores {

  function perfil(){

    global $Api;
    $Usuario = $Api->ejecutar(
      'seguridad', 'usuarios', 'perfil',
      array( 'usuarioID' => Cliente::datos()->usuarioID )
    );

    Vistas::mostrar('usuarios', 'perfil', [ 'Usuario' => $Usuario ] );
  }


  function mostrarFormularioEditar(){

    global $Api;
    $Usuario = $Api->ejecutar(
      'seguridad', 'usuarios', 'perfil',
      array( 'usuarioID' => Cliente::datos()->usuarioID )
    );

    Vistas::mostrar('usuarios', 'form-perfil', [ 'Usuario' => $Usuario ] );
  }


  public function mostrarMenu(){
    global $Api;
    $Respuesta = $Api->ejecutar(
      'seguridad', 'usuarios', 'mostrarMenu',
      array( 'usuarioID' => Cliente::datos()->usuarioID )
    );
    print_r($Respuesta);
    // if(!is_null($Respuesta)){
    //   echo RespuestasSistema::exito($Respuesta);
    // }else{
    //   echo RespuestasSistema::error('Ocurrio un eror en la consutla a la API.', $Respuesta);
    // }
    return null;
  }


}