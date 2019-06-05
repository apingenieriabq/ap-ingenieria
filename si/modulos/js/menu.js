function cargarMenuDelSistema() {
  ejecutarOperacion('Seguridad', 'menu', null, function(datos) {
    console.log(datos);
  });
}

function abrirItemMenu(ObjMenu) {
  var modulo = $(ObjMenu).attr('data-modulo');
  var operacion = $(ObjMenu).attr('data-operacion');
  if (operacion) {
    cargarVista(modulo, operacion);
  }
}
