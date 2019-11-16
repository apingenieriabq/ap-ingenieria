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
          {% if UsuarioColaborador %}{{UsuarioColaborador.Usuario.usuarioULTIMAIP}}{% else %}-{% endif %}
        </span>
        <span class="d-flex mb-2">
          <i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Última Visita: </strong>
          {% if UsuarioColaborador %}{{UsuarioColaborador.Usuario.usuarioULTIMAVISITA}}{% else %}-{% endif %}
        </span>
        <span class="d-flex mb-2">
          <i class="material-icons mr-1">score</i><strong class="mr-1">Última Posición: </strong>
          <span class="text-warning">{% if UsuarioColaborador %}{{UsuarioColaborador.Usuario.usuarioULTIMALATITUD}},{{UsuarioColaborador.Usuario.usuarioULTIMALONGITUD}}{% else %}-{% endif %}</span>
        </span>
        <!--<span class="d-flex mb-2">-->
        <!--  <i class="material-icons mr-1">lock</i>-->
        <!--  <strong class="mr-1">Control de Asistencia: </strong>-->
        <!--  {% if UsuarioColaborador %}-->
        <!--    {% if UsuarioColaborador.colaboradorCONTROLASISTENCIA == 'SI' %}Marcar Asistencia{% else %}No Aplica{% endif %}-->
        <!--    <a class="ml-auto" href="javascript:void(0);"-->
        <!--      onclick="mostrarConfirmacionCambiarSeguridadUsuarioColaborador({{UsuarioColaborador.usuarioID}}, function(){ mostrarFormularioEditarUsuarioColaborador({{UsuarioColaborador.usuarioID}}); } );"><i class="fas fa-sync"></i></a>-->
        <!--  {% else %} - {% endif %}-->
        <!--</span>-->
        <span class="d-flex mb-2">
          <i class="material-icons mr-1">flag</i>
          <strong class="mr-1">Estado: </strong>
          {% if UsuarioColaborador %}
          {{UsuarioColaborador.colaboradorESTADO}}
            <a class="ml-auto" href="javascript:void(0);"
              onclick="mostrarConfirmacionCambiarEstadoUsuarioColaborador({{UsuarioColaborador.colaboradorID}}, function(){ mostrarFormularioEditarUsuarioColaborador({{UsuarioColaborador.colaboradorID}}); } );"><i class="fas fa-sync"></i></a>
          {% else %}-{% endif %}
        </span>
      </li>
    </ul>
  </div>
</div>