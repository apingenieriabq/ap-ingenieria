{{dump(UsuarioColaborador)}}
<form id="form-usuarioColaborador" class="add-new-post" onsubmit="return false;" >
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-8 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Seguridad</span>
      <h3 class="page-title">Usuario <strong>[Colaborador]</strong></h3>
    </div>
    <div class="col-12 col-sm-4 align-items-right">
      <button type="submit" class="btn btn-sm btn-accent"><i class="material-icons">save</i> Guardar</button>
      {% if UsuarioColaborador %}
      <button type="button" onclick="confirmarBorrarDocumento();" class="btn btn-sm btn-salmon"><i class="material-icons">delete</i> Eliminar</button>
      {% endif %}
    </div>
  </div>
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

              {% include 'usuarios/datos/personales.html.php' %}

            </div>
            <div class="tab-pane fade" id="laborales" role="tabpanel" aria-labelledby="laborales-tab">

              {% include 'usuarios/datos/laborales.html.php' %}

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

              {% include 'usuarios/datos/institucional.html.php' %}

            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

              {% include 'usuarios/datos/operaciones.html.php' %}

            </div>
          </div>

        </div>
      </div>

    </div>
    <div class="col-lg-4 col-md-12">

      {% include 'usuarios/datos/usuarios.html.php' %}

      <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
          <h6 class="m-0">Propiedades</h6>
        </div>
        <div class='card-body p-0'>
          <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
              <span class="d-flex mb-2">
                <i class="material-icons mr-1">fiber_pin</i>
                <strong class="mr-1">Última IP: </strong>
                {% if UsuarioColaborador %}{{UsuarioColaborador.usuarioULTIMAIP}}{% else %}-{% endif %}
              </span>
              <span class="d-flex mb-2">
                <i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Última Visita: </strong>
                {% if UsuarioColaborador %}{{UsuarioColaborador.usuarioULTIMAVISITA}}{% else %}-{% endif %}
              </span>
              <span class="d-flex mb-2">
                <i class="material-icons mr-1">score</i><strong class="mr-1">Última Posición: </strong>
                <span class="text-warning">{% if UsuarioColaborador %}{{UsuarioColaborador.usuarioULTIMALATITUD}},{{UsuarioColaborador.usuarioULTIMALONGITUD}}{% else %}-{% endif %}</span>
              </span>
              <span class="d-flex mb-2">
                <i class="material-icons mr-1">lock</i>
                <strong class="mr-1">Control de Asistencia: </strong>
                {% if UsuarioColaborador %}
                  {% if UsuarioColaborador.colaboradorCONTROLASISTENCIA == 'SI' %}Marcar Asistencia{% else %}No Aplica{% endif %}
                  <a class="ml-auto" href="javascript:void(0);"
                    onclick="mostrarConfirmacionCambiarSeguridadUsuarioColaborador({{UsuarioColaborador.usuarioID}}, function(){ mostrarFormularioEditarUsuarioColaborador({{UsuarioColaborador.usuarioID}}); } );"><i class="fas fa-sync"></i></a>
                {% else %} - {% endif %}
              </span>
              <span class="d-flex mb-2">
                <i class="material-icons mr-1">flag</i>
                <strong class="mr-1">Estado: </strong>
                {% if UsuarioColaborador %}
                {{UsuarioColaborador.usuarioESTADO}}
                  <a class="ml-auto" href="javascript:void(0);"
                    onclick="mostrarConfirmacionCambiarEstadoUsuarioColaborador({{UsuarioColaborador.usuarioID}}, function(){ mostrarFormularioEditarUsuarioColaborador({{UsuarioColaborador.usuarioID}}); } );"><i class="fas fa-sync"></i></a>
                {% else %}-{% endif %}
              </span>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </div>
  <input type="hidden" name="usuarioID" value=""/>
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

      var Formulario = crearFormData("form-usuarioColaborador");
      ejecutarOperacionFormData(
        'Usuarios', 'guardarDatos', Formulario ,
        function(Colaborador){ console.log(Colaborador); mostrarFormularioEditarUsuarioColaborador(Colaborador.usuarioID) }
      );

    });
  });
</script>
