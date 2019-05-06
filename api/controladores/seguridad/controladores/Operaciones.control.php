<?php

class OperacionesControlador extends Controladores {
  public function datosOperacion(){
        if (!empty($this->modulo) and !empty($this->operacion)){
          $Operacion = MenuOperaciones::porCombinacion($this->modulo, $this->operacion );
          if($Operacion){
                return Respuestassistema::exito("Datos de la Operacion.",$Operacion);
          }
        }
        return Respuestassistema::error("Los datos no son validos");;
  }
}