<?php


class ProcesosControlador extends Controladores {

  function todos(){
    $P = new ProcesosAP();
    return Respuestassistema::exito("Todos los Procesos de AP INGENENIERIA",$P->todos());
  }

  function delUsuario(){
    $P = new ProcesosAP();
    if(Usuario::esAdministrador()){
      return Respuestassistema::exito("Todos los Procesos de AP INGENENIERIA",$P->todos());
    }
    return Respuestassistema::exito("Los Procesos de AP INGENENIERIA asociados al usuario.",$P->delUsuario());
  }

  public function datos()
  {
      if (empty($this->procesoID)) {
          return Respuestassistema::error("No llego procesoID. Verifique los datos, o contacte al Centro TICS.");
      } else {
          return Respuestassistema::exito("Datos para el Proceso ".$this->procesoID, new ProcesosAP($this->procesoID) );
      }
  }

  public function guardarSoloNombre(){
    $validacion = $this->validarDatosEnviados(['procesoTITULO']);
    if(empty($validacion)){
      $NuevoProceso = new ProcesosAP();
      $NuevoProceso->guardarSoloTitulo(ucwords($this->procesoTITULO));
      return Respuestassistema::exito("Todo Bien", $NuevoProceso);
    }else{
      return Respuestassistema::error("No llegarón los datos OBLIGATORIOS para la operación. <br />" . $validacion);
    }
  }

  public function nuevo()
  {
    $validacion = $this->validarDatosEnviados(
      ['tipoIdentificacionID','cargoID','tipoProcesoID', 'tipoIdentificacionID', 'personaIDENTIFICACION', 'procesoEMAIL', 'personaNOMBRES', 'personaAPELLIDOS' ]
    );
    if(empty($validacion)){
    }else{
      return Respuestassistema::error("No llegarón los datos OBLIGATORIOS para la operación. <br />" . $validacion);
    }

  }

  public function actualizar()
  {
    $validacion = $this->validarDatosEnviados(
      ['procesoID', 'tipoIdentificacionID','cargoID','tipoProcesoID', 'tipoIdentificacionID', 'personaIDENTIFICACION', 'procesoEMAIL', 'personaNOMBRES', 'personaAPELLIDOS' ]
    );
    if(empty($validacion)){

    }else{
      return Respuestassistema::error("No llegarón los datos OBLIGATORIOS para la operación. <br />" . $validacion);
    }

  }


  public function activar()
  {
      if (empty($this->procesoID)) {
          return Respuestassistema::error("No llego procesoID. Verifique los datos, o contacte al Centro TICS.");
      } else {
        $Proceso = new Procesos($this->procesoID);
        $Proceso->activar();
        return Respuestassistema::exito("Proceso ".$this->procesoID. " ACTIVADO.", $Proceso );
      }
  }


  public function desactivar()
  {
    if (empty($this->procesoID)) {
      return Respuestassistema::error("No llego procesoID. Verifique los datos, o contacte al Centro TICS.");
    } else {
      $Proceso = new Procesos($this->procesoID);
      $Proceso->desactivar();
      return Respuestassistema::exito("Proceso ".$this->procesoID. " DESACTIVADO.", $Proceso );
    }
  }

  public function suspender()
  {
    if (empty($this->procesoID)) {
      return Respuestassistema::error("No llego procesoID. Verifique los datos, o contacte al Centro TICS.");
    } else {
      $Proceso = new Procesos($this->procesoID);
      $Proceso->suspender();
      return Respuestassistema::exito("Proceso ".$this->procesoID. " SUSPENDIDO.", $Proceso );
    }
  }





}