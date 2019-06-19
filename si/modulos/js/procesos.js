/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function abrirGestorProcesosAP( functionEXITO = function(){} ){
  cargarVista(
    'ProcesosAP', 'mostrarTodos', null,
    function(respuesta){ functionEXITO(respuesta); }
  );
}
function agregarNuevoProcesoSoloTitulo( procesoTITULO, functionEXITO = function(){} ){
  ejecutarOperacion(
    'ProcesosAP', 'guardarSoloTitulo', 'procesoTITULO='+procesoTITULO,
    function(respuesta){ functionEXITO(respuesta); }
  );
}

function mostrarModalDetallesProcesoAP( procesoID ){
cargarModal( 'Publicación Intitucional',
    'ProcesosAP', 'mostrarDetallesEnModal', 'procesoID='+procesoID,
    function(respuesta){  }
  );
}

function mostrarFormularioNuevoProcesoAP(  ){
cargarVista(
    'ProcesosAP', 'mostrarFormularioNuevo'
  );
}
function mostrarFormularioEditarProcesoAP( procesoID ){
cargarVista(
    'ProcesosAP', 'mostrarFormularioEditar', 'procesoID='+procesoID,
    function(respuesta){  }
  );
}
function mostrarConfirmacionEliminarProcesoAP( procesoID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a ENVIAR A LA PAPELERA el proceso. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
        ejecutarOperacion(
        'ProcesosAP', 'enviarPapelera', 'procesoID='+procesoID,
        function(respuesta){ funcionDespues();  }
        );

    });

}
function mostrarConfirmacionCambiarSeguridadProcesoAP( procesoID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a cambiar el NIVEL DE SEGURIDAD de la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
    function(){
        ejecutarOperacion(
            'ProcesosAP', 'cambiarSeguridad', 'procesoID='+procesoID,
            function(respuesta){ funcionDespues();  }
          );
    });
}
function mostrarConfirmacionCambiarVisibilidadProcesoAP( procesoID, funcionDespues = function(){}){
    abrirCuadroConfirmacion('Vamos a cambiar la VISIBILIDAD de la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
        ejecutarOperacion(
    'ProcesosAP', 'cambiarVisibilidad', 'procesoID='+procesoID,
    function(respuesta){ funcionDespues();  }
  );
    });
}
function mostrarConfirmacionCambiarEstadoProcesoAP( procesoID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a cambiar el estado del Proceso. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
            ejecutarOperacion(
                'ProcesosAP', 'cambiarEstado', 'procesoID='+procesoID,
                function(respuesta){ funcionDespues(); }
            );
        }
    );


}
function mostrarConfirmacionRecuperarProcesoAP( procesoID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a RECUPERAR la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
    ejecutarOperacion(
    'ProcesosAP', 'cambiarEstado', 'procesoID='+procesoID,
    function(respuesta){ funcionDespues();  }
  );
});
}