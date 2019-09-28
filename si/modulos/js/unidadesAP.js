/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function abrirGestorUnidades( functionEXITO = function(){} ){
  cargarVista(
    'Unidades', 'mostrarListado', null,
    function(respuesta){ functionEXITO(respuesta); }
  );
}
function agregarNuevoUnidadSoloTitulo( unidadTITULO, functionEXITO = function(){} ){
  ejecutarOperacion(
    'Unidades', 'guardarSoloTitulo', 'unidadTITULO='+unidadTITULO,
    function(respuesta){ functionEXITO(respuesta); }
  );
}

function mostrarModalDetallesUnidadAP( unidadID ){
cargarModal( 'Publicación Intitucional',
    'Unidades', 'mostrarDetallesEnModal', 'unidadID='+unidadID,
    function(respuesta){  }
  );
}

function mostrarFormularioNuevoUnidadAP(  ){
cargarVista(
    'Unidades', 'mostrarFormularioNuevo'
  );
}
function mostrarFormularioEditarUnidadAP( unidadID ){
cargarVista(
    'Unidades', 'mostrarFormularioEditar', 'unidadID='+unidadID,
    function(respuesta){  }
  );
}
function mostrarConfirmacionEliminarUnidadAP( unidadID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a ENVIAR A LA PAPELERA el unidad. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
        ejecutarOperacion(
        'Unidades', 'enviarPapelera', 'unidadID='+unidadID,
        function(respuesta){ funcionDespues();  }
        );

    });

}
function mostrarConfirmacionCambiarSeguridadUnidadAP( unidadID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a cambiar el NIVEL DE SEGURIDAD de la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
    function(){
        ejecutarOperacion(
            'Unidades', 'cambiarSeguridad', 'unidadID='+unidadID,
            function(respuesta){ funcionDespues();  }
          );
    });
}
function mostrarConfirmacionCambiarVisibilidadUnidadAP( unidadID, funcionDespues = function(){}){
    abrirCuadroConfirmacion('Vamos a cambiar la VISIBILIDAD de la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
        ejecutarOperacion(
    'Unidades', 'cambiarVisibilidad', 'unidadID='+unidadID,
    function(respuesta){ funcionDespues();  }
  );
    });
}
function mostrarConfirmacionCambiarEstadoUnidadAP( unidadID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a cambiar el estado del Unidad. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
            ejecutarOperacion(
                'Unidades', 'cambiarEstado', 'unidadID='+unidadID,
                function(respuesta){ funcionDespues(); }
            );
        }
    );


}
function mostrarConfirmacionRecuperarUnidadAP( unidadID, funcionDespues = function(){} ){
    abrirCuadroConfirmacion('Vamos a RECUPERAR la publicación. Para continuar de clic en <b>Estoy segur@</b>.',
        function(){
    ejecutarOperacion(
    'Unidades', 'cambiarEstado', 'unidadID='+unidadID,
    function(respuesta){ funcionDespues();  }
  );
});
}