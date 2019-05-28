function verListadoMaestroDocumento( functionEXITO = function(){} ){
  cargarVista(
    'ListadoMaestroDocumento', 'mostrarNavegador', null,
    function(respuesta){ functionEXITO(respuesta); }
  );
}
function abrirGestorDocumentosAP( functionEXITO = function(){} ){
  cargarVista(
    'DocumentosAP', 'mostrarTodos', null,
    function(respuesta){ functionEXITO(respuesta); }
  );
}
function agregarNuevoProcesoSoloTitulo( procesoTITULO, functionEXITO = function(){} ){
  ejecutarOperacion(
    'ProcesosAP', 'guardarSoloTitulo', 'procesoTITULO='+procesoTITULO,
    function(respuesta){ functionEXITO(respuesta); }
  );
}

function mostrarModalDetallesDocumentoAP( documentoID ){
cargarModal( 'Publicación Intitucional',
    'DocumentosAP', 'mostrarDocumentoEnModal', 'documentoID='+documentoID,
    function(respuesta){  }
  );
}

function mostrarFormularioNuevoDocumentoAP(  ){
cargarVista(
    'DocumentosAP', 'mostrarFormularioNuevo'
  );
}
function mostrarFormularioEditarDocumentoAP( documentoID ){
cargarVista(
    'DocumentosAP', 'mostrarFormularioEditar', 'documentoID='+documentoID,
    function(respuesta){  }
  );
}
function mostrarConfirmacionEliminarDocumentoAP( documentoID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a ENVIAR A LA PAPELERA la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
        ejecutarOperacion(
        'DocumentosAP', 'enviarPapelera', 'documentoID='+documentoID,
        function(respuesta){ funcionDespues();  }
        );

    });

}
function mostrarConfirmacionCambiarSeguridadDocumentoAP( documentoID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a cambiar el NIVEL DE SEGURIDAD de la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
    function(){
        ejecutarOperacion(
            'DocumentosAP', 'cambiarSeguridad', 'documentoID='+documentoID,
            function(respuesta){ funcionDespues();  }
          );
    });
}
function mostrarConfirmacionCambiarVisibilidadDocumentoAP( documentoID, funcionDespues = function(){}){
    abrirCuadroConfirmacion('Vamos a cambiar la VISIBILIDAD de la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
        ejecutarOperacion(
    'DocumentosAP', 'cambiarVisibilidad', 'documentoID='+documentoID,
    function(respuesta){ funcionDespues();  }
  );
    });
}
function mostrarConfirmacionCambiarEstadoDocumentoAP( documentoID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a cambiar el estado de la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
            ejecutarOperacion(
                'DocumentosAP', 'cambiarEstado', 'documentoID='+documentoID,
                function(respuesta){ funcionDespues(); }
            );
        }
    );


}
function mostrarConfirmacionRecuperarDocumentoAP( documentoID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a RECUPERAR la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
    ejecutarOperacion(
    'DocumentosAP', 'cambiarEstado', 'documentoID='+documentoID,
    function(respuesta){ funcionDespues();  }
  );
});
}