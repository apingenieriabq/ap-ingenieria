<?php

class ProcesosAPControlador extends Controladores {
    
    function probarAPI() {
         global $Api;
         
        echo "******************MOSTRAR TODOS***********************<br />";
        $ProcesosAP1 = $Api->ejecutar(
          'institucional', 'Procesos', 'mostrarTodos'
          // ,null, false
        );
        print_r($ProcesosAP1);
        
        echo "*******************DATOS COMPLETOS**********************<br />";        
        $ProcesosAP2 = $Api->ejecutar(
              'institucional', 'procesos', 'datosCompletos'
              , ['procesoID' => 1 ]
        );
        print_r($ProcesosAP2);
        
        echo "*******************CARGOS **********************<br />";        
        $ProcesosAP3 = $Api->ejecutar(
          'listados', 'cargos', 'todosCompletos'
          // ,null, false
        );
        print_r($ProcesosAP3);
    
        
    }

    function listadoColaboradoresPorCargo() {

        global $Api;
        $Colaboradores = $Api->ejecutar(
          'directorios', 'colaboradores', 'porCargo'
          , array('cargoID' => $this->cargoID)
          // , false
        );
        // print_r($Colaboradores);
        if (count($Colaboradores)) {
            foreach ($Colaboradores as $Colaborador) {
                echo '<option value="' . $Colaborador->colaboradorID . '" >' . $Colaborador->Persona->personaIDENTIFICACION . ' - ' . $Colaborador->Persona->personaNOMBRES . ' ' . $Colaborador->Persona->personaAPELLIDOS . '</option>';
            }
        } else {
            echo '<option value="">No hay colaboradores en ese cargo</option>';
        }
    }

    function guardarSoloTitulo() {
        global $Api;
        $NuevoProceso = $Api->ejecutar(
          'institucional', 'procesos', 'guardarSoloNombre'
          , array('procesoTITULO' => $this->procesoTITULO)
        );
        if (is_object($NuevoProceso)) {
            echo RespuestasSistema::exito('Guardar Proceso - Solo Titulo ', $NuevoProceso);
        } else {
            echo RespuestasSistema::alerta($NuevoProceso);
        }
    }

    function mostrarDetallesEnModal() {
        // print_r($this);
        global $Api;
        $ProcesoAP = $Api->ejecutar(
          'institucional', 'procesos', 'datosCompletos'
          , ['procesoID' => $this->procesoID]
          // , false
        );
        // print_r($ProcesoAP);
        Vistas::mostrar('institucional/procesos', 'modal-detalles', ['ProcesoAP' => $ProcesoAP]
        );
    }

    function mostrarTodos() {
        global $Api;
        $ProcesosAP = $Api->ejecutar(
          'institucional', 'Procesos', 'mostrarTodos'
          // ,null, false
        );
        // print_r($ProcesosAP);
        Vistas::mostrar('institucional/procesos', 'todos', ['ProcesosAP' => $ProcesosAP]
        );
    }

    function mostrarFormularioNuevo() {
        $this->mostrarFormulario();
    }

    function mostrarFormularioEditar() {
        global $Api;
        if (isset($this->procesoID)) {
            $ProcesoAP = $Api->ejecutar(
              'institucional', 'procesos', 'datosCompletos'
              , ['procesoID' => $this->procesoID]
              // , false
            );
        }
        //print_r($ProcesoAP);
        $this->mostrarFormulario($ProcesoAP);
    }

    function mostrarFormulario($ProcesoAP = null) {
        global $Api;
        $Listados = $Api->ejecutar(
          'institucional', 'procesos', 'listadosFormulario'//,
          // , null, false
        );
        Vistas::mostrar('institucional/procesos', 'formulario', [
            'Cargos' => $Listados->Cargos,
            'ProcesoAP' => $ProcesoAP
        ]);
    }

    function guardarDatos() {
        if (!isset($this->procesoRESPONSABLE) or empty($this->procesoRESPONSABLE)) {
            if (isset($this->procesoRESPONSABLE_ACTUAL) and ! empty($this->procesoRESPONSABLE_ACTUAL)) {
                $this->procesoRESPONSABLE = $this->procesoRESPONSABLE_ACTUAL;
            } else {
                $this->procesoRESPONSABLE = Cliente::colaboradorID();
            }
        }
        if (isset($this->procesoID)) {
            $this->guardarCambios();
        } else {
            $this->guardarNuevo();
        }
    }

    function guardarCambios() {
        global $Api;
        $ProcesoAP = $Api->ejecutar(
          'institucional', 'Procesos', 'actualizar'
          ,
          [
            'procesoID' => $this->procesoID,
            'procesoCODIGO' => $this->procesoCODIGO,
            'procesoTITULO' => $this->procesoTITULO,
            'procesoDESCRIPCION' => $this->procesoDESCRIPCION,
            'procesoRESPONSABLE' => $this->procesoRESPONSABLE
          ]
          // , null
          // , false
        );
        // print_r($ProcesoAP);
        if (is_object($ProcesoAP) and ! empty($ProcesoAP->procesoID)) {
            echo RespuestasSistema::exito('Actualizado correctamente el proceso de código [' . $ProcesoAP->procesoCODIGO . '].', $ProcesoAP);
        } else {
            echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>" . $ProcesoAP . "</h3>", $ProcesoAP);
        }
    }

    function guardarNuevo() {
        global $Api;
        $ProcesoAP = $Api->ejecutar(
          'institucional', 'Procesos', 'nuevo',
          [
            'procesoCODIGO' => $this->procesoCODIGO,
            'procesoTITULO' => $this->procesoTITULO,
            'procesoDESCRIPCION' => $this->procesoDESCRIPCION,
            'procesoRESPONSABLE' => $this->procesoRESPONSABLE
          ]
          //, null           , false
        );
        //print_r($ProcesoAP);
        if (is_object($ProcesoAP) and ! empty($ProcesoAP->procesoID)) {
            echo RespuestasSistema::exito('Guardado correctamente el nuevo proceso de código [' . $ProcesoAP->procesoCODIGO . '].', $ProcesoAP);
        } else {
            echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>" . $ProcesoAP . "</h3>", $ProcesoAP);
        }
    }

    function enviarPapelera() {
        global $Api;
        $ProcesoAP = $Api->ejecutar(
          'institucional', 'Procesos', 'enviarPapelera'
          , ['procesoID' => $this->procesoID]
          , false
        );
        // var_dump($ProcesoAP);
        if ($ProcesoAP->RESPUESTA == 'EXITO') {
            echo RespuestasSistema::exito($ProcesoAP->MENSAJE, $ProcesoAP);
        } else {
            echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>" . $ProcesoAP->MENSAJE . "</h3>", $ProcesoAP);
        }
    }

    function cambiarEstado() {
        global $Api;
        $ProcesoAP = $Api->ejecutar(
          'institucional', 'Procesos', 'cambiarEstado'
          , ['procesoID' => $this->procesoID]
          , false
        );
        //print_r($ProcesoAP);
        if ($ProcesoAP->RESPUESTA == 'EXITO') {
            echo RespuestasSistema::exito($ProcesoAP->MENSAJE, $ProcesoAP);
        } else {
            echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>" . $ProcesoAP->MENSAJE . "</h3>", $ProcesoAP);
        }
    }

}
