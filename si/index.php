<?php

include './config.php';
// // SesionCliente::destruir();
echo $twig->render('login.html.php', Main::getGlobals());
// // print_r($_SESSION);
// SesionCliente::cerrar();
