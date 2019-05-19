function agregarNuevoProcesoSoloTitulo( procesoTITULO, functionEXITO = function(){} ){
  ejecutarOperacion(
    'ProcesosAP', 'guardarSoloTitulo', 'procesoTITULO='+procesoTITULO,
    function(respuesta){ functionEXITO(respuesta); }
  );
}

function mostrarFormularioNuevoDocumentoAP(  ){
cargarVista(
    'DocumentosAP', 'mostrarFormularioNuevo'
  );
}
function mostrarModalDetallesDocumentoAP( documentoID ){
cargarModal(
    'DocumentosAP', 'mostrarDocumentoEnModal', 'documentoID='+documentoID,
    function(respuesta){  }
  );
}
function mostrarFormularioEditarDocumentoAP( documentoID ){
cargarVista(
    'DocumentosAP', 'mostrarFormularioEditar', 'documentoID='+documentoID,
    function(respuesta){  }
  );
}
function mostrarConfirmacionEliminarDocumentoAP( documentoID ){
cargarVista(
    'DocumentosAP', 'enviarPapelera', 'documentoID='+documentoID,
    function(respuesta){  }
  );
}
function mostrarConfirmacionCambiarSeguridadDocumentoAP( documentoID ){
cargarVista(
    'DocumentosAP', 'cambiarSeguridad', 'documentoID='+documentoID,
    function(respuesta){ functionEXITO(respuesta); }
  );
}
function mostrarConfirmacionCambiarVisibilidadDocumentoAP( documentoID ){
cargarVista(
    'DocumentosAP', 'cambiarVisibilidad', 'documentoID='+documentoID,
    function(respuesta){ functionEXITO(respuesta); }
  );
}
function mostrarConfirmacionCambiarEstadoDocumentoAP( documentoID ){
cargarVista(
    'DocumentosAP', 'cambiarEstado', 'documentoID='+documentoID,
    function(respuesta){ functionEXITO(respuesta); }
  );
}
function mostrarConfirmacionRecuperarDocumentoAP( documentoID ){
cargarVista(
    'DocumentosAP', 'sacarDePapelera', 'documentoID='+documentoID,
    function(respuesta){ functionEXITO(respuesta); }
  );
}