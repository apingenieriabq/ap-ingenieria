<?php

class ListadoMaestroDocumentoControlador extends Controladores {

  function documentosProceso(){
    global $Api;
    $Documentos = $Api->ejecutar(
      'institucional', 'documentos', 'delProcesoDelUsuario'
      , array( 'procesoID' => $this->procesoID ), true
    );
    // print_r($Documentos);
    Vistas::mostrar('institucional', 'navegador-documentos' ,[ 'Documentos' => $Documentos, ] );
  }

  function mostrarNavegador(){

    global $Api;
    $Procesos = $Api->ejecutar(
      'institucional', 'procesos', 'delUsuario'//,
      // array( 'usuarioID' => Cliente::datos()->usuarioID )
      // , null, false
    );
    // print_r($Procesos);
    $Documentos = null;

    Vistas::mostrar('institucional', 'navegador' ,
      [ 'Procesos' => $Procesos, 'Documentos' => $Documentos, ]
    );
  }

}