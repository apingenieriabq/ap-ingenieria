<form id="form-usuarioColaborador" class="add-new-post" onsubmit="return false;" >
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-8 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Seguridad</span>
      <h3 class="page-title">Usuario <strong>[Colaborador]</strong></h3>
    </div>
    <div class="col-12 col-sm-4 d-flex align-items-center">
      <button type="submit" onclick="intercambiarModoBorrador('NO');"
        class="btn btn-sm btn-outline-accent ml-auto"><i class="material-icons">save</i> Borrador</button>
      <button type="submit" onclick="intercambiarModoBorrador('SI');"
        class="btn btn-sm btn-accent ml-auto"><i class="material-icons">file_copy</i> Publicar</button>
      {% if UsuarioColaborador %}
      <button type="button" onclick="confirmarBorrarDocumento();" class="btn btn-sm btn-salmon ml-auto"><i class="material-icons">delete</i> Eliminar</button>
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

      <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
          <h6 class="m-0">Datos de Usuario</h6>
        </div>
        <div class='card-body p-0 mb-2'>

          <div class="form-row mx-4" >
            <h6 class="form-text m-0">Nombre de Usuario</h6>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="form-row mx-4">
            <div class="col mb-0">
              <h6 class="form-text m-0">Cambiar Contraseña</h6>
            </div>
          </div>
          <div class="form-row mx-4">
            <div class="form-group">
              <label for="lastName">Nueva Clave</label>
              <input type="text" class="form-control" id="lastName" placeholder="New Password">
            </div>
            <div class="form-group ">
              <label for="emailAddress">Repita la clave</label>
              <input type="email" class="form-control" id="emailAddress" placeholder="Repeat New Password">
            </div>
          </div>
          <hr />

          <div class="form-row mx-4">

            <label for="vulnerabilitiesEmailsToggle" class="col col-form-label"> ¿Es Administrador? <small class="form-text text-muted"> Tiene permiso para ejecutar cualquier código.</small>
            </label>
            <div class="col d-flex">
              <div class="custom-control custom-toggle ml-auto my-auto">
                <input type="checkbox" id="vulnerabilitiesEmailsToggle" class="custom-control-input" checked>
                <label class="custom-control-label" for="vulnerabilitiesEmailsToggle"></label>
              </div>
            </div>

          </div>

        </div>
      </div>

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
</form>
