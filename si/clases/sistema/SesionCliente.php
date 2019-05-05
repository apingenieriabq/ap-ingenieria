<?php

class SesionCliente {

    static function abrir() {
        $status = session_status();
        switch ($status) {
            case PHP_SESSION_NONE:
error_reporting(0);
// ini_set('display_errors', TRUE);
// ini_set('display_startup_errors', TRUE);
                session_start();
 error_reporting(E_ALL);
// ini_set('display_errors', TRUE);
// ini_set('display_startup_errors', TRUE);
                break;
            case PHP_SESSION_ACTIVE:
                return true;
                break;
        }
    }

    static function cerrar() {
      $status = session_status();
      if($status == PHP_SESSION_ACTIVE){
        session_write_close();
      }
    }

    static function activa(){
        return self::valor(SESION);
    }

    static function dato($variable){
        $valor = false;
        $SesionActiva = self::valor(SESION);
        if (property_exists( $SesionActiva, $variable)) {
            $valor = $SesionActiva->$variable;
        }
        return $valor;
    }

    static public function valor($nombre, $valor = null) {
        if (!is_null($valor)) {
            self::abrir();
            $_SESSION [$nombre] = $valor;
            self::cerrar();
        } else {
                self::abrir();
            if (!empty($_SESSION [$nombre])) {
                try {
                try {
                    $valor = $_SESSION [$nombre];
                } catch (Exception $e) { $valor =  null; }
                } catch (Exception $e) { $valor =  null; }
                self::cerrar();
                return $valor;
            } else {
                self::cerrar();
                return false;
            }
        }

    }

    static public function eliminar($nombre) {
        self::abrir();
        unset($_SESSION [$nombre]);
        self::abrir();
    }

    static public function destruir() {
        self::abrir();
        $_SESSION = array();
        session_destroy();
        self::cerrar();
    }

}
