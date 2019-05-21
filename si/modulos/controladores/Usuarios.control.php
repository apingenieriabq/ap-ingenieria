<?php

class UsuariosControlador extends Controladores {

  function mostrarFormularioNuevoUsuario(){

    global $Api;
    $Operaciones = $Api->ejecutar(
      'seguridad', 'Operaciones', 'arbolCompleto'
      // ,null , false
    );
    // echo "*************";
    // print_r($Operaciones);
    // $Usuario = $Api->ejecutar(
    //   'seguridad', 'usuarios', 'perfil',
    //   array( 'usuarioID' => Cliente::datos()->usuarioID )
    // );

    Vistas::mostrar('usuarios', 'form-colaborador', [ 'Operaciones' => $Operaciones ] );
  }

}