<form id="form-documentoAP" class="add-new-post" onsubmit="return false;" >
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-8 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Información Institucional</span>
      <h3 class="page-title">Documento</h3>
    </div>
    <div class="col-12 col-sm-4 d-flex align-items-center">
      <button type="submit" onclick="intercambiarModoBorrador('NO');"
        class="btn btn-sm btn-outline-accent ml-auto"><i class="material-icons">save</i> Borrador</button>
      <button type="submit" onclick="intercambiarModoBorrador('SI');"
        class="btn btn-sm btn-accent ml-auto"><i class="material-icons">file_copy</i> Publicar</button>
      {% if DocumentoAP %}
      <button type="button" onclick="confirmarBorrarDocumento();" class="btn btn-sm btn-salmon ml-auto"><i class="material-icons">delete</i> Eliminar</button>
      {% endif %}
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-12">

      <div class="card card-small mb-3">
        <div class="card-body">

            <input class="form-control form-control-lg mb-3" type="text" name="documentoNOMBRE" placeholder="Titulo del Documento" value="{{DocumentoAP.documentoNOMBRE}}" required >
            <div class="row">
              <div class=" col-md-8">
                <input class="form-control form-control-lg mb-3" type="url" name="documentoURL" placeholder="URL del Documento" value="{{DocumentoAP.documentoURL}}" >
              </div>
              <div class=" col-md-4">
                <input class="form-control form-control-lg mb-3" type="text" name="documentoVERSION" placeholder="Versión" value="{{DocumentoAP.documentoVERSION}}" required >
              </div>
            </div>
            <div id="editor-documento-procesosAP" class="add-new-post__editor mb-1">{{DocumentoAP.documentoCONTENIDO}}</div>

        </div>
      </div>

      <div class="card card-small mb-3">
        <div class="card-body">

          <div class="row">
            <div class=" col-md-4">
              <div id="cargarMiniaturaDocumento" class="dropzone"></div>
              <input type="hidden" id="documentoIMAGEN_RUTA"  name="documentoIMAGEN_RUTA" value=""/>
            </div>
            <div class=" col-md-8">
              <textarea id="documentoOBSERVACIONES" name="documentoOBSERVACIONES"
                class="md-textarea form-control" rows="5" placeholder="observaciones sobre el documento o contenido....." ></textarea>
            </div>
          </div>

        </div>
      </div>

    </div>
    <div class="col-lg-4 col-md-12">
      <!-- Post Overview -->
      <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
          <h6 class="m-0">Propiedades</h6>
        </div>
        <div class='card-body p-0'>
          <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
              <span class="d-flex mb-2">
                <i class="material-icons mr-1">lock</i>
                <strong class="mr-1">Permisos: </strong>
                {% if DocumentoAP %} {% if DocumentoAP.documentoPUBLICO == 'SI' %}PÚBLICO{% else %}RESTRINGIDO{% endif %} {% else %} RESTRINGIDO {% endif %}
              </span>
              <span class="d-flex mb-2">
                <i class="material-icons mr-1">flag</i>
                <strong class="mr-1">Estado: </strong>
                {% if DocumentoAP %}{{DocumentoAP.documentoESTADO}}{% else %}INACTIVO{% endif %}
              </span>
              <span class="d-flex mb-2">
                <i class="material-icons mr-1">fiber_pin</i>
                <strong class="mr-1">Código: </strong>
                {% if DocumentoAP %}{{DocumentoAP.documentoCODIGO}}{% else %}-{% endif %}
              </span>
              <span class="d-flex mb-2">
                <i class="material-icons mr-1">visibility</i>
                <strong class="mr-1">Publicado: </strong>
                {% if DocumentoAP %}{{DocumentoAP.documentoPUBLICADO}}{% else %}NO{% endif %}
              </span>
              <span class="d-flex mb-2">
                <i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Actualización: </strong>
                {% if DocumentoAP %}{{DocumentoAP.documentoFCHACTUALIZACION}}{% else %}{{ "now"|date("Y-m-d h:i.s") }}{% endif %}
              </span>
              <span class="d-flex">
                <i class="material-icons mr-1">score</i><strong class="mr-1">Por: </strong>
                <span class="text-warning">{% if DocumentoAP %}{{DocumentoAP.documentoESTADO}}{% else %}INACTIVO{% endif %}</span>
              </span>
            </li>
          </ul>
        </div>
      </div>
      <!-- / Post Overview -->
      <!-- Post Overview -->
      <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
          <h6 class="m-0">Procesos</h6>
        </div>
        <div class='card-body p-0'>
          <ul class="list-group list-group-flush">
            <li id="listado-procesos-documento" class="list-group-item px-3 pb-2" style="max-height: 120px;overflow: auto;">
              {% for Proceso in Procesos %}
              <div class="custom-control custom-radio mb-1">
                <input type="radio" id="proceso{{Proceso.procesoID}}" class="custom-control-input"
                  name="procesoID" value="{{Proceso.procesoID}}" required  >
                <label class="custom-control-label" for="proceso{{Proceso.procesoID}}">{{Proceso.procesoTITULO}}</label>
              </div>
              {% endfor %}
            </li>
            <li class="list-group-item d-flex px-3">
              <div class="input-group">
                <input type="text" class="form-control" id="nombreNuevoProceso" name="procesoTITULO"
                  placeholder="Agregar Nuevo Proceso AP." aria-label="Agregar Nuevo Proceso AP." aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-white px-2" type="button" onclick="agregarNuevoProcesoDesdeDocumento();"><i class="material-icons">add</i></button>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!-- / Post Overview -->
      <div class='card card-small mb-3'>
        <div class="card-header border-bottom">
          <h6 class="m-0">Responsable</h6>
        </div>
        <div class='card-body p-0'>
          <ul class="list-group list-group-flush">
            <li class="list-group-item px-3 pb-2" >


              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="cargoRESPONSABLE">Cargos</label>
                </div>
                <select class="custom-select" id="cargoRESPONSABLE" onchange="cargarSelectColaboradorPorCargos()" required >
                  <option value="">Elija un CARGO</option>
                  {% for Cargo in Cargos %}
                  <option value="{{Cargo.cargoID}}">{{Cargo.cargoTITULO}}</option>
                  {% endfor %}
                </select>
              </div>

              <hr>
              <div class="form-group ">
                <label for="opciones-responsable-documento">Colaborador</label>
                <select class="form-control custom-select" id="opciones-responsable-documento" name="documentoRESPONSABLE" required >
                  <option value="">Seleccione un CARGO antes</option>
                </select>
              </div>


            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
  "use strict";
  var editor;
  var myDropzone;
  var documentoPUBLICADO = "NO";


  jQuery(document).ready(function(){
    editor = new Quill("#editor-documento-procesosAP",{
      modules:{
        toolbar:[
          [{header:[1,2,3,4,5,!1]}],
          ["bold","italic","underline","strike"],
          ["blockquote","code-block"],
          [{header:1},{header:2}],
          [{list:"ordered"},{list:"bullet"}],
          [{script:"sub"},{script:"super"}],
          [{indent:"-1"},{indent:"+1"}]
        ]
      },
      placeholder:"Escriba o pegue aquí el contenido del documento...",
      theme:"snow"
    });

    myDropzone = new Dropzone("div#cargarMiniaturaDocumento", {
      paramName: "documentoIMAGEN",
      params: {
        modulo: "DocumentosAP",
        operacion: "recibirMiniatura",
      },
      maxFilesize: 1,
      acceptedFiles: 'image/*',
    });

    myDropzone.on("sending", function(file, done) { bloquearPantalla(); });
    myDropzone.on("complete", function(file, done) { desbloquearPantalla(); });

    myDropzone.on("success", function(file, done) {
      controlRespuesta(done,
        function(ruta){
          $("#documentoIMAGEN_RUTA").val( ruta );
        }
      );
    });

    $("#form-documentoAP").submit(function(){
      var documentoCONTENIDO = editor.root.innerHTML;
      var Datos = crearFormData("form-documentoAP");
      Datos.append("documentoCONTENIDO", documentoCONTENIDO);
      Datos.append("documentoPUBLICADO", documentoPUBLICADO);
      ejecutarOperacionFormData('DocumentosAP', 'guardarNuevo', Datos,
        function(resp){
          console.log(resp);
          mostrarFormularioEditarDocumentoAP(resp.documentoID);
        }
      );

    });
  });




  function agregarNuevoProcesoDesdeDocumento(){
    agregarNuevoProcesoSoloTitulo( nombreNuevoProceso.value,
      function(resp){
        // console.log(resp);
        cargarListadoProcesos();
      }
    );
  }


  function cargarListadoProcesos(){
    cargarDivision("listado-procesos-documento", "DocumentosAP", "listadoProcesosFormulario");
  }

  function cargarSelectColaboradorPorCargos(){
    var cargoID = $("#cargoRESPONSABLE").val();
    bloquearPantalla();
    cargarDivision("opciones-responsable-documento", "DocumentosAP", "listadoColaboradoresPorCargo", "cargoID="+cargoID, function(){desbloquearPantalla();});
  }


  function intercambiarModoBorrador(ACTIVADO){
    documentoPUBLICADO = ACTIVADO;
  }
</script>