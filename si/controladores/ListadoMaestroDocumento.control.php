<?php

class ListadoMaestroDocumentoControlador extends Controladores {

  function mostrarNavegador(){

    global $Api;
    // $Procesos = $Api->ejecutar(
    //   'institucional', 'procesos', 'delUsuario'//,
    //   // array( 'usuarioID' => Cliente::datos()->usuarioID )
    // );
    // $Documentos = $Api->ejecutar(
    //   'institucional', 'documentos', 'sinProcesoDelUsuario'//,
    //   // array( 'usuarioID' => Cliente::datos()->usuarioID )
    // );

    Vistas::mostrar('institucional', 'navegador' /**,[ 'Procesos' => $Procesos, 'Documentos' => $Documentos, ]*/ );
  }

}