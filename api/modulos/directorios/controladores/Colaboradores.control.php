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
  function todosCompletos(){
    $P = new Colaboradores();
    return Respuestassistema::exito("Todos los Colaboradoes de AP INGENENIERIA",$P->todosCompletos());
  }

  public function datos()
  {
      if (empty($this->colaboradorID)) {
          return Respuestassistema::error("No llego colaboradorID. Verifique los datos, o contacte al Centro TICS.");
      } else {
          return Respuestassistema::exito("Datos para el Colaborador ".$this->colaboradorID, new Colaboradores($this->colaboradorID) );
      }
  }

  public function guardarCambios(){
    // print_r($this);
    if(empty($this->usuarioID)){
      return $this->nuevo();
    }else{
      return $this->actualizar();
    }
  }

  private function nuevo()
  {
    $validacion = $this->validarDatosEnviados(
      ['tipoIdentificacionID','personaIDENTIFICACION', 'personaNOMBRES', 'personaAPELLIDOS', 'personaEMAIL', 'cargoID', 'tipoColaboradorID', 'usuarioNOMBRE']
    );
    if(empty($validacion)){

      $URL_FOTO = URL_API.'media/img/usuario-invitado.jpg';
      if(isset($this->colaboradorFOTO)){
        $DIR_FOTOS_COLABORADORES = 'colaboradores'.DS.$this->personaIDENTIFICACION.DS.'fotos'.DS;
        $NOMBRE_FOTO = "".uniqid().".".Archivos::extension($this->colaboradorFOTO);
        $movido = Archivos::moverArchivoRecibido(
          $this->colaboradorFOTO, DIR_ARCHIVOS.$DIR_FOTOS_COLABORADORES, $NOMBRE_FOTO
        );
        if($movido){
          $URL_FOTO = URL_ARCHIVOS.$DIR_MINATURAS.$NOMBRE_MINIATURA;
        }
      }

      $URL_FIRMA =  URL_API.'media/img/firma.png';
      if(isset($this->colaboradorFIRMA)){
        $DIR_FIRMAS_COLABORADORES = 'colaboradores'.DS.$this->personaIDENTIFICACION.DS.'fotos'.DS;
        $NOMBRE_FIRMA = "".uniqid().".".Archivos::extension($this->colaboradorFIRMA);
        $movido = Archivos::moverArchivoRecibido(
          $this->colaboradorFIRMA, DIR_ARCHIVOS.$DIR_FIRMAS_COLABORADORES, $NOMBRE_FIRMA
        );
        if($movido){
          $URL_FIRMA = URL_ARCHIVOS.$DIR_MINATURAS.$NOMBRE_MINIATURA;
        }
      }

      $Persona =  new Personas($this->tipoIdentificacionID, $this->personaIDENTIFICACION);
      if(empty($Persona->personaID)){
        $Persona->personaID = $Persona->crear(
          $this->tipoIdentificacionID,$this->personaIDENTIFICACION,
          $this->personaNOMBRES, $this->personaAPELLIDOS,
          $this->personaMUNICIPIO, $this->personaDIRECCION, $this->personaEMAIL,
          $this->personaNIT, $URL_FOTO,
          $this->verificar('personaSEXO'), $this->verificar('personaFCHNACIMIENTO'), $this->verificar('personaTIPOSANGRE')
          );
      }
      if(!empty($Persona->personaID)){
        $Colaborador = new Colaboradores($this->verificar('colaboradorEMAIL', $this->personaEMAIL));
        if(empty($Colaborador->colaboradorID)){
          $Colaborador->crear(
            $this->cargoID, $Persona->personaID, $this->tipoColaboradorID,
            $this->verificar('colaboradorEMAIL', $this->personaEMAIL),
            $this->verificar('colaboradorEXTENSION'),
            $this->verificar('colaboradorCELULAR'),
            $this->verificar('colaboradorFCHINGRESO', date('Y-m-d') ),
            $URL_FOTO,$URL_FIRMA,
            $this->verificar('colaboradorJEFEINMEDIATO'),
            $this->verificar('colaboradorAPROBADOR')
          );
        }else{
          $Colaborador->datosCompletos();
          // return Respuestassistema::fallo("El Colaborador ya está registrado en el sistema con el cargo <b>[".$Colaborador->Cargo->cargoTITULO."]</b>.");
        }

        if (!empty($Colaborador->colaboradorID)){
          $Usuario = new Usuarios();
          $Usuario->porNombre($this->usuarioNOMBRE);


          if( empty($Usuario->usuarioID) or $Usuario->usuarioID == 0 ){
            $usuarioHASH = empty($this->usuarioCLAVE) ? hash('crc32', $this->usuarioNOMBRE) : $this->usuarioCLAVE;
            $Usuario->nuevo( $this->usuarioNOMBRE, $usuarioHASH , $Colaborador->colaboradorID );
          }else{
            return Respuestassistema::fallo("El nombre de usuario <b>[".$this->usuarioNOMBRE."]</b> ya está registrado en el sistema.");
          }
          if (!empty($Usuario->usuarioID)) {
            $Usuario->datosCompletos();
              return Respuestassistema::exito('Nuevo Usuario/Colaborador creado Exitosamente. Los datos de inicio son: <br /> Usuario: <b>'.$Usuario->usuarioNOMBRE.'</b><br /> Clave: <b>'.$usuarioHASH.'</b>', $Usuario);
          } else {
              return Respuestassistema::error("No se pudo guardar el nuevo COLABORADOR");
          }

        } else {
            return Respuestassistema::error("No se pudo guardar el nuevo COLABORADOR");
        }

      } else {
          return Respuestassistema::error("No se pudo guardar los datos personales del nuevo COLABORADOR");
      }

    }else{
      return Respuestassistema::error("No llegarón los datos OBLIGATORIOS para la operación. <br />" . $validacion);
    }

  }

  private function actualizar()
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