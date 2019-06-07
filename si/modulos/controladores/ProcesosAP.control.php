<?php

class ProcesosAPControlador extends Controladores {

  function listadoColaboradoresPorCargo(){

      global $Api;
      $Colaboradores = $Api->ejecutar(
        'directorios', 'colaboradores', 'porCargo'
        , array( 'cargoID' => $this->cargoID )
        // , false
      );
      // print_r($Colaboradores);
      if(count($Colaboradores)){
        foreach($Colaboradores as $Colaborador){
          echo '<option value="'.$Colaborador->colaboradorID.'" >'.$Colaborador->Persona->personaIDENTIFICACION.' - '.$Colaborador->Persona->personaNOMBRES.' '.$Colaborador->Persona->personaAPELLIDOS.'</option>';
        }
      }else{
        echo '<option value="">No hay colaboradores en ese cargo</option>';
      }
  }

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

  function mostrarDetallesEnModal(){
    // print_r($this);
    global $Api;
    $ProcesoAP = $Api->ejecutar(
      'institucional', 'procesos', 'datosCompletos'
      , ['procesoID' => $this->procesoID ]
      // , false
    );
    // print_r($ProcesoAP);
    Vistas::mostrar('institucional/procesos', 'modal-detalles' ,
      [ 'ProcesoAP' => $ProcesoAP ]
    );
  }

  function mostrarTodos(){
    global $Api;
    $ProcesosAP = $Api->ejecutar(
      'institucional', 'Procesos', 'mostrarTodos' 
      // ,null, false
    );
    // print_r($ProcesosAP);
    Vistas::mostrar('institucional/procesos', 'todos' ,
      [ 'ProcesosAP' => $ProcesosAP ]
    );
  }

  function mostrarFormularioNuevo(){
    $this->mostrarFormulario();
  }
  function mostrarFormularioEditar(){
    $this->mostrarFormulario();
  }

  function mostrarFormulario($ProcesoAP = null){
      global $Api;
      $Listados = $Api->ejecutar(
        'institucional', 'procesos', 'listadosFormulario'//,
        // , null, false
      );

      if(isset($this->procesoID)){
        $ProcesoAP = $Api->ejecutar(
          'institucional', 'procesos', 'datosCompletos'
          , ['procesoID' => $this->procesoID ]
          // , false
        );
      }
      Vistas::mostrar('institucional/procesos', 'formulario' ,
      [
        'Cargos' => $Listados->Cargos
      ] );
  }
  

  function guardarDatos(){
    if( !isset($this->documentoRESPONSABLE) or empty($this->documentoRESPONSABLE) ){

        if(isset($this->documentoRESPONSABLE_ACTUAL) and !empty($this->documentoRESPONSABLE_ACTUAL) ){
          $this->documentoRESPONSABLE = $this->documentoRESPONSABLE_ACTUAL;
        }else{
          $this->documentoRESPONSABLE = Cliente::colaboradorID();
        }

    }
    if(isset($this->documentoID)){
      $this->guardarCambios();
    }else{
      $this->guardarNuevo();
    }
  }
  function guardarCambios(){
      global $Api;
      $DocumentoAP = $Api->ejecutar(
        'institucional', 'Documentos', 'actualizar'
        , [
          'documentoID' => $this->documentoID ,
          'procesoID' => $this->procesoID ,
          'documentoVERSION' => $this->documentoVERSION ,
          'documentoPUBLICADO' => $this->documentoPUBLICADO ,
          'documentoNOMBRE' => $this->documentoNOMBRE ,
          'documentoCONTENIDO' => $this->documentoCONTENIDO ,
          'documentoURL' => $this->documentoURL ,
          'documentoRESPONSABLE' => $this->documentoRESPONSABLE ,
          'documentoOBSERVACIONES' => $this->documentoOBSERVACIONES ,
        ]
        // , null
        // , false
      );
      // print_r($DocumentoAP);
      if(is_object($DocumentoAP) and !empty($DocumentoAP->documentoID) ){
        if(!empty($this->documentoIMAGEN_RUTA)){
          $miniatura = $Api->enviar(
            'institucional', 'Documentos', 'recibirActualizarMiniatura'
            ,['documentoID' => $DocumentoAP->documentoID,'procesoID' => $DocumentoAP->procesoID,'documentoCODIGO' => $DocumentoAP->documentoCODIGO]
            ,[ 'documentoMINIATURA' => DIR_BASE.$this->documentoIMAGEN_RUTA]
            // , false
          );
        }
        echo RespuestasSistema::exito('Actualizado correctamente el nuevo documento de código ['.$DocumentoAP->documentoCODIGO.'].',$DocumentoAP);
      }else{
        echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>".$DocumentoAP."</h3>", $DocumentoAP);
      }
  }
  function guardarNuevo(){
      global $Api;
      $DocumentoAP = $Api->ejecutar(
        'institucional', 'Documentos', 'nuevo'
        , [
          'procesoID' => $this->procesoID ,
          'documentoVERSION' => $this->documentoVERSION ,
          'documentoPUBLICADO' => $this->documentoPUBLICADO ,
          'documentoNOMBRE' => $this->documentoNOMBRE ,
          'documentoCONTENIDO' => $this->documentoCONTENIDO ,
          'documentoURL' => $this->documentoURL ,
          'documentoRESPONSABLE' => $this->documentoRESPONSABLE ,
          'documentoOBSERVACIONES' => $this->documentoOBSERVACIONES ,
        ]
        // , null
        // , false
      );
      if(is_object($DocumentoAP) and !empty($DocumentoAP->documentoID) ){
        if(!empty($this->documentoIMAGEN_RUTA)){
          $miniatura = $Api->enviar(
            'institucional', 'Documentos', 'recibirActualizarMiniatura'
            ,['documentoID' => $DocumentoAP->documentoID,'procesoID' => $DocumentoAP->procesoID,'documentoCODIGO' => $DocumentoAP->documentoCODIGO]
            ,[ 'documentoMINIATURA' => DIR_BASE.$this->documentoIMAGEN_RUTA]
            // , false
          );
        }
        echo RespuestasSistema::exito('Guardado correctamente el nuevo documento de código ['.$DocumentoAP->documentoCODIGO.'].',$DocumentoAP);
      }else{
        echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>".$DocumentoAP."</h3>", $DocumentoAP);
      }
  }


  function enviarPapelera(){
     global $Api;
      $DocumentoAP = $Api->ejecutar(
        'institucional', 'Documentos', 'enviarPapelera'
        , ['documentoID' => $this->documentoID]
        , false
      );
      // var_dump($DocumentoAP);
      if($DocumentoAP->RESPUESTA == 'EXITO'){
        echo RespuestasSistema::exito( $DocumentoAP->MENSAJE,$DocumentoAP);
      }else{
        echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>".$DocumentoAP->MENSAJE."</h3>", $DocumentoAP);
      }
  }

  function cambiarEstado(){
     global $Api;
      $DocumentoAP = $Api->ejecutar(
        'institucional', 'Documentos', 'cambiarEstado'
        , ['documentoID' => $this->documentoID]
        , false
      );
      // var_dump($DocumentoAP);
      if($DocumentoAP->RESPUESTA == 'EXITO'){
        echo RespuestasSistema::exito( $DocumentoAP->MENSAJE,$DocumentoAP);
      }else{
        echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>".$DocumentoAP->MENSAJE."</h3>", $DocumentoAP);
      }
  }

}