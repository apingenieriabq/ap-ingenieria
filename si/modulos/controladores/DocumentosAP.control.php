<?php

class DocumentosAPControlador extends Controladores {

  function listadoProcesosFormulario(){

      global $Api;
      $Procesos = $Api->ejecutar(
        'institucional', 'procesos', 'delUsuario'//,
        // array( 'usuarioID' => Cliente::datos()->usuarioID )
        // , null, false
      );
      foreach($Procesos as $Proceso){
        echo '<div class="custom-control custom-radio mb-1">'
            .'<input type="radio" id="proceso'.$Proceso->procesoID.'" name="procesoID" class="custom-control-input" required > '
            .'<label class="custom-control-label" for="proceso'.$Proceso->procesoID.'">'.$Proceso->procesoTITULO.'</label> '
            .'</div>';
      }
  }

  function listadoColaboradoresPorCargo(){

      global $Api;
      $Colaboradores = $Api->ejecutar(
        'directorios', 'colaboradores', 'porCargo'
        , array( 'cargoID' => $this->cargoID )
        // , null
        // , false
      );
      if(count($Colaboradores)){
        foreach($Colaboradores as $Colaborador){
          echo '<option value="'.$Colaborador->colaboradorID.'" >'.$Colaborador->Persona->personaIDENTIFICACION.' - '.$Colaborador->Persona->personaNOMBRES.' '.$Colaborador->Persona->personaAPELLIDOS.'</option>';
        }
      }else{
        echo '<option value="">No hay colaboradores en ese cargo</option>';
      }
  }



  function mostrarTodos(){
    global $Api;
    $DocumentosAP = $Api->ejecutar(
      'institucional', 'documentos', 'todosCompletos'
      // ,null, false
    );
    // print_r($DocumentosAP);
    Vistas::mostrar('institucional/documentos', 'todos' ,
      [ 'DocumentosAP' => $DocumentosAP ]
    );
  }
  function mostrarDocumentoEnModal(){
    // print_r($this);
    global $Api;
    $DocumentoAP = $Api->ejecutar(
      'institucional', 'documentos', 'datosCompletos'
      , ['documentoID' => $this->documentoID ]
      // , false
    );
    print_r($DocumentoAP);
    Vistas::mostrar('institucional/documentos', 'modal-documento' ,
      [ 'DocumentoAP' => $DocumentoAP ]
    );
  }

  function mostrarFormularioNuevo(){
    $this->mostrarFormulario();
  }
  function mostrarFormularioEditar(){
    $this->mostrarFormulario();
  }

  function mostrarFormulario($DocumentoAP = null){
      global $Api;

      // $Procesos = $Api->ejecutar(
      //   'institucional', 'procesos', 'todos'//,
      //   // array( 'usuarioID' => Cliente::datos()->usuarioID )
      //   // , null, false
      // );

      // $Cargos = $Api->ejecutar(
      //   'listados', 'cargos', 'todos'//,
      //   // array( 'usuarioID' => Cliente::datos()->usuarioID )
      //   // , null, false
      // );

      $ProcesosCargos = $Api->ejecutar(
        'institucional', 'documentos', 'listadoProcesosCargos'//,
        // , null, false
      );

      if(isset($this->documentoID)){
        $DocumentoAP = $Api->ejecutar(
          'institucional', 'documentos', 'datosCompletos'
          , ['documentoID' => $this->documentoID ]
          // , false
        );
      }
      Vistas::mostrar('institucional/documentos', 'formulario' ,
      [
        'Procesos' => $ProcesosCargos->Procesos,
        'Cargos' => $ProcesosCargos->Cargos,
        'DocumentoAP' => $DocumentoAP
      ] );
  }


  function recibirMiniatura(){
    if(isset($this->documentoIMAGEN)){
      $carpeta = 'temporales'.DS.'documentos'.DS;
      $nombre = uniqid().".".Archivos::extension($this->documentoIMAGEN);
      $ruta = $carpeta.$nombre;
      $cargado = Archivos::moverArchivoRecibido($this->documentoIMAGEN, $carpeta, $nombre);
      if($cargado){
        echo RespuestasSistema::exito('Minatura Cargada correctamente.', $ruta);
      }else{
        echo RespuestasSistema::fallo("No se pudo mover el archivo. ".$cargado, $cargado);
      }
    }else{
      echo RespuestasSistema::error("No llegó la imagen / archivo.");
    }

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

  function cambiarVisibilidad(){
     global $Api;
      $DocumentoAP = $Api->ejecutar(
        'institucional', 'Documentos', 'cambiarVisibilidad'
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

  function cambiarSeguridad(){
     global $Api;
      $DocumentoAP = $Api->ejecutar(
        'institucional', 'Documentos', 'cambiarSeguridad'
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