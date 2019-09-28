
{% if DocumentoAP.documentoURL %}

<div class="row">
  <div class="col-lg-12 col-sm-12 mb-4">
    <div class="card card-small card-post card-post--aside card-post--1">

        <div class="card-post__image" style="    min-height: 30px;" > 
        <a href="#" class="card-post__category badge badge-pill badge-info">{{DocumentoAP.procesoTITULO}}</a>
      <!--<div class="card-post__author d-flex">-->
      <!--  <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('{{DocumentoAP.colaboradorFOTO}}');">Responsable: {{DocumentoAP.personaNOMBRES}} {{DocumentoAP.personaAPELLIDOS}}</a>-->
      <!--</div>-->
    </div>

      <div class="card-body">

    <span class="float-right">
      <span scope="col" title="{{DocumentoAP.documentoPUBLICO}}">
        {% if DocumentoAP.documentoPUBLICO == 'SI' %}
        <button  class="btn btn-xs btn-outline-java"><i class="fas fa-lock-open"></i></button>
        {% else %} 
        <button  class="btn btn-xs btn-outline-salmon"><i class="fas fa-lock"></i></button>
        {% endif %}
        <small style="font-size: 0px;">{{DocumentoAP.documentoPUBLICO}}</small>
      </span>
      <span scope="col" title="{{DocumentoAP.documentoPUBLICADO}}">
        {% if DocumentoAP.documentoPUBLICADO == 'SI' %}
        <button class="btn btn-xs btn-outline-java"><i class="fas fa-eye"></i></button>
        {% else %}
        <button class="btn btn-xs btn-outline-salmon"><i class="fas fa-eye-slash"></i></button>
        {% endif %}
        <small style="font-size: 0px;">{{DocumentoAP.documentoPUBLICADO}}</small>
      </span>
      <span scope="col" title="{{DocumentoAP.documentoESTADO}}">
        {% if DocumentoAP.documentoESTADO == 'ACTIVO' %}
        <button class="btn btn-xs btn-outline-java"><i class="fas fa-thumbs-up"></i></button>
        {% elseif DocumentoAP.documentoESTADO == 'INACTIVO' %}
        <button  class="btn btn-xs btn-outline-salmon"><i class="fas fa-thumbs-down"></i></button>
        {% elseif DocumentoAP.documentoESTADO == 'PAPELERA' %}
        <button class="btn btn-xs btn-outline-dark"><i class="fas fa-trash-alt"></i></button>
        {% endif %}
      </span>
    </span>


        <h5 class="card-title">
        <a class="text-fiord-blue"><small>{{DocumentoAP.documentoCODIGO}}</small> - {{DocumentoAP.documentoNOMBRE}} <span class="badge badge-secondary">{{DocumentoAP.documentoVERSION}}</span></a>
        </h5>
        <p class="card-text d-inline-block mb-3">{{DocumentoAP.documentoCONTENIDO|raw}}</p>
        <span class="text-muted float-left">{{DocumentoAP.documentoOBSERVACIONES}}</span>

        <div class="card-post__author d-flex">
        <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('{{DocumentoAP.colaboradorFOTO}}');">Responsable: {{DocumentoAP.personaNOMBRES}} {{DocumentoAP.personaAPELLIDOS}}</a>
        <div class="d-flex flex-column justify-content-center ml-3">
        <span class="card-post__author-name">{{DocumentoAP.personaNOMBRES}} {{DocumentoAP.personaAPELLIDOS}}</span>
        <small class="text-muted">{{DocumentoAP.documentoFCHACTUALIZACION}}</small>
        </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-lg-12 col-sm-12 mb-4">
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="{{DocumentoAP.documentoURL}}" width="800" height="600" style="border: none;" allowfullscreen ></iframe>
    </div>
  </div>
</div>

{% else %}

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
    <div class="card card-small card-post card-post--1">
      <div class="card-post__image" style="    min-height: 30px;">
        <a href="#" class="card-post__category badge badge-pill badge-dark">{{DocumentoAP.procesoTITULO}}</a>
        <div class="card-post__author d-flex">
          <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('{{DocumentoAP.colaboradorFOTO}}');">Responsable: {{DocumentoAP.personaNOMBRES}} {{DocumentoAP.personaAPELLIDOS}}</a>
          <div class="d-flex flex-column justify-content-center ml-3">
            <span class="card-post__author-name">{{DocumentoAP.personaNOMBRES}} {{DocumentoAP.personaAPELLIDOS}}</span>
            <small class="text-muted">{{DocumentoAP.documentoFCHACTUALIZACION}}</small>
          </div>
        </div>
      </div>
      <div class="card-body">
        <hr class="m-0 mb-2 p-0" />
      <span class="float-right">
        <span scope="col" title="Visible para Cualquiera: {{DocumentoAP.documentoPUBLICO}}">
          {% if DocumentoAP.documentoPUBLICO == 'SI' %}
          <button  class="btn btn-xs btn-outline-java"><i class="fas fa-lock-open"></i></button>
          {% else %}
          <button  class="btn btn-xs btn-outline-salmon"><i class="fas fa-lock"></i></button>
          {% endif %}
          <small style="font-size: 0px;">{{DocumentoAP.documentoPUBLICO}}</small>
        </span>
        <span scope="col" title="Publicado: {{DocumentoAP.documentoPUBLICADO}}">
          {% if DocumentoAP.documentoPUBLICADO == 'SI' %}
          <button class="btn btn-xs btn-outline-java"><i class="fas fa-eye"></i></button>
          {% else %}
          <button class="btn btn-xs btn-outline-salmon"><i class="fas fa-eye-slash"></i></button>
          {% endif %}
          <small style="font-size: 0px;">{{DocumentoAP.documentoPUBLICADO}}</small>
        </span>
        <span scope="col" title="{{DocumentoAP.documentoESTADO}}">
          {% if DocumentoAP.documentoESTADO == 'ACTIVO' %}
          <button class="btn btn-xs btn-outline-java"><i class="fas fa-thumbs-up"></i></button>
          {% elseif DocumentoAP.documentoESTADO == 'INACTIVO' %}
          <button  class="btn btn-xs btn-outline-salmon"><i class="fas fa-thumbs-down"></i></button>
          {% elseif DocumentoAP.documentoESTADO == 'PAPELERA' %}
          <button class="btn btn-xs btn-outline-dark"><i class="fas fa-trash-alt"></i></button>
          {% endif %}
        </span>
      </span>
      <h5 class="card-title">
      <a class="text-fiord-blue"><small>{{DocumentoAP.documentoCODIGO}}</small> - {{DocumentoAP.documentoNOMBRE}} <span class="badge badge-secondary">{{DocumentoAP.documentoVERSION}}</span></a>
      </h5>
      <div class="card-text d-inline-block mb-3">{{DocumentoAP.documentoCONTENIDO|raw}}</div>
      <span class="text-muted float-left">{{DocumentoAP.documentoOBSERVACIONES}}</span>

      </div>
    </div>
  </div>
</div>

{% endif %}
