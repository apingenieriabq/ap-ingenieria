<?php

class UsuariosControlador extends Controladores {

public function perfil(){
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
    foreach ($menuComponente as $componentes):
        $componentes->controladores = ControladoresBD::delMenuPorUsuario($idUsuario,$componentes->componenteID);
        foreach ($componentes->controladores as $controladores):
            $controladores->operaciones = Operaciones::delMenuPorUsuario($idUsuario, $controladores->controladorID);
        endforeach;
    endforeach;
    return $menuComponente;
}



}