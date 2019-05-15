<?php


class ColaboradoresControlador extends Controladores {

  function porCargo(){
    $P = new Colaboradores();
    return Respuestassistema::exito("Todos los Colaboradoes con cargo de AP INGENENIERIA",
      $P->conCargo($this->cargoID)
    );
  }

  function todos(){
    $P = new Colaboradores();
    return Respuestassistema::exito("Todos los Colaboradoes de AP INGENENIERIA",$P->todos());
  }

  public function datos()
  {
      if (empty($this->colaboradorID)) {
          return Respuestassistema::error("No llego colaboradorID. Verifique los datos, o contacte al Centro TICS.");
      } else {
          return Respuestassistema::exito("Datos para el Colaborador ".$this->colaboradorID, new Colaboradores($this->colaboradorID) );
      }
  }

  public function nuevo()
  {
    $validacion = $this->validarDatosEnviados(
      ['tipoIdentificacionID','cargoID','tipoColaboradorID', 'tipoIdentificacionID', 'personaIDENTIFICACION', 'colaboradorEMAIL', 'personaNOMBRES', 'personaAPELLIDOS' ]
    );
    if(empty($validacion)){

      $Persona =  new Personas($this->tipoIdentificacionID, $this->personaIDENTIFICACION);
      if(empty($Persona->personaID)){
        $Persona->personaID = $Persona->insertar([
          'tipoIdentificacionID' => $this->tipoIdentificacionID,
          'personaIDENTIFICACION' => $this->personaIDENTIFICACION,
          'personaRAZONSOCIAL' => $this->personaNOMBRES." ".$this->personaAPELLIDOS,
          'personaNOMBRES' => $this->personaNOMBRES,
          'personaAPELLIDOS' => $this->personaAPELLIDOS,
          'personaFCHNACIMIENTO' => $this->personaFCHNACIMIENTO,
          'personaSEXO' => $this->personaSEXO,
          'personaTIPOSANGRE' => $this->personaTIPOSANGRE,
          'personaEMAIL' => $this->personaEMAIL,
          'personaIMAGEN' => $this->colaboradorFOTO
        ]);
      }

      $Colaborador = new Colaboradores();
      $Colaborador->crear(
        $this->cargoID, $Persona->personaID, $this->tipoColaboradorID, $this->colaboradorEMAIL,
        $this->verificar('colaboradorFCHINGRESO', date('Y-m-d') ),
        $this->verificar('colaboradorEXTENSION'),
        $this->verificar('colaboradorCELULAR'),
        $this->verificar('colaboradorFIRMA','media/img/firma.png'),
        $this->verificar('colaboradorFOTO','media/img/super-tux.png'),
        $this->verificar('colaboradorJEFEINMEDIATO'),
        $this->verificar('colaboradorAPROBADOR')
      );
      if ($Colaborador->colaboradorID) {
          return Respuestassistema::exito(null, $Colaborador);
      } else {
          return Respuestassistema::error("No se pudo guardar el nuevo COLABORADOR");
      }
    }else{
      return Respuestassistema::error("No llegarón los datos OBLIGATORIOS para la operación. <br />" . $validacion);
    }

  }

  public function actualizar()
  {
    $validacion = $this->validarDatosEnviados(
      ['colaboradorID', 'tipoIdentificacionID','cargoID','tipoColaboradorID', 'tipoIdentificacionID', 'personaIDENTIFICACION', 'colaboradorEMAIL', 'personaNOMBRES', 'personaAPELLIDOS' ]
    );
    if(empty($validacion)){
      $actualizoPersona = false;
      $Persona =  new Personas($this->tipoIdentificacionID, $this->personaIDENTIFICACION);
      if(empty($Persona->personaID)){
        $Persona->personaID = $Persona->crear(
          $this->tipoIdentificacionID,$this->personaIDENTIFICACION,$this->personaNOMBRES, $this->personaAPELLIDOS,
          $this->verificar('personaFCHNACIMIENTO'),
          $this->verificar('personaSEXO'),
          $this->verificar('personaTIPOSANGRE'),
          $this->verificar('personaEMAIL'),
          $this->verificar('colaboradorFOTO')
        );
        $actualizoPersona = true;
      }else{
        $Persona->modificar(
          $this->tipoIdentificacionID,$this->personaIDENTIFICACION,$this->personaNOMBRES,$this->personaAPELLIDOS,
          $this->verificar('personaFCHNACIMIENTO'),
          $this->verificar('personaSEXO'),
          $this->verificar('personaTIPOSANGRE'),
          $this->verificar('personaEMAIL'),
          $this->verificar('colaboradorFOTO')
        );
        $actualizoPersona = true;
      }

      if(!empty($Persona->personaID)){
        $Colaborador = new Colaboradores($this->colaboradorID);
        $actualizoColaborador = $Colaborador->modificar(
          $this->cargoID,$Persona->personaID, $this->tipoColaboradorID, $this->colaboradorEMAIL,
          $this->verificar('colaboradorFCHINGRESO', date('Y-m-d') ),
          $this->verificar('colaboradorEXTENSION'),
          $this->verificar('colaboradorCELULAR'),
          $this->verificar('colaboradorFIRMA','media/img/firma.png'),
          $this->verificar('colaboradorFOTO','media/img/super-tux.png'),
          $this->verificar('colaboradorJEFEINMEDIATO'),
          $this->verificar('colaboradorAPROBADOR')
        );
        if ($actualizoColaborador or $actualizoPersona ) {
            return Respuestassistema::exito(null, $Colaborador);
        } else {
            return Respuestassistema::error("No fue posible actualizar los datos del COLABORADOR");
        }
      }else{
        return Respuestassistema::error("No se pudo guardar el actualizar los datos de la persona asociada como COLABORADOR");
      }

    }else{
      return Respuestassistema::error("No llegarón los datos OBLIGATORIOS para la operación. <br />" . $validacion);
    }

  }


  public function activar()
  {
      if (empty($this->colaboradorID)) {
          return Respuestassistema::error("No llego colaboradorID. Verifique los datos, o contacte al Centro TICS.");
      } else {
        $Colaborador = new Colaboradores($this->colaboradorID);
        $Colaborador->activar();
        return Respuestassistema::exito("Colaborador ".$this->colaboradorID. " ACTIVADO.", $Colaborador );
      }
  }


  public function desactivar()
  {
    if (empty($this->colaboradorID)) {
      return Respuestassistema::error("No llego colaboradorID. Verifique los datos, o contacte al Centro TICS.");
    } else {
      $Colaborador = new Colaboradores($this->colaboradorID);
      $Colaborador->desactivar();
      return Respuestassistema::exito("Colaborador ".$this->colaboradorID. " DESACTIVADO.", $Colaborador );
    }
  }

  public function suspender()
  {
    if (empty($this->colaboradorID)) {
      return Respuestassistema::error("No llego colaboradorID. Verifique los datos, o contacte al Centro TICS.");
    } else {
      $Colaborador = new Colaboradores($this->colaboradorID);
      $Colaborador->suspender();
      return Respuestassistema::exito("Colaborador ".$this->colaboradorID. " SUSPENDIDO.", $Colaborador );
    }
  }





}