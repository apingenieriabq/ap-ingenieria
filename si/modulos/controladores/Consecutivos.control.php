<?php

class ConsecutivosControlador extends Controladores {
        //put your code here
    function mostrarTablaModificable() {
        global $Api;
        $Consecutivos = $Api->ejecutar(
          'sistema', 'consecutivos', 'todosBasicos'
        //   ,null, false
        );
        
        Vistas::mostrar('consecutivos' , 'formulario',
          [ 'Consecutivos' => $Consecutivos ]
        );
        
    }
    
    function actualizarActualConsecutivo(){
        global $Api;
        $Consecutivos = $Api->ejecutar(
          'sistema', 'consecutivos', 'actualizarActualConsecutivo'
          , array( 'consecutivoID' => $this->consecutivoID, 'consecutivoACTUAL' => $this->consecutivoACTUAL )
        //   , false
        );
        // print_r($Consecutivos);
        if($Consecutivos){
        echo RespuestasSistema::exito( null ,$Consecutivos);
      }else{
        echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>".$Consecutivos->MENSAJE."</h3>", $Consecutivos);
      }
    }
} 