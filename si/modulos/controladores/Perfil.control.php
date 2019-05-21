<?php

class PerfilControlador extends Controladores {

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

}