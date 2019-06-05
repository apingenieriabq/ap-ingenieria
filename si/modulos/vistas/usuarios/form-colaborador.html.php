<form id="form-usuarioColaborador" class="add-new-post" onsubmit="return false;" >
  {{ encabezadosVistas('Usuarios [Colaboradores]', 'Seguridad', UsuarioColaborador, 'confirmarBorrarUsuarioColaborador();' ) }}
  <div class="row">
    <div class="col-lg-8 col-md-12">

      <div class="card card-small mb-4 p-3">
        <div class="card-header p-0">
        </div>
        <div class="card-body p-0">

          <ul class="nav nav-tabs" id="tab-datoscolaborador" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="personales-tab" data-toggle="tab" href="#personales" role="tab" aria-controls="personales" aria-selected="true">Datos Personales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="laborales-tab" data-toggle="tab" href="#laborales" role="tab" aria-controls="laborales" aria-selected="true">Laborales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Confidencialidad</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Operaciones</a>
            </li>
          </ul>
          <div class="tab-content" id="tab-datoscolaborador-contenido">
            <div class="tab-pane fade show active" id="personales" role="tabpanel" aria-labelledby="personales-tab">

              {% include 'usuarios/colaboradores/datos/personales.html.php' %}

            </div>
            <div class="tab-pane fade" id="laborales" role="tabpanel" aria-labelledby="laborales-tab">

              {% include 'usuarios/colaboradores/datos/laborales.html.php' %}

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

              {% include 'usuarios/colaboradores/datos/institucional.html.php' %}

            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

              {% include 'usuarios/colaboradores/datos/operaciones.html.php' %}

            </div>
          </div>

        </div>
      </div>

    </div>
    <div class="col-lg-4 col-md-12">
      {% include 'usuarios/colaboradores/datos/propiedades.html.php' %}
      {% include 'usuarios/frm-datos-inicio.html.php' %}
    </div>
  </div>
  <input type="hidden" name="colaboradorID" value="{{UsuarioColaborador.colaboradorID}}"/>
  <input type="hidden" name="usuarioID" value="{{UsuarioColaborador.Usuario.usuarioID}}"/>
</form>
<script type="text/javascript" >
  $(document).ready(function(){
    $("#form-usuarioColaborador").submit(function(){

      if(usuarioCLAVE.value != "" ){
        if(usuarioCLAVE.value != usuarioCLAVE_REPETIR.value ){
          alerta("Las claves no coinciden.");
          return false;
        }
      }

      var Confidencial = arbol_confidencialidad.getCheckedNodes();
      console.log(Confidencial);
      var Permisos = arbol_permisos.getCheckedNodes();
      console.log(Confidencial);

      var Formulario = crearFormData("form-usuarioColaborador");
      Formulario.append('listadoCONFIDENCIALIDAD', Confidencial);
      Formulario.append('listadoPERMISOS', Permisos);
      ejecutarOperacionFormData(
        'Colaboradores', 'guardarDatos', Formulario ,
        function(Colaborador){
          bloquearPantalla();
          console.log(Colaborador);
          // mostrarFormularioEditarUsuarioColaborador(Colaborador.colaboradorID);
          bloquearPantalla();
        }
      );

    });
  });
</script>
