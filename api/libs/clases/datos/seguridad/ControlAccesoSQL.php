<?php
class ControlAccesoSQL {

    const OPERACIONES_POR_COMPONENTES = <<<sql
  SELECT
  	MenuComponentes.*,
  	MenuOperaciones.*
  FROM
  	MenuOperaciones
  INNER JOIN MenuComponentes ON
  	MenuComponentes.componenteID = MenuOperaciones.componenteID

sql;

const DATOS_COMPLETOS = <<<sql
    SELECT
    	MenuComponentes.*,
    	MenuOperaciones.*
    FROM
    	MenuOperaciones
    INNER JOIN MenuComponentes ON
    	MenuComponentes.componenteID = MenuOperaciones.componenteID

sql;

    const COMPONENTES_POR_USUARIO_Y_COMPONENTES = <<<sql
    SELECT
    	MenuComponentes.*
    FROM
    	MenuOperaciones
    INNER JOIN MenuComponentes ON MenuOperaciones.componenteID = MenuComponentes.componenteID
    LEFT JOIN MenuOperacionesUsuarios ON MenuOperaciones.operacionID = MenuOperacionesUsuarios.operacionID
    LEFT JOIN Usuarios ON MenuOperacionesUsuarios.usuarioID = Usuarios.usuarioID

    LEFT JOIN MenuOperacionesRoles ON MenuOperaciones.operacionID = MenuOperacionesRoles.operacionID

    LEFT JOIN UsuariosRoles ON MenuOperacionesRoles.rolID = UsuariosRoles.rolID
    LEFT JOIN Usuarios AS UsuariosRol ON UsuariosRoles.usuarioID = UsuariosRol.usuarioID
sql;


    const OPERACIONES_POR_USUARIO_Y_COMPONENTES = <<<sql
    SELECT
    	MenuOperaciones.*,  MenuComponentes.*
    FROM
    	MenuOperaciones
    INNER JOIN MenuComponentes ON MenuOperaciones.componenteID = MenuComponentes.componenteID
    LEFT JOIN ControlOperacionesUsuarios ON MenuOperaciones.menuID = ControlOperacionesUsuarios.menuID
    LEFT JOIN Usuarios ON ControlOperacionesUsuarios.usuarioID = Usuarios.usuarioID

    LEFT JOIN ControlOperacionesRoles ON MenuOperaciones.menuID = ControlOperacionesRoles.menuID

    LEFT JOIN UsuariosRoles ON ControlOperacionesRoles.rolID = UsuariosRoles.rolID
    LEFT JOIN Usuarios AS UsuariosRol ON UsuariosRoles.usuarioID = UsuariosRol.usuarioID
sql;

}
