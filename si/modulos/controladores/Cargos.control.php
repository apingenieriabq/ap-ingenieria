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
class CargosControlador extends Controladores {
    //put your code here
    function mostrarListado() {
        
    global $Api;
    $Cargos = $Api->ejecutar(
      'listados', 'cargos', 'todosCompletos'
      // ,null, false
    );
    // print_r($DocumentosAP);
    Vistas::mostrar('listados', 'cargos/panel' ,
      [ 'Cargos' => $Cargos ]
    );
        
        
        
    }
}
