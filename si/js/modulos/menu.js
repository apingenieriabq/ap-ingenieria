function cargarMenuDelSistema(){

    ejecutarOperacion('Seguridad', 'menu', null, function(datos){
      console.log(datos);
    } );

}

function abrirItemMenu(ObjMenu){
  cargarVista(
    $(ObjMenu).attr('data-modulo'),
    $(ObjMenu).attr('data-operacion')
  );
}