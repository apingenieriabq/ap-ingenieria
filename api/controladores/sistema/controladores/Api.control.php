<?php

class ApiControlador extends Controladores {

  function inicio(){
    Vistas::plantilla('basica');
  }

  function probandoRecepcionPOST(){
    echo RespuestasSistema::exito( "Recepción de datos: POST. ", $_POST);
  }

}