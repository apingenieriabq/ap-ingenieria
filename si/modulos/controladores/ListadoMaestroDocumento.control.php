<?php

class ListadoMaestroDocumentoControlador extends Controladores {

  function documentosProceso(){
    global $Api;
    $Documentos = $Api->ejecutar(
      'institucional', 'documentos', 'delProcesoDelUsuario'
      , array( 'procesoID' => $this->procesoID )
      // ,false
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
  
  function buscarDocumentos(){      
    global $Api;
    $Documentos = $Api->ejecutar(
      'institucional', 'documentos', 'buscarPorPalabras'
      , array( 'palabras_buscar' => $this->palabras_buscar )
//       ,false
    );
//     print_r($Documentos);
    Vistas::mostrar('institucional', 'titulo-buscar', ['Palabras' => $this->palabras_buscar ] );
    Vistas::mostrar('institucional', 'navegador-documentos' , [ 'Documentos' => $Documentos, ] );
  }

}