<?php
session_start();
// print_r($_SESSION);
include './config.php';
// SesionCliente::destruir();
if(isset($_POST) and count($_POST)){
  Main::procesarPeticion($_POST['modulo'], $_POST['operacion']);
}else{
  // print_r(Main::parametros());
  echo $twig->render('index.tmpl', Main::parametros());
}
// session_write_close();
//fasiufo aisodfihoas idf