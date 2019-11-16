<?php

class PerfilControlador extends Controladores {

  function delUsuario(){

    global $Api;
    $Listados = $Api->ejecutar(
      'listados', 'Formularios', 'formularioPerfilUsuario'
      // ,null , false
    );
    // print_r($Listados);
    $getUsuario = $Api->ejecutar(
      'seguridad', 'perfil', 'delUsuario',
      array( 'usuarioID' => Cliente::datos()->usuarioID )
    );
    // print_r($Usuario);
    Vistas::mostrar('usuarios', 'form-mini-perfil', [ 'Listados' => $Listados, 'DatosUsuario' => $getUsuario ] );
  }

  function actualizarDatosPersonales(){
     global $Api;
    $NuevoColaborador = $Api->ejecutar(
      'seguridad', 'perfil', 'actualizarDatosPersonales',[
        'personaID' => $this->personaID,
        'personaNOMBRES'  => $this->personaNOMBRES,
        'personaAPELLIDOS'  => $this->personaAPELLIDOS,
        'personaMUNICIPIO'  => $this->personaMUNICIPIO,
        'personaDIRECCION'  => $this->personaDIRECCION,
        'personaEMAIL' => $this->personaEMAIL,
        'usuarioCLAVE' => $this->usuarioCLAVE,
      ]
      , false
    );
      // var_dump($NuevoColaborador);
    if($NuevoColaborador->RESPUESTA == 'EXITO'){
      echo RespuestasSistema::exito( $NuevoColaborador->MENSAJE,$NuevoColaborador->DATOS);
    }else{
      echo RespuestasSistema::error( $NuevoColaborador->MENSAJE );
    }
  }



}