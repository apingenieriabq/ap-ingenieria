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
            if((SesionCliente::valor('Usuario'))){
                return SesionCliente::valor('Usuario');
            }
            return null;
        }else{
            return SesionCliente::valor('Usuario', $Usuario);
        }
    }

    static function usuarioNOMBRE($usuarioNOMBRE = null){
        if(is_null($usuarioNOMBRE)){
            if((SesionCliente::valor('usuarioNOMBRE'))){
                return SesionCliente::valor('usuarioNOMBRE');
            }
            return null;
        }else{
            return SesionCliente::valor('usuarioNOMBRE', $usuarioNOMBRE);
        }
    }

    static function usuarioCLAVE($usuarioCLAVE = null){
        if(is_null($usuarioCLAVE)){
            if((SesionCliente::valor('usuarioCLAVE'))){
                return SesionCliente::valor('usuarioCLAVE');
            }
            return null;
        }else{
            return SesionCliente::valor('usuarioCLAVE', $usuarioCLAVE);
        }
    }
    static function colaboradorID(){
        if( SesionCliente::valor('Usuario') ){
            return SesionCliente::valor('Usuario')->colaboradorID;
        }
        return null;
    }

}