<?php

class ColaboradoresControlador extends Controladores {

  function mostrarColaboradorEnModal(){
    global $Api;
    $UsuarioColaborador = $Api->ejecutar(
      'Directorios', 'Colaboradores', 'datosCompletos',
      array( 'colaboradorID' => $this->colaboradorID )
    );
    Vistas::mostrar('usuarios/colaboradores', 'perfil-estadisticas'
      ,[ 'UsuarioColaborador' => $UsuarioColaborador ]
    );
  }

  function enviarPapelera(){
     global $Api;
      $UsuarioColaborador = $Api->ejecutar(
        'Directorios', 'Colaboradores', 'enviarPapelera'
        , ['colaboradorID' => $this->colaboradorID]
        , false
      );
      // echo $UsuarioColaborador;
      if($UsuarioColaborador->RESPUESTA == 'EXITO'){
        echo RespuestasSistema::exito( $UsuarioColaborador->MENSAJE,$UsuarioColaborador);
      }else{
        echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>".$UsuarioColaborador->MENSAJE."</h3>", $UsuarioColaborador);
      }
  }

  function cambiarEstado(){
     global $Api;
      $UsuarioColaborador = $Api->ejecutar(
        'Directorios', 'Colaboradores', 'cambiarEstado'
        , ['colaboradorID' => $this->colaboradorID]
        , false
      );
      // var_dump($UsuarioColaborador);
      if($UsuarioColaborador->RESPUESTA == 'EXITO'){
        echo RespuestasSistema::exito( $UsuarioColaborador->MENSAJE,$UsuarioColaborador);
      }else{
        echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>".$UsuarioColaborador->MENSAJE."</h3>", $UsuarioColaborador);
      }
  }

  function cambiarVisibilidad(){
     global $Api;
      $UsuarioColaborador = $Api->ejecutar(
        'Directorios', 'Colaboradores', 'cambiarVisibilidad'
        , ['colaboradorID' => $this->colaboradorID]
        , false
      );
      // var_dump($UsuarioColaborador);
      if($UsuarioColaborador->RESPUESTA == 'EXITO'){
        echo RespuestasSistema::exito( $UsuarioColaborador->MENSAJE,$UsuarioColaborador);
      }else{
        echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>".$UsuarioColaborador->MENSAJE."</h3>", $UsuarioColaborador);
      }
  }

  function cambiarSeguridad(){
     global $Api;
      $UsuarioColaborador = $Api->ejecutar(
        'Directorios', 'Colaboradores', 'cambiarSeguridad'
        , ['colaboradorID' => $this->colaboradorID]
        , false
      );
      // var_dump($UsuarioColaborador);
      if($UsuarioColaborador->RESPUESTA == 'EXITO'){
        echo RespuestasSistema::exito( $UsuarioColaborador->MENSAJE,$UsuarioColaborador);
      }else{
        echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>".$UsuarioColaborador->MENSAJE."</h3>", $UsuarioColaborador);
      }
  }


  function mostrarTodos(){

    global $Api;
    $Colaboradores = $Api->ejecutar(
      'Directorios', 'Colaboradores', 'todosCompletos'
      // ,null , false
    );
    // print_r($Colaboradores);
    Vistas::mostrar('usuarios', 'colaboradores/tbl-todos', [ 'Colaboradores' => $Colaboradores] );
  }

  function recibirFotoColaborador(){

    // print_r($this);

    if(isset($this->colaboradorFOTO)){
      $carpeta = 'temporales'.DS.'colaboradores'.DS;
      $nombre = uniqid().".".Archivos::extension($this->colaboradorFOTO);
      $ruta = $carpeta.$nombre;
      $cargado = Archivos::moverArchivoRecibido($this->colaboradorFOTO, $carpeta, $nombre);
      if($cargado){
        echo RespuestasSistema::exito('Foto del Colaborador Cargada correctamente.', $ruta);
      }else{
        echo RespuestasSistema::fallo("No se pudo mover el archivo. ".$cargado, $cargado);
      }
    }else{
      echo RespuestasSistema::error("No llegó la imagen / archivo.");
    }

  }

  function recibirFirmaColaborador(){
    if(isset($this->colaboradorFIRMA)){
      $carpeta = 'temporales'.DS.'colaboradores'.DS;
      $nombre = uniqid().".".Archivos::extension($this->colaboradorFIRMA);
      $ruta = $carpeta.$nombre;
      $cargado = Archivos::moverArchivoRecibido($this->colaboradorFIRMA, $carpeta, $nombre);
      if($cargado){
        echo RespuestasSistema::exito('Firma del Colaborador Cargada correctamente.', $ruta);
      }else{
        echo RespuestasSistema::fallo("No se pudo mover el archivo. ".$cargado, $cargado);
      }
    }else{
      echo RespuestasSistema::error("No llegó la imagen / archivo.");
    }

  }

  function mostrarFormularioNuevo(){

    global $Api;
    $Listados = $Api->ejecutar(
      'listados', 'Formularios', 'formularioUsuarioColaborador'
      // ,null , false
    );
    $UsuarioColaborador = null;
    Vistas::mostrar('usuarios', 'form-colaborador', [ 'Listados' => $Listados, 'UsuarioColaborador' => $UsuarioColaborador ] );
  }

  function mostrarFormularioEditar(){

    global $Api;
    $Listados = $Api->ejecutar(
      'listados', 'Formularios', 'formularioUsuarioColaborador'
      // ,null , false
    );
    $UsuarioColaborador = $Api->ejecutar(
      'Directorios', 'Colaboradores', 'datosCompletosConPermisos',
      array( 'colaboradorID' => $this->colaboradorID )
    );
    Vistas::mostrar('usuarios', 'form-colaborador', [ 'Listados' => $Listados, 'UsuarioColaborador' => $UsuarioColaborador ] );
  }

  function guardarDatos(){
    // print_r($this);
    $ruta_foto = null;
    if(!empty($this->colaboradorFOTO_RUTA)){
      $ruta_foto = DIR_BASE.$this->colaboradorFOTO_RUTA;
    }
    $ruta_firma = null;
    if(!empty($this->colaboradorFIRMA_RUTA)){
      $ruta_firma = DIR_BASE.$this->colaboradorFIRMA_RUTA;
    }

    global $Api;
    $NuevoColaborador = $Api->enviar(
      'directorios', 'colaboradores', 'guardarCambios',[
        'usuarioID' => $this->usuarioID,
        'colaboradorID' => $this->colaboradorID,
        'tipoIdentificacionID' => $this->tipoIdentificacionID,
        'personaIDENTIFICACION'  => $this->personaIDENTIFICACION,
        'personaNIT'  => $this->personaNIT,
        'personaNOMBRES'  => $this->personaNOMBRES,
        'personaAPELLIDOS'  => $this->personaAPELLIDOS,
        'personaMUNICIPIO'  => $this->personaMUNICIPIO,
        'personaDIRECCION'  => $this->personaDIRECCION,
        'personaTELEFONO'  => $this->personaTELEFONO,
        'personaCELULAR' => $this->personaCELULAR,
        'personaEMAIL' => $this->personaEMAIL,
        'cargoID' => $this->cargoID,
        'tipoColaboradorID' => $this->tipoColaboradorID,
        'colaboradorFCHINGRESO' => $this->colaboradorFCHINGRESO,
        'colaboradorCELULAR' => $this->colaboradorCELULAR,
        'colaboradorEMAIL' => $this->colaboradorEMAIL,
        'colaboradorJEFEINMEDIATO' => $this->colaboradorJEFEINMEDIATO,
        'colaboradorAPROBADOR' => $this->colaboradorAPROBADOR,
        'usuarioNOMBRE' => $this->usuarioNOMBRE,
        'usuarioCLAVE' => $this->usuarioCLAVE,
        'usuarioADMINISTRADOR' => isset( $this->usuarioADMINISTRADOR ) ? $this->usuarioADMINISTRADOR : 'NO',
        'listadoCONFIDENCIALIDAD' => $this->listadoCONFIDENCIALIDAD,
        'listadoPERMISOS' => $this->listadoPERMISOS
      ],[
        'colaboradorFOTO' => $ruta_foto,
        'colaboradorFIRMA' => $ruta_firma
      ]
      , false
    );
      // var_dump($NuevoColaborador);
    if($NuevoColaborador->RESPUESTA == 'EXITO'){
      echo RespuestasSistema::exito( $NuevoColaborador->MENSAJE,$NuevoColaborador->DATOS);
    }else{
      echo RespuestasSistema::error( $NuevoColaborador );
    }
  }

}