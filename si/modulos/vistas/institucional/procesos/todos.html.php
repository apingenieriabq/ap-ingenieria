<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-8 text-center text-sm-left mb-0">
    <span class="text-uppercase page-subtitle">Información Institucional</span>
    <h3 class="page-title">Procesos Internos de AP Ingenieria</h3>
  </div>
  <div class="col-12 col-sm-4 d-flex align-items-center">
  </div>
</div>
<div class="card card-small">
<div class="card-body py-0 px-0">
<table id="tbl-todos-procesosAP" class="table mb-0 ">
  <thead class="bg-light">
    <tr>
      <th scope="col" title="Operaciones" ></th>
      <th scope="col">código</th>
      <th scope="col">Nombre</th>
      <th scope="col">Responsable</th>
      <th scope="col">Actualización</th>
      <th scope="col" title="Estado" ><i class="material-icons">flag</i></th>
    </tr>
  </thead>
  <tbody>
    {% for ProcesoAP in ProcesosAP %}
    <tr>
      <td scope="col" class="btn-operaciones-tablas" >
        <div class="btn-group btn-group-sm btn-group-toggle " data-toggle="buttons">
          <button class="btn btn-xs btn-info" onclick="mostrarModalDetallesProcesoAP({{ProcesoAP.procesoID}});" ><i class="fas fa-eye"></i></button>
          <button class="btn  btn-xs btn-success" onclick="mostrarFormularioEditarProcesoAP({{ProcesoAP.procesoID}});" ><i class="fas fa-edit"></i></button>
          <button class="btn btn-xs btn-danger" onclick="mostrarConfirmacionEliminarProcesoAP({{ProcesoAP.procesoID}}, abrirGestorProcesosAP);"><i class="fas fa-trash"></i></button>
        </div>
      </td>
      <td scope="col" >{{ProcesoAP.procesoCODIGO}}</td>
      <td scope="col" title="{{ProcesoAP.procesoCODIGO}}" style="font-size:70%" >{{ProcesoAP.procesoTITULO}}</td>
      <td scope="col">{{ProcesoAP.Responsable.Persona.personaNOMBRES}} {{ProcesoAP.Responsable.Persona.personaAPELLIDOS}}</td>
      <td scope="col">{{ProcesoAP.procesoFCHACTUALIZACION|date('Y-m-d')}}</td>
      
      
      <td scope="col">
        {% if ProcesoAP.procesoESTADO == 'ACTIVO' %}
        <button onclick="mostrarConfirmacionCambiarEstadoProcesoAP({{ProcesoAP.procesoID}}, abrirGestorProcesosAP);" class="btn btn-xs btn-outline-java"><i class="fas fa-thumbs-up"></i></button>
        {% elseif ProcesoAP.procesoESTADO == 'INACTIVO' %}
        <button onclick="mostrarConfirmacionCambiarEstadoProcesoAP({{ProcesoAP.procesoID}}, abrirGestorProcesosAP);" class="btn btn-xs btn-outline-salmon"><i class="fas fa-thumbs-down"></i></button>
        {% elseif ProcesoAP.procesoESTADO == 'PAPELERA' %}
        <button onclick="mostrarConfirmacionRecuperarProcesoAP({{ProcesoAP.procesoID}}, abrirGestorProcesosAP);" class="btn btn-xs btn-outline-dark"><i class="fas fa-trash-alt"></i></button>
        {% endif %}
        <small style="font-size: 0px;">{{ProcesoAP.procesoESTADO}}</small>

      </td>
    </tr>
    {% endfor %}
  </tbody>
</table>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tbl-todos-procesosAP').DataTable();
    $("#botonera_sobreTablaAP.botonera").html(
      '<button type="button" onclick="mostrarFormularioNuevoProcesoAP();" class="btn btn-sm btn-accent btn-primary"><i class="material-icons">add</i> Nuevo </button>'
      + '<button type="button" onclick="abrirGestorProcesosAP();" class="btn btn-sm btn-gray"><i class="material-icons">refresh</i> Actualizar </button>'
      );
} );
</script>