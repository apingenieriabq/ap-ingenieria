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
          .'<input type="radio" id="proceso'.$Proceso->procesoID.'" name="procesoID" class="custom-control-input"> '
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
        echo '<option value="'.$Colaborador->colaboradorID.'">'.$Colaborador->Persona->personaIDENTIFICACION.' - '.$Colaborador->Persona->personaNOMBRES.' '.$Colaborador->Persona->personaAPELLIDOS.'</option>';
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


}