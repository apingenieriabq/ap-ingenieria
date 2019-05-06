<?php

class PaisesControlador extends Controladores {

  function todos(){
    $P = new Paises();
    return Respuestassistema::exito("Todos los parametros del sistema",$P->todos());
  }

}