<?php

class DirectoriosControlador extends Controladores {

  function mostrarDatosContactoColaboradorEnModal(){

    global $Api;
    $Colaborador = $Api->ejecutar(
      'directorios', 'colaboradores', 'datosCompletos'
      ,['colaboradorID' => $this->colaboradorID]
      // , false
    );
    // print_r($Directorio);
    Vistas::mostrar('directorios','datos-colaborador', ['Colaborador' => $Colaborador]);
  }

  function colaboradores(){

    global $Api;
    $Directorio = $Api->ejecutar(
      'directorios', 'colaboradores', 'datosParaNavegador'
      // ,null
      // , false
    );
    // print_r($Directorio);
    Vistas::mostrar('directorios','colaboradores', ['Directorio' => $Directorio]);
  }
  function cambiarPaginaColaboradores(){

    global $Api;
    $Directorio = $Api->ejecutar(
      'directorios', 'colaboradores', 'datosParaNavegador'
      ,['pagina' => intval($this->pagina) ]
      // , false
    );
    // print_r($Directorio);
    Vistas::mostrar('directorios','colaboradores', ['Directorio' => $Directorio]);
  }
}
