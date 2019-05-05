<?php
session_start();
// print_r($_SESSION);
include './config.php';
// SesionCliente::destruir();
if(isset($_POST) and count($_POST)){

  Main::procesarPeticion($_POST['modulo'], $_POST['operacion']);

}else{
  echo $twig->render('index.tmpl', Main::getGlobals());
}
// session_write_close();
