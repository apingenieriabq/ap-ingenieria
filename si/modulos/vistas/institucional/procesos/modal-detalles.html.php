<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
    <div class="card card-small card-post card-post--1">
      <div class="card-post__image" >
        <a href="#" class="card-post__category badge badge-pill badge-dark">{{ProcesoAP.procesoTITULO}}</a>
        <div class="card-post__author d-flex">
          <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('{{ProcesoAP.Responsable.colaboradorFOTO}}');">Responsable: {{ProcesoAP.Responsable.personaNOMBRES}} {{ProcesoAP.Responsable.personaAPELLIDOS}}</a>
          <div class="d-flex flex-column justify-content-center ml-3">
            <span class="card-post__author-name">{{ProcesoAP.Responsable.personaNOMBRES}} {{ProcesoAP.Responsable.personaAPELLIDOS}}</span>
            <small class="text-muted">{{ProcesoAP.procesoFCHACTUALIZACION}}</small>
          </div>
        </div>
      </div>
      <div class="card-body">
        <hr class="m-0 mb-2 p-0" />
      <span class="float-right">
        <span scope="col" title="{{ProcesoAP.procesoESTADO}}">
          {% if ProcesoAP.procesoESTADO == 'ACTIVO' %}
          <button class="btn btn-xs btn-outline-java"><i class="fas fa-thumbs-up"></i></button>
          {% elseif ProcesoAP.procesoESTADO == 'INACTIVO' %}
          <button  class="btn btn-xs btn-outline-salmon"><i class="fas fa-thumbs-down"></i></button>
          {% elseif ProcesoAP.procesoESTADO == 'PAPELERA' %}
          <button class="btn btn-xs btn-outline-dark"><i class="fas fa-trash-alt"></i></button>
          {% endif %}
        </span>
      </span>
      <h5 class="card-title">
      <a class="text-fiord-blue"><small>{{ProcesoAP.procesoCODIGO}}</small> - {{ProcesoAP.procesoTITULO}} </a>
      </h5>
      <div class="card-text d-inline-block mb-3">{{ProcesoAP.procesoDESCRIPCION|raw}}</div>

      </div>
    </div>
  </div>
</div>
