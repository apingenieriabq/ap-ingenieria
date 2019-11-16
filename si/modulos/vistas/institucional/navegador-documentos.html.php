{% if Documentos|length %}
{% for Documento in Documentos %}
<div class="col-12 col-sm-6 col-lg-3">
  <div id="{{Documento.documentoID}}" onclick="mostrarModalDetallesDocumentoAP({{Documento.documentoID}});"
      class="gestor_documentos_procesos file-manager__item card card-small mb-4" title="{{Documento.documentoNOMBRE}}" >
<!--    <div class="file-manager__item-preview card-body px-0 pb-0 pt-4">
        <img src="{% if Documento.documentoIMAGEN %}{{Documento.documentoIMAGEN}}{% else %}plantilla/basica/images/file-manager/document-preview-1.jpg{% endif %}" alt="{{Documento.documentoNOMBRE}}" style="    max-height: 96px;" />
    </div>-->
    <div class="card-footer border-top">
      <h6 class="file-manager__item-title" style="padding-right:0px; word-wrap: normal; white-space: normal;">{{Documento.documentoNOMBRE}}<br /><span style="font-size:75%">{{Documento.documentoCODIGO}}</span>/<span class="file-manager__item-size ml-auto">{{Documento.documentoFCHACTUALIZACION|date('Y-m-d')}}</span></h6>
      <span class="file-manager__item-icon">
        <i class="material-icons">&#xE24D;</i>
      </span>
    </div>
  </div>
</div>
{% endfor %}
{% else %}
<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">NO HAY DOCUMENTOS PARA ESTE PROCESO</h1>
    <!--<p class="lead text-muted">Si desea agregar un documento, presione el siguiente botón.</p>-->
    <p>
      <!--<a href="#" class="btn btn-primary my-2">Agregar Documento para Revisión.</a>-->
    </p>
  </div>
</section>
{% endif %}


<script>
$( document ).ready(function() {
  $(".gestor_documentos_procesos").click(function(){
      $(".gestor_documentos_procesos").removeClass("file-manager__item--selected");
      $(this).addClass("file-manager__item--selected");

      abrirVisorDocumentoIntitucional( $(this).attr('data-procesoID') );

  });
});

</script>