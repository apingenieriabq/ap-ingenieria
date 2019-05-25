

function verListadoUsuarioColaborador( functionEXITO = function(){} ){
  cargarVista(
    'ListadoMaestroDocumento', 'mostrarNavegador', null,
    function(respuesta){ functionEXITO(respuesta); }
  );
}

function mostrarModalDetallesUsuarioColaborador( usuarioID ){
cargarModal( 'Publicación Intitucional',
    'Usuarios', 'mostrarDocumentoEnModal', 'usuarioID='+usuarioID,
    function(respuesta){  }
  );
}

function mostrarFormularioNuevoUsuarioColaborador(  ){
cargarVista(
    'Usuarios', 'mostrarFormularioNuevo'
  );
}
function mostrarFormularioEditarUsuarioColaborador( usuarioID ){
cargarVista(
    'Usuarios', 'mostrarFormularioEditar', 'usuarioID='+usuarioID,
    function(respuesta){  }
  );
}
function mostrarConfirmacionEliminarUsuarioColaborador( usuarioID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a ENVIAR A LA PAPELERA la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
        ejecutarOperacion(
        'Usuarios', 'enviarPapelera', 'usuarioID='+usuarioID,
        function(respuesta){ funcionDespues();  }
        );

    });

}
function mostrarConfirmacionCambiarSeguridadUsuarioColaborador( usuarioID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a cambiar el NIVEL DE SEGURIDAD de la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
    function(){
        ejecutarOperacion(
            'Usuarios', 'cambiarSeguridad', 'usuarioID='+usuarioID,
            function(respuesta){ funcionDespues();  }
          );
    });
}
function mostrarConfirmacionCambiarVisibilidadUsuarioColaborador( usuarioID, funcionDespues = function(){}){
    abrirCuadroConfirmacion('Vamos a cambiar la VISIBILIDAD de la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
        ejecutarOperacion(
    'Usuarios', 'cambiarVisibilidad', 'usuarioID='+usuarioID,
    function(respuesta){ funcionDespues();  }
  );
    });
}
function mostrarConfirmacionCambiarEstadoUsuarioColaborador( usuarioID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a cambiar el estado de la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
            ejecutarOperacion(
                'Usuarios', 'cambiarEstado', 'usuarioID='+usuarioID,
                function(respuesta){ funcionDespues(); }
            );
        }
    );


}
function mostrarConfirmacionRecuperarUsuarioColaborador( usuarioID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a RECUPERAR la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
    ejecutarOperacion(
    'Usuarios', 'cambiarEstado', 'usuarioID='+usuarioID,
    function(respuesta){ funcionDespues();  }
  );
});
}