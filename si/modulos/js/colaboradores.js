function verListadoUsuarioColaborador(functionEXITO = function() {}) {
    cargarVista('Colaboradores', 'mostrarTodos', null, function(respuesta) { functionEXITO(respuesta); });
}

function mostrarModalDetallesUsuarioColaborador(colaboradorID) {
    cargarModal('Datos del Colaborador', 'Colaboradores', 'mostrarColaboradorEnModal', 'colaboradorID=' + colaboradorID, function(respuesta) {});
}

function mostrarFormularioNuevoUsuarioColaborador() {
    cargarVista('Colaboradores', 'mostrarFormularioNuevo');
}

function mostrarFormularioEditarUsuarioColaborador(colaboradorID) {
    bloquearPantalla();
    cargarVista('Colaboradores', 'mostrarFormularioEditar', 'colaboradorID=' + colaboradorID, function(respuesta) {});
    bloquearPantalla();
}

function mostrarConfirmacionEliminarUsuarioColaborador(colaboradorID, funcionDespues = function() {}) {
    abrirCuadroConfirmacion('Vamos a ENVIAR A LA PAPELERA al colaborador. Para continuar de clic en <b>Estoy segur@</b>.', function() {
        ejecutarOperacion('Colaboradores', 'enviarPapelera', 'colaboradorID=' + colaboradorID, function(respuesta) {
            alert('aja');
            funcionDespues();
        });
    });
}

function mostrarConfirmacionCambiarSeguridadUsuarioColaborador(colaboradorID, funcionDespues = function() {}) {
    abrirCuadroConfirmacion('Vamos a cambiar el NIVEL DE SEGURIDAD de la publicación. Para continuar de clic en <b>Estoy segur@</b>.', function() {
        ejecutarOperacion('Colaboradores', 'cambiarSeguridad', 'colaboradorID=' + colaboradorID, function(respuesta) { funcionDespues(); });
    });
}

function mostrarConfirmacionCambiarVisibilidadUsuarioColaborador(colaboradorID, funcionDespues = function() {}) {
    abrirCuadroConfirmacion('Vamos a cambiar la VISIBILIDAD de la publicación. Para continuar de clic en <b>Estoy segur@</b>.', function() {
        ejecutarOperacion('Colaboradores', 'cambiarVisibilidad', 'colaboradorID=' + colaboradorID, function(respuesta) { funcionDespues(); });
    });
}

function mostrarConfirmacionCambiarEstadoUsuarioColaborador(colaboradorID, funcionDespues = function() {}) {
    abrirCuadroConfirmacion('Vamos a cambiar el estado de la publicación. Para continuar de clic en <b>Estoy segur@</b>.', function() {
        ejecutarOperacion('Colaboradores', 'cambiarEstado', 'colaboradorID=' + colaboradorID, function(respuesta) { funcionDespues(); });
    });
}

function mostrarConfirmacionRecuperarUsuarioColaborador(colaboradorID, usuarioID, funcionDespues = function() {}) {
    abrirCuadroConfirmacion('Vamos a RECUPERAR la publicación. Para continuar de clic en <b>Estoy segur@</b>.', function() {
        ejecutarOperacion('Colaboradores', 'cambiarEstado', 'colaboradorID=' + colaboradorID, function(respuesta) { funcionDespues(); });
    });
}
