<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-8 text-center text-sm-left mb-0">
    <span class="text-uppercase page-subtitle">Información Institucional</span>
    <h3 class="page-title">Gestión de Documentos</h3>
  </div>
  <div class="col-12 col-sm-4 d-flex align-items-center">
  </div>
</div>
<div class="card card-small">
<div class="card-body py-0 px-0">
<table id="tbl-todos-documentosAP" class="table mb-0 ">
  <thead class="bg-light">
    <tr>
      <th scope="col" title="Operaciones" ></th>
      <th scope="col">proceso</th>
      <th scope="col">código</th>
      <th scope="col">Nombre</th>
      <th scope="col">Versión</th>
      <th scope="col">Actualización</th>
      <th scope="col">Responsable</th>
      <th scope="col" title="Documento Asociado" ><i class="material-icons">note</i></th>
      <th scope="col" title="Miniatura" ><i class="material-icons">photo</i></th>
      <th scope="col" title="Permisos" ><i class="material-icons">lock</i></th>
      <th scope="col" title="Publicado" ><i class="material-icons">visibility</i></th>
      <th scope="col" title="Estado" ><i class="material-icons">flag</i></th>
    </tr>
  </thead>
  <tbody>
    {% for DocumentoAP in DocumentosAP %}
    <tr>
      <td scope="col" class="btn-operaciones-tablas" >
        <div class="btn-group btn-group-sm btn-group-toggle " data-toggle="buttons">
          <button class="btn btn-xs btn-info" onclick="mostrarModalDetallesDocumentoAP({{DocumentoAP.documentoID}});" ><i class="fas fa-eye"></i></button>
          <button class="btn  btn-xs btn-success" onclick="mostrarFormularioEditarDocumentoAP({{DocumentoAP.documentoID}});" ><i class="fas fa-edit"></i></button>
          <button class="btn btn-xs btn-danger" onclick="mostrarConfirmacionEliminarDocumentoAP({{DocumentoAP.documentoID}});"><i class="fas fa-trash"></i></button>
        </div>
      </td>
      <td scope="col" title="{{DocumentoAP.procesoCODIGO}}" style="font-size:70%" >{{DocumentoAP.procesoTITULO}}</td>
      <td scope="col" >{{DocumentoAP.documentoCODIGO}}</td>
      <td scope="col">{{DocumentoAP.documentoNOMBRE}}</td>
      <td scope="col">{{DocumentoAP.documentoVERSION}}</td>
      <td scope="col">{{DocumentoAP.documentoFCHACTUALIZACION|date('Y-m-d')}}</td>
      <td scope="col">{{DocumentoAP.cargoTITULO}}</td>
      <td scope="col">
        {% if DocumentoAP.documentoURL %}
        <a href="{{DocumentoAP.documentoURL}}" target="_blank" class="btn btn-xs btn-outline-royal-blue"><i class="fas fa-link"></i></a>

        <small style="font-size: 0px;">{{DocumentoAP.documentoURL}}</small>
        {% else %}
        <button title="NO TIENE UN ARCHIVO ASOCIADO." class="btn btn-xs btn-outline-salmon" disabled ><i class="fas fa-unlink"></i></button>
        {% endif %}
      </td>
      <td scope="col">
        {% if DocumentoAP.documentoIMAGEN %}
        <a href="{{DocumentoAP.documentoIMAGEN}}" target="_blank" class="btn btn-xs btn-outline-java"><i class="fas fa-image"></i></a>
        <small style="font-size: 0px;">{{DocumentoAP.documentoIMAGEN}}</small>
        {% else %}
        <button title="NO TIENE UNA IMAGEN ASOCIADA." class="btn btn-xs btn-outline-salmon" disabled ><i class="fas fa-camera"></i></button>
        {% endif %}
      </td>
      <td scope="col" title="{{DocumentoAP.documentoPUBLICO}}">
        {% if DocumentoAP.documentoPUBLICO == 'SI' %}
        <button onclick="mostrarConfirmacionCambiarSeguridadDocumentoAP({{DocumentoAP.documentoID}}, abrirGestorDocumentosAP );" class="btn btn-xs btn-outline-java"><i class="fas fa-lock-open"></i></button>
        {% else %}
        <button onclick="mostrarConfirmacionCambiarSeguridadDocumentoAP({{DocumentoAP.documentoID}}, abrirGestorDocumentosAP );"class="btn btn-xs btn-outline-salmon"><i class="fas fa-lock"></i></button>
        {% endif %}
        <small style="font-size: 0px;">{{DocumentoAP.documentoPUBLICO}}</small>
      </td>
      <td scope="col" title="{{DocumentoAP.documentoPUBLICADO}}">
        {% if DocumentoAP.documentoPUBLICADO == 'SI' %}
        <button onclick="mostrarConfirmacionCambiarVisibilidadDocumentoAP({{DocumentoAP.documentoID}}, abrirGestorDocumentosAP);" class="btn btn-xs btn-outline-java"><i class="fas fa-eye"></i></button>
        {% else %}
        <button onclick="mostrarConfirmacionCambiarVisibilidadDocumentoAP({{DocumentoAP.documentoID}}, abrirGestorDocumentosAP);" class="btn btn-xs btn-outline-salmon"><i class="fas fa-eye-slash"></i></button>
        {% endif %}
        <small style="font-size: 0px;">{{DocumentoAP.documentoPUBLICADO}}</small>
      </td>
      <td scope="col">
        {% if DocumentoAP.documentoESTADO == 'ACTIVO' %}
        <button onclick="mostrarConfirmacionCambiarEstadoDocumentoAP({{DocumentoAP.documentoID}}, abrirGestorDocumentosAP);" class="btn btn-xs btn-outline-java"><i class="fas fa-thumbs-up"></i></button>
        {% elseif DocumentoAP.documentoESTADO == 'INACTIVO' %}
        <button onclick="mostrarConfirmacionCambiarEstadoDocumentoAP({{DocumentoAP.documentoID}}, abrirGestorDocumentosAP);" class="btn btn-xs btn-outline-salmon"><i class="fas fa-thumbs-down"></i></button>
        {% elseif DocumentoAP.documentoESTADO == 'PAPELERA' %}
        <button onclick="mostrarConfirmacionRecuperarDocumentoAP({{DocumentoAP.documentoID}}, abrirGestorDocumentosAP);" class="btn btn-xs btn-outline-dark"><i class="fas fa-trash-alt"></i></button>
        {% endif %}
        <small style="font-size: 0px;">{{DocumentoAP.documentoESTADO}}</small>

      </td>
    </tr>
    {% endfor %}
  </tbody>
</table>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tbl-todos-documentosAP').DataTable();
    $("#botonera_sobreTablaAP.botonera").html(
      '<button type="button" onclick="mostrarFormularioNuevoDocumentoAP();" class="btn btn-sm btn-accent btn-primary"><i class="material-icons">add</i> Nuevo </button>'
      + '<button type="button" onclick="abrirGestorDocumentosAP();" class="btn btn-sm btn-gray"><i class="material-icons">refresh</i> Actualizar </button>'
      );
} );
</script>