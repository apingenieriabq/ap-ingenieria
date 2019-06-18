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
                    <div><textarea id="editor-documento-procesosAP" class="mb-1">{{DocumentoAP.documentoCONTENIDO|raw}}</textarea></div>

                </div>
            </div>

            <div class="card card-small mb-3">
                <div class="card-body">

                    <div class="row">
                        <div class=" col-md-4">


                            <ul class="nav nav-tabs">
                                <li class="nav-item active"><a class="nav-link active" data-toggle="tab" href="#home">Miniatura</a></li>
                                <li class="nav-item"><a  class="nav-link " data-toggle="tab" href="#menu1">Cargar</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active show">
                                    <img src="{% if DocumentoAP.documentoIMAGEN %}{{DocumentoAP.documentoIMAGEN}}{% else %}plantilla/basica/images/file-manager/document-preview-1.jpg{% endif %}" class="img-thumbnail rounded " />
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div id="cargarMiniaturaDocumento" class="dropzone"></div>
                                    <input type="hidden" id="documentoIMAGEN_RUTA"  name="documentoIMAGEN_RUTA" value=""/>
                                </div>
                            </div>





                        </div>
                        <div class=" col-md-8 form-group">
                            <label for="documentoOBSERVACIONES">Observaciones:</label>
                            <textarea id="documentoOBSERVACIONES" name="documentoOBSERVACIONES"
                                      class="md-textarea form-control" rows="7" placeholder="observaciones sobre el documento o contenido....." >{{DocumentoAP.documentoOBSERVACIONES}}</textarea>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-12">
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">Propiedades</h6>
                </div>
                <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">fiber_pin</i>
                                <strong class="mr-1">Código: </strong>
                                {% if DocumentoAP %}{{DocumentoAP.documentoCODIGO}}{% else %}-{% endif %}
                            </span>
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Actualización: </strong>
                                {% if DocumentoAP %}{{DocumentoAP.documentoFCHACTUALIZACION}}{% else %}{{ "now"|date("Y-m-d h:i.s") }}{% endif %}
                            </span>
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">score</i><strong class="mr-1">Responsable: </strong>
                                <span class="text-warning">{% if DocumentoAP %}{{DocumentoAP.personaNOMBRES}} {{DocumentoAP.personaPAELLIDOS}}<br/><strong>{{DocumentoAP.cargoTITULO}}</strong>{% else %}-{% endif %}</span>
                            </span>
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">lock</i>
                                <strong class="mr-1">Permisos: </strong>
                                {% if DocumentoAP %}
                                {% if DocumentoAP.documentoPUBLICO == 'SI' %}PÚBLICO{% else %}RESTRINGIDO{% endif %}
                                <a class="ml-auto" href="javascript:void(0);"
                                   onclick="mostrarConfirmacionCambiarSeguridadDocumentoAP({{DocumentoAP.documentoID}}, function(){ mostrarFormularioEditarDocumentoAP({{DocumentoAP.documentoID}}); });"><i class="fas fa-sync"></i></a>
                                {% else %} RESTRINGIDO {% endif %}
                            </span>
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">visibility</i>
                                <strong class="mr-1">Publicado: </strong>
                                {% if DocumentoAP %}
                                {{DocumentoAP.documentoPUBLICADO}}
                                <a class="ml-auto" href="javascript:void(0);"
                                   onclick="mostrarConfirmacionCambiarVisibilidadDocumentoAP({{DocumentoAP.documentoID}}, function(){ mostrarFormularioEditarDocumentoAP({{DocumentoAP.documentoID}}); });"><i class="fas fa-sync"></i></a>
                                {% else %}NO{% endif %}
                            </span>
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">flag</i>
                                <strong class="mr-1">Estado: </strong>
                                {% if DocumentoAP %}
                                {{DocumentoAP.documentoESTADO}}
                                <a class="ml-auto" href="javascript:void(0);"
                                   onclick="mostrarConfirmacionCambiarEstadoDocumentoAP({{DocumentoAP.documentoID}}, function(){ mostrarFormularioEditarDocumentoAP({{DocumentoAP.documentoID}}); });"><i class="fas fa-sync"></i></a>
                                {% else %}INACTIVO{% endif %}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

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
                                       name="procesoID" value="{{Proceso.procesoID}}" required {% if DocumentoAP and DocumentoAP.procesoID ==  Proceso.procesoID %}checked{% endif %}  >
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
                                <select class="form-control custom-select" id="cargoRESPONSABLE" onchange="cargarSelectColaboradorPorCargos()" >
                                    <option value="">Elija un CARGO</option>
                                    {% for Cargo in Cargos %}
                                    <option value="{{Cargo.cargoID}}">{{Cargo.cargoTITULO}}</option>
                                    {% endfor %}
                                </select>
                            </div>

                            <hr>
                            <div class="form-group ">
                                <label for="opciones-responsable-documento">Colaborador</label>
                                <select class="form-control custom-select" id="opciones-responsable-documento" name="documentoRESPONSABLE" >
                                    <option value="">Seleccione un CARGO antes</option>
                                </select>
                            </div>

                            {% if DocumentoAP %}
                            <input type="hidden" name="documentoRESPONSABLE_ACTUAL" value="{{DocumentoAP.documentoRESPONSABLE}}" />
                            {% endif %}


                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    {% if DocumentoAP %}
    <input type="hidden" name="documentoID" value="{{DocumentoAP.documentoID}}" />
    {% endif %}
</form>
<script type="text/javascript">
var editor;
var myDropzone;
var documentoPUBLICADO = "NO";
$(document).ready(function() {
  $('#editor-documento-procesosAP').summernote({
      placeholder: 'Contenido o Descripción del Documento',
      tabsize: 2,
      dialogsInBody: true,
      callbacks: {
            onImageUpload: function (image) {
                editor = $(this);
                console.log(editor);
                cargarImagenParaEditor(image[0], editor);
            }
        }
  });
});

function cargarImagenParaEditor(archivoFormData, EditorHTML) {
    var data = new FormData();
    data.append("image", archivoFormData);
    ejecutarOperacionArchivo('Archivos', 'recibirImagenEditor', data, function (resp) {
        console.log(resp);
        var image = $('<img>').attr('src', resp);
        $(EditorHTML).summernote("insertNode", image[0]); 
    });
}


jQuery(document).ready(function() {  
  myDropzone = new Dropzone("div#cargarMiniaturaDocumento", {
    paramName: "documentoIMAGEN",
    params: {
      modulo: "DocumentosAP",
      operacion: "recibirMiniatura",
    },
    maxFilesize: 1,
    acceptedFiles: 'image/*',
  });
  myDropzone.on("sending", function(file, done) {
    bloquearPantalla();
  });
  myDropzone.on("complete", function(file, done) {
    desbloquearPantalla();
  });
  myDropzone.on("success", function(file, done) {
    controlRespuesta(done,
      function(ruta) {
        $("#documentoIMAGEN_RUTA").val(ruta);
      }
    );
  });
  $("#form-documentoAP").submit(function() {
    var documentoCONTENIDO = $('#editor-documento-procesosAP').summernote('code');
    var Datos = crearFormData("form-documentoAP");
    Datos.append("documentoCONTENIDO", documentoCONTENIDO);
    Datos.append("documentoPUBLICADO", documentoPUBLICADO);
    ejecutarOperacionFormData('DocumentosAP', 'guardarDatos', Datos,
      function(resp) {
        console.log(resp);
        mostrarFormularioEditarDocumentoAP(resp.documentoID);
      }
    );
  });
});

function agregarNuevoProcesoDesdeDocumento() {
  agregarNuevoProcesoSoloTitulo(nombreNuevoProceso.value,
    function(resp) {
      // console.log(resp);
      cargarListadoProcesos();
    }
  );
}

function cargarListadoProcesos() {
  cargarDivision("listado-procesos-documento", "DocumentosAP", "listadoProcesosFormulario");
}

function cargarSelectColaboradorPorCargos() {
  var cargoID = $("#cargoRESPONSABLE").val();
  bloquearPantalla();
  cargarDivision("opciones-responsable-documento", "DocumentosAP", "listadoColaboradoresPorCargo", "cargoID=" + cargoID, function() {
    desbloquearPantalla();
  });
}

function intercambiarModoBorrador(ACTIVADO) {
  documentoPUBLICADO = ACTIVADO;
} 
</script>