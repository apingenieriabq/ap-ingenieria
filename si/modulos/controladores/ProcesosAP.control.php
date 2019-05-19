<?php

class ProcesosAPControlador extends Controladores {

  function guardarSoloTitulo(){
    global $Api;
    $NuevoProceso = $Api->ejecutar(
      'institucional', 'procesos', 'guardarSoloNombre'
      , array( 'procesoTITULO' => $this->procesoTITULO )
    );
    if( is_object($NuevoProceso) ){
      echo RespuestasSistema::exito('Guardar Proceso - Solo Titulo ', $NuevoProceso);
    }else{
      echo RespuestasSistema::alerta( $NuevoProceso);
    }

  }

}