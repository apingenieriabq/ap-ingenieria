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


function mostrarFormularioNuevo(){
  $this->mostrarFormulario();
}

function mostrarFormulario(){


    global $Api;
    $Procesos = $Api->ejecutar(
      'institucional', 'procesos', 'todos'//,
      // array( 'usuarioID' => Cliente::datos()->usuarioID )
      // , null, false
    );
    $Cargos = $Api->ejecutar(
      'listados', 'cargos', 'todos'//,
      // array( 'usuarioID' => Cliente::datos()->usuarioID )
      // , null, false
    );
    Vistas::mostrar('institucional/documentos', 'formulario' ,[ 'Procesos' => $Procesos, 'Cargos' => $Cargos ] );
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
    // print_r($DocumentoAP);die();
    if(is_object($DocumentoAP) and !empty($DocumentoAP) ){
      $miniatura = $Api->enviar(
        'institucional', 'Documentos', 'recibirActualizarMiniatura'
        ,['documentoID' => $DocumentoAP->documentoID,'procesoID' => $DocumentoAP->procesoID,'documentoCODIGO' => $DocumentoAP->documentoCODIGO]
        ,[ 'documentoMINIATURA' => DIR_BASE.$this->documentoIMAGEN_RUTA]
        // , false
      );
      echo RespuestasSistema::exito('Guardado correctamente el nuevo documento de código ['.$DocumentoAP->documentoCODIGO.'].',$DocumentoAP);
    }else{
      echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>".$DocumentoAP."</h3>", $DocumentoAP);
    }
}


}