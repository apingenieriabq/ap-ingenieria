<div class="page-header row no-gutters py-4">
  <div class="col  text-center text-sm-left mb-0">
    <span class="text-uppercase page-subtitle">Directorios</span>
    <h3 class="page-title">Colaboradores <small>[empleados y contratistas]</small></h3>
  </div>
  <div class="col  d-flex align-items-center">

  	<nav aria-label="" class="add_top_20 right">
  		<ul class="pagination pagination-sm btn-group">
  			<li class="page-item">
  				<a class=" page-link" href="javascript:void(0);" target="_self" onclick="anteriorPaginaDirectorioColaboradores();">Anterior</a>
  			</li>
  			{% if Directorio.Navegador > 0 %}
  			{% for i in range(0, Directorio.Navegador - 1) %}
  			<li class="page-item {% if i == Directorio.PaginaActual %}active{% endif %}">
  				<a class=" page-link" href="javascript:void(0);" target="_self" onclick="cambiarPaginaDirectorioColaboradores({{i}});">{{i+1}}</a>
  			</li>
				{% endfor %}
				{% endif %}


  			<li class="page-item">
  				<a class=" page-link" href="javascript:void(0);" target="_self" onclick="siguientePaginaDirectorioColaboradores();">Siguiente</a>
  			</li>
  		</ul>
  	</nav>

  </div>
</div>

<div class="card-deck directorio">
	{% set pCmitad = (Directorio.Colaboradores|length/2) %}
	{% for Colaborador in Directorio.Colaboradores %}

	<div class="card">
		<a href="javascript:void(0);" onclick="mostrarModalDatosContactoColaborador({{Colaborador.colaboradorID}});">
    <img class="card-img-top" src="{{Colaborador.colaboradorFOTO}}" alt="Card image cap">
    </a>
    <div class="card-body">
    	<p class="card-text"><strong>{{Colaborador.Cargo.cargoTITULO}}</strong> <small class="text-muted">- {{Colaborador.Cargo.unidadTITULO}}</small></p>
      <p class="card-title"><a href="javascript:void(0);" onclick="mostrarModalDatosContactoColaborador({{Colaborador.colaboradorID}});" class="preview">{{Colaborador.Persona.personaNOMBRES}} {{Colaborador.Persona.personaAPELLIDOS}}</a></p>
      <p class="card-text">

<div class="row mb-1">
  <div class="col">
    <small><strong>Vinculación</strong></small>
    <span>{{Colaborador.TipoColaborador.tipoColaboradorTITULO}}</span>
  </div>
</div>
<div class="row mb-1">
  <div class="col">
    <small><strong>Correo </strong></small>
    <span>{{Colaborador.colaboradorEMAIL}}</span>
  </div>
</div>
<div class="row mb-1">
  <div class="col">
    <small><strong>Celular</strong></small>
    <span>{{Colaborador.colaboradorCELULAR}}</span>
  </div>
</div>
<!--<div class="row mb-1">-->
<!--  <div class="col">-->
<!--    <strong>Teléfono</strong>-->
<!--    <span>{{Colaborador.Persona.personaTELEFONO}}</span>-->
<!--  </div>-->
<!--  <div class="col">-->
<!--    <strong>Celular</strong>-->
<!--    <span>{{Colaborador.Persona.personaCELULAR}}</span>-->
<!--  </div>-->
<!--</div>-->

      </p>
      <!--<small class="text-muted">-->
{% if Usuario.usuarioADMINISTRADOR == 'SI' %}
<ul class="nav flex-column">
  <li class="nav-item">Usuario: <span class="badge badge-primary badge-pill">{{Colaborador.Usuario.usuarioNOMBRE}}</span></li>
  <li class="nav-item">Último inicio: <span class="badge badge-primary badge-pill">{{Colaborador.Usuario.usuarioULTIMAVISITA}}</span></li>
  <li class="nav-item"><a href="https://www.google.com/maps/search/?api=1&query={{Colaborador.Usuario.usuarioULTIMALATITUD}},{{Colaborador.Usuario.usuarioULTIMALONGITUD}}" target="_blank"><i class="fa fa-maps"></i>Última ubicación: <span class="badge badge-primary badge-pill">@{{Colaborador.Usuario.usuarioULTIMALATITUD|round(4)}},{{Colaborador.Usuario.usuarioULTIMALONGITUD|round(4)}}</span></a></li>
</ul>
{% endif %}


      <!--</small>-->

    </div>
  </div>
  {% set pCi = pCi + 1 %}
  {% if pCi is divisible by(6) %}
</div>
<div class="card-deck">
  {% endif %}
	{% endfor %}
</div>

<script type="text/javascript" >
	var pagina = {{Directorio.PaginaActual}};
	var paginasTotales = {{Directorio.Navegador - 1}};
	function siguientePaginaDirectorioColaboradores(){
		var sigPagina = ( pagina + 1);
		if(paginasTotales >= sigPagina ){
			cambiarPaginaDirectorioColaboradores(sigPagina);
		}
	}
	function anteriorPaginaDirectorioColaboradores(){
		var antPagina = ( pagina - 1);
		if(antPagina >= 0 ){
			cambiarPaginaDirectorioColaboradores(antPagina);
		}
	}
	function cambiarPaginaDirectorioColaboradores(pagina){
		if(pagina >= 0 && pagina <= paginasTotales ){
			cargarVista('Directorios', 'cambiarPaginaColaboradores','pagina='+pagina);
		}
	}
function mostrarModalDatosContactoColaborador(colaboradorID) {
    cargarModal('Datos de Contacto', 'Directorios', 'mostrarDatosContactoColaboradorEnModal', 'colaboradorID=' + colaboradorID, function(respuesta) {});
}
</script>