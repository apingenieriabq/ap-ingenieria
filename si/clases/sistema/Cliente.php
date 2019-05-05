<?php
class Cliente {

    static function esAdministrador(){
         if (self::estaLogueado()):
            $dato = SesionCliente::activa()->usuarioADMINISTRADOR;
            if($dato == 'SI'):
                return true;
            endif;
        endif;
        return false;
    }
    static function estaLogueado(){
        if(is_null(Cliente::datos()))
            return false;
        return true;
    }
    static function abrirSesion($usuario) {
        SesionCliente::valor('Usuario', $usuario);
        return SesionCliente::valor('Usuario');
    }
    static function cerrarSesion() {
        SesionCliente::destruir();
    }
    static function datos($Usuario = null){
        if(is_null($Usuario)){
            if(isset($_SESSION['Usuario'])){
                return $_SESSION['Usuario'];
            }
            return null;
        }else{
            return $_SESSION['Usuario'] = $Usuario;
        }
    }

    static function nombreUsuario($Usuario = null){
        if(is_null($Usuario)){
            if(isset($_SESSION['UsuarioNombre'])){
                return $_SESSION['UsuarioNombre'];
            }
            return null;
        }else{
            return $_SESSION['UsuarioNombre'] = $Usuario;
        }
    }

    static function claveUsuario($Usuario = null){
        if(is_null($Usuario)){
            if(isset($_SESSION['UsuarioClave'])){
                return $_SESSION['UsuarioClave'];
            }
            return null;
        }else{
            return $_SESSION['UsuarioClave'] = $Usuario;
        }
    }

}