<?php

class DirectoriosControlador extends Controladores {

    function mostrarDatosContactoColaboradorEnModal() {

        global $Api;
        $Colaborador = $Api->ejecutar(
          'directorios', 'colaboradores', 'datosCompletos'
          , ['colaboradorID' => $this->colaboradorID]
          // , false
        );
        // print_r($Directorio);
        Vistas::mostrar('directorios', 'colaboradores/datos-basicos', ['Colaborador' => $Colaborador]);
    }

    function colaboradores() {

        global $Api;
        $Directorio = $Api->ejecutar(
          'directorios', 'colaboradores', 'datosParaNavegador'
          // ,null
          // , false
        );
        // print_r($Directorio);
        Vistas::mostrar('directorios', 'colaboradores', ['Directorio' => $Directorio]);
    }
    
    function buscarColaboradores() {

        global $Api;
        $Directorio = $Api->ejecutar(
          'directorios', 'colaboradores', 'buscar'
           , ['palabras_buscar' => $this->palabras_buscar]
//           , false
        );
//         print_r($Directorio);
        Vistas::mostrar('directorios', 'colaboradores/lista-horizontal', ['Directorio' => $Directorio]);
    }

    function cambiarPaginaColaboradores() {

        global $Api;
        $Directorio = $Api->ejecutar(
          'directorios', 'colaboradores', 'datosParaNavegador'
          , ['pagina' => intval($this->pagina)]
          // , false
        );
        // print_r($Directorio);
        Vistas::mostrar('directorios', 'colaboradores', ['Directorio' => $Directorio]);
    }

}
