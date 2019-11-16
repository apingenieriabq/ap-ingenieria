<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cargos
 *
 * @author Juan Pablo Llinás Ramírez <www.ccsm.org.co>
 */
class UnidadesControlador extends Controladores {
    //put your code here
    function mostrarListado() {
        
    global $Api;
    $Unidades = $Api->ejecutar(
      'listados', 'unidades', 'todosCompletos'
      // ,null, false
    );
     //print_r($Unidades);
    Vistas::mostrar('listados', 'unidades/panel' ,
      [ 'Unidades' => $Unidades ]
    );
        
        
        
    }
    
    
    function mostrarFormularioNuevo() {
        $this->mostrarFormulario();
    }

    function mostrarFormularioEditar() {
        global $Api;
        if (isset($this->unidadID)) {
            $Unidad = $Api->ejecutar(
              'listados', 'Unidades', 'datosCompletos'
              , ['unidadID' => $this->unidadID]
              // , false
            );
        }
        //print_r($Unidad);
        $this->mostrarFormulario($Unidad);
    }

    function mostrarFormulario($Unidad = null) {
        global $Api;
        $Listados = $Api->ejecutar(
          'listados', 'Unidades', 'listadosFormulario'//,
          // , null, false
        );
        Vistas::mostrar('listados/unidades', 'formulario', [
            'Cargos' => $Listados->Cargos,
            'Unidades' => $Listados->Unidades,
            'Unidad' => $Unidad
        ]);
    }

    function guardarDatos() {
        if (!isset($this->unidadRESPONSABLE) or empty($this->unidadRESPONSABLE)) {
            if (isset($this->unidadRESPONSABLE_ACTUAL) and ! empty($this->unidadRESPONSABLE_ACTUAL)) {
                $this->unidadRESPONSABLE = $this->unidadRESPONSABLE_ACTUAL;
            } else {
                $this->unidadRESPONSABLE = Cliente::colaboradorID();
            }
        }
        if (isset($this->unidadID)) {
            $this->guardarCambios();
        } else {
            $this->guardarNuevo();
        }
    }

    function guardarCambios() {
        global $Api;
        $Unidad = $Api->ejecutar(
          'listados', 'Unidades', 'actualizar'
          ,
          [
            'unidadID' => $this->unidadID,
            'unidadCODIGO' => $this->unidadCODIGO,
            'unidadTITULO' => $this->unidadTITULO,
            'unidadDESCRIPCION' => $this->unidadDESCRIPCION,
            'unidadRESPONSABLE' => $this->unidadRESPONSABLE
          ]
          // , null
          // , false
        );
        // print_r($Unidad);
        if (is_object($Unidad) and ! empty($Unidad->unidadID)) {
            echo RespuestasSistema::exito('Actualizado correctamente el unidad de código [' . $Unidad->unidadCODIGO . '].', $Unidad);
        } else {
            echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>" . $Unidad . "</h3>", $Unidad);
        }
    }

    function guardarNuevo() {
        global $Api;
        $Unidad = $Api->ejecutar(
          'listados', 'Unidades', 'nuevo',
          [
            'unidadCODIGO' => $this->unidadCODIGO,
            'unidadTITULO' => $this->unidadTITULO,
            'unidadDESCRIPCION' => $this->unidadDESCRIPCION,
            'unidadRESPONSABLE' => $this->unidadRESPONSABLE
          ]
          //, null           , false
        );
        //print_r($Unidad);
        if (is_object($Unidad) and ! empty($Unidad->unidadID)) {
            echo RespuestasSistema::exito('Guardado correctamente el nuevo unidad de código [' . $Unidad->unidadCODIGO . '].', $Unidad);
        } else {
            echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>" . $Unidad . "</h3>", $Unidad);
        }
    }

    function enviarPapelera() {
        global $Api;
        $Unidad = $Api->ejecutar(
          'listados', 'Unidades', 'enviarPapelera'
          , ['unidadID' => $this->unidadID]
          , false
        );
        // var_dump($Unidad);
        if ($Unidad->RESPUESTA == 'EXITO') {
            echo RespuestasSistema::exito($Unidad->MENSAJE, $Unidad);
        } else {
            echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>" . $Unidad->MENSAJE . "</h3>", $Unidad);
        }
    }

    function cambiarEstado() {
        global $Api;
        $Unidad = $Api->ejecutar(
          'listados', 'Unidades', 'cambiarEstado'
          , ['unidadID' => $this->unidadID]
          , false
        );
        //print_r($Unidad);
        if ($Unidad->RESPUESTA == 'EXITO') {
            echo RespuestasSistema::exito($Unidad->MENSAJE, $Unidad);
        } else {
            echo RespuestasSistema::fallo("No se guardaron los datos.<br /><h3>" . $Unidad->MENSAJE . "</h3>", $Unidad);
        }
    }
    
}
