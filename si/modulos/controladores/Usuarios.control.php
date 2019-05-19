<?php

class UsuariosControlador extends Controladores {

  function perfil(){

    global $Api;
    $Usuario = $Api->ejecutar(
      'seguridad', 'usuarios', 'perfil',
      array( 'usuarioID' => Cliente::datos()->usuarioID )
    );

    Vistas::mostrar('perfil', 'usuario', [ 'Usuario' => $Usuario ] );
  }

}