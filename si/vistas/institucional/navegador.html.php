<!-- Page Header -->
<div class="page-header row no-gutters py-4">
  <div class="col">
    <span class="text-uppercase page-subtitle">Información Intitución</span>
    <h3 class="page-title">Libreria de Documentos</h3>
  </div>
  <div class="col d-flex">
    <!--<div class="btn-group btn-group-sm d-inline-flex ml-auto my-auto" role="group" aria-label="Table row actions">-->
    <!--  <a href="file-manager-list.html" class="btn btn-white">-->
    <!--    <i class="material-icons">&#xE8EF;</i>-->
    <!--  </a>-->
    <!--  <a href="file-manager-cards.html" class="btn btn-white active">-->
    <!--    <i class="material-icons">&#xE8F0;</i>-->
    <!--  </a>-->
    <!--</div>-->
  </div>
</div>
<!-- End Page Header -->
<!-- File Manager - Cards -->
<div class="file-manager file-manager-cards">
  <div class="row">
    <div class="col">
      <span class="file-manager__group-title text-uppercase text-light">Procesos</span>
    </div>
  </div>

  <div class="row">
    {% for Proceso in Procesos %}
    <div class="col-lg-4">
      <div data-procesoID="{{Proceso.procesoID}}" class="gestor_carpetas_procesos file-manager__item file-manager__item--directory  card card-small mb-3">
        <div class="card-footer">
          <span class="file-manager__item-icon">
            <i class="material-icons">&#xE2C7;</i>
          </span>
          <h6 class="file-manager__item-title">{{Proceso.procesoTITULO}}</h6>
        </div>
      </div>
    </div>
    {% endfor %}
  </div>
  <div class="row">
    <div class="col">
      <span class="file-manager__group-title text-uppercase text-light">Documentos</span>
      <span id="titulo_proceso_documentos" class="file-manager__group-title text-uppercase text-light"></span>
    </div>
  </div>
  <div id="documentos_asociados_al_proceso" class="row">
  {% include 'institucional/navegador-documentos.html.php' %}
  </div>
</div>
<!-- End File Manager - Cards -->


<script>
$( document ).ready(function() {

  cargarDocumentosDelProceso(1);

  $(".gestor_carpetas_procesos").click(function(){
      $(".gestor_carpetas_procesos").removeClass("file-manager__item--selected");
      $(this).addClass("file-manager__item--selected");

      cargarDocumentosDelProceso( $(this).attr('data-procesoID') );

  });
});



function cargarDocumentosDelProceso(procesoID){
  scrollAlObjeto('documentos_asociados_al_proceso');
  cargarDivision( 'documentos_asociados_al_proceso', 'ListadoMaestroDocumento', 'documentosProceso', 'procesoID='+procesoID, function(resp){
  });
}
</script>