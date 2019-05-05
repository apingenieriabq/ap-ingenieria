 function iniciarSesionColaborador(){
  borrarGalleta('UsuarioSIAPI');
  borrarGalleta('ClaveSIAPI');
  var datos = crearFormData('frm-login-siapi');
  var txtClave = btoa(document.getElementById("clave_usuario").value.trim());
  datos.append('claveDelColaborador', txtClave );
  enviarDatosinicioSesion(datos)
}

function iniciarSesionColaboradorDatosNavegador(){
  document.getElementById("nombre_usuario").value = comerGalleta('UsuarioSIAPI');
  var datos = crearFormData('frm-login-siapi');
  var txtClave = comerGalleta('ClaveSIAPI');
  datos.append('claveDelColaborador', txtClave );
  enviarDatosinicioSesion(datos)
}

function enviarDatosinicioSesion(datos){

  bloquearPantalla();
  ejecutarOperacionFormData(
    'seguridad', 'login', datos,
    function(){
      desbloquearPantalla();
      // var recordar = document.getElementById("chk_recordardatos_inicio").value;
      // if( recordar == 'SI' ){
      //   cocinarGalleta('RecordarDatosInicio', 'SI', 30);
      //   cocinarGalleta('UsuarioSIAPI', document.getElementById("nombre_usuario").value.trim(), 30);
      //   cocinarGalleta('ClaveSIAPI', btoa(document.getElementById("clave_usuario").value.trim()), 30);
      // }else{
      //   cocinarGalleta('RecordarDatosInicio', 'NO', 30);
      // }
      window.location.reload();
    }
  );
}

function cerrarSesionColaborador(){
  ejecutarOperacion( 'seguridad', 'logout', null,
    function(){
      cocinarGalleta('RecordarDatosInicio', 'NO', 30);
      alert('Se ha cerrado la sesión de trabajo correctamente.');
      window.location.reload();
    }
  );
}
