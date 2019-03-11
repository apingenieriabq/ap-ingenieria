<?php

class UsuariosControlador extends Controladores {


    /**
     * @api {post} seguridad/usuarios/perfil Solicitud de datos del perfil de usuario
     * @apiName perfilUsuario
     * @apiGroup Usuarios
     *
     * @apiParam {Number} usuarioID=NULL ID del Usuario dentro del sistema. Si el valor es NULL
     *  se responde con los datos del usuario logueado.
     *
     * @apiSuccess {Usuarios} DatosUsuario Datos del Usuario con el colaborador asociado.
     *
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "firstname": "John",
     *       "lastname": "Doe"
     *     }
     *
     * @apiError UserNotFound The id of the User was not found.
     *
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "error": "UserNotFound"
     *     }
     *
     *
     *
     */
    public function perfil(){
        // print_r($_SESSION);
        if(!isset($this->usuarioID)){
            $this->usuarioID = Usuario::usuarioID();
        }
        $Usuario = new Usuarios($this->usuarioID);
        echo RespuestasSistema::exito( 'Datos del Pefil del Usuario', $Usuario->datosCompletos() );
    }

    public function mostrarMenu() {
        if(Usuario::esAdministrador() == 'SI'):
            $menu = self::menuCompleto();
        else:
            $menu = self::menuDelUsuario( Usuario::usuarioID() );
        endif;
        echo RespuestasSistema::exito($menu);
    }

    public static function menuCompleto() {
        $menuComponente = Componentes::todosdelMenu();
        foreach ($menuComponente as $componentes):
            $componentes->operaciones = MenuOperaciones::delMenuComponente($componentes->componenteID);
        endforeach;
        return $menuComponente;
    }

    public static function menuDelUsuario($idUsuario) {
        $menuComponente = Componentes::delMenuPorUsuario($idUsuario);
        if($menuComponente):
            foreach ($menuComponente as $componentes):
                $componentes->controladores = ControladoresBD::delMenuPorUsuario($idUsuario,$componentes->componenteID);
                if($componentes->controladores):
                    foreach ($componentes->controladores as $controladores):
                        $controladores->operaciones = Operaciones::delMenuPorUsuario($idUsuario, $controladores->controladorID);
                    endforeach;
                endif;
            endforeach;
        endif;
        return $menuComponente;
    }

}