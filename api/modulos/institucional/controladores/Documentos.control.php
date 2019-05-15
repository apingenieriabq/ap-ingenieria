<?php


class DocumentosControlador extends Controladores {

  function todos(){
    $P = new DocumentosAP();
    return Respuestassistema::exito("Todos los Documentos de AP INGENENIERIA",$P->todos());
  }

  function sinProcesoDelUsuario(){
    $P = new DocumentosAP();
    if(Usuario::esAdministrador()){
      return Respuestassistema::exito("Todos los Documentos de AP INGENENIERIA",$P->todosSinProceso());
    }
    return Respuestassistema::exito("Los Documentos de AP INGENENIERIA asociados al usuario.",$P->todosSinProcesoDelUsuario('SI'));
  }

  function delProcesoDelUsuario(){

    if (empty($this->procesoID)) {
        return Respuestassistema::error("No llego procesoID. Verifique los datos, o contacte al Centro TICS.");
    } else {
      $P = new DocumentosAP();
      if(Usuario::esAdministrador()){
        return Respuestassistema::exito("Todos los Documentos del Proceso ",$P->todosdelProceso($this->procesoID));
      }
      return Respuestassistema::exito("Los Documentos del Proceso asociados al usuario.",$P->todosDelProcesoDelUsuario($this->procesoID, 'SI'));

    }

  }

  function delUsuario(){
    $P = new DocumentosAP();
    if(Usuario::esAdministrador()){
      return Respuestassistema::exito("Todos los Documentos de AP INGENENIERIA",$P->todos());
    }
    return Respuestassistema::exito("Los Documentos de AP INGENENIERIA asociados al usuario.",$P->delUsuario());
  }

  public function datos()
  {
      if (empty($this->documentoID)) {
          return Respuestassistema::error("No llego documentoID. Verifique los datos, o contacte al Centro TICS.");
      } else {
          return Respuestassistema::exito("Datos para el Documento ".$this->documentoID, new DocumentosAP($this->documentoID) );
      }
  }

  public function nuevo()
  {
    $validacion = $this->validarDatosEnviados(
      ['procesoID','documentoVERSION','documentoPUBLICADO', 'documentoNOMBRE', 'documentoCONTENIDO', 'documentoRESPONSABLE']
    );
    if(empty($validacion)){

      $Doc = new DocumentosAP();
      $Doc->nuevo(
        $this->procesoID ,
        $this->documentoVERSION ,
        $this->documentoPUBLICADO ,
        $this->documentoNOMBRE ,
        $this->documentoCONTENIDO ,
        $this->documentoURL ,
        $this->documentoRESPONSABLE ,
        $this->documentoOBSERVACIONES
      );
      return Respuestassistema::exito("Datos del Nuevo Documento AP", $Doc);

    }else{
      return Respuestassistema::error("No llegarón los datos OBLIGATORIOS para la operación. <br />" . $validacion);
    }

  }

  public function actualizar()
  {
    $validacion = $this->validarDatosEnviados(
      ['documentoID', 'tipoIdentificacionID','cargoID','tipoDocumentoID', 'tipoIdentificacionID', 'personaIDENTIFICACION', 'documentoEMAIL', 'personaNOMBRES', 'personaAPELLIDOS' ]
    );
    if(empty($validacion)){

    }else{
      return Respuestassistema::error("No llegarón los datos OBLIGATORIOS para la operación. <br />" . $validacion);
    }

  }


  public function activar()
  {
      if (empty($this->documentoID)) {
          return Respuestassistema::error("No llego documentoID. Verifique los datos, o contacte al Centro TICS.");
      } else {
        $Documento = new Documentos($this->documentoID);
        $Documento->activar();
        return Respuestassistema::exito("Documento ".$this->documentoID. " ACTIVADO.", $Documento );
      }
  }


  public function desactivar()
  {
    if (empty($this->documentoID)) {
      return Respuestassistema::error("No llego documentoID. Verifique los datos, o contacte al Centro TICS.");
    } else {
      $Documento = new Documentos($this->documentoID);
      $Documento->desactivar();
      return Respuestassistema::exito("Documento ".$this->documentoID. " DESACTIVADO.", $Documento );
    }
  }

  public function suspender()
  {
    if (empty($this->documentoID)) {
      return Respuestassistema::error("No llego documentoID. Verifique los datos, o contacte al Centro TICS.");
    } else {
      $Documento = new Documentos($this->documentoID);
      $Documento->suspender();
      return Respuestassistema::exito("Documento ".$this->documentoID. " SUSPENDIDO.", $Documento );
    }
  }





}