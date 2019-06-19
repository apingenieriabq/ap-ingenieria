<form id="form-procesoAP" class="add-new-post" onsubmit="return false;" >
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-8 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Información Institucional</span>
            <h3 class="page-title">Proceso Interno</h3>
        </div>
        <div class="col-12 col-sm-4 d-flex align-items-center">
            <button type="submit"
                    class="btn btn-sm btn-accent ml-auto"><i class="material-icons">file_copy</i> Publicar</button>
            {% if ProcesoAP %}
            <button type="button" onclick="mostrarConfirmacionEliminarProcesoAP({{ProcesoAP.procesoID}}, abrirGestorProcesosAP);" class="btn btn-sm btn-salmon ml-auto"><i class="material-icons">delete</i> Eliminar</button>
            {% endif %}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-12">

            <div class="card card-small mb-3">
                <div class="card-body">

                    <div class="row">
                        <div class=" col-md-8">
                            <input class="form-control form-control-lg mb-3" type="text" name="procesoTITULO" placeholder="Titulo del Proceso" value="{{ProcesoAP.procesoTITULO}}" required >

                        </div>
                        <div class=" col-md-4">
                            <input class="form-control form-control-lg mb-3 mayusculas" type="text" name="procesoCODIGO" placeholder="Código sin espacios" value="{{ProcesoAP.procesoCODIGO}}" required >
                        </div>
                    </div>
                    <div id="editor-proceso-procesosAP" class="add-new-post__editor mb-1">{{ProcesoAP.procesoDESCRIPCION|raw}}</div>

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
                                {% if ProcesoAP %}{{ProcesoAP.procesoCODIGO}}{% else %}-{% endif %}
                            </span>
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Actualización: </strong>
                                {% if ProcesoAP %}{{ProcesoAP.procesoFCHACTUALIZACION}}{% else %}{{ "now"|date("Y-m-d h:i.s") }}{% endif %}
                            </span>
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">score</i><strong class="mr-1">Responsable: </strong>
                                <span class="text-warning">{% if ProcesoAP %}{{ProcesoAP.Responsable.Persona.personaNOMBRES}} {{ProcesoAP.Responsable.Persona.personaAPELLIDOS}}<br/><strong>{{ProcesoAP.Responsable.Cargo.cargoTITULO}}</strong>{% else %}-{% endif %}</span>
                            </span>
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">flag</i>
                                <strong class="mr-1">Estado: </strong>
                                {% if ProcesoAP %}
                                {{ProcesoAP.procesoESTADO}}
                                <a class="ml-auto" href="javascript:void(0);"
                                   onclick="mostrarConfirmacionCambiarEstadoProcesoAP({{ProcesoAP.procesoID}}, function(){ mostrarFormularioEditarProcesoAP({{ProcesoAP.procesoID}}); });"><i class="fas fa-sync"></i></a>
                                {% else %}INACTIVO{% endif %}
                            </span>
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
                                <label for="opciones-responsable-proceso">Colaborador</label>
                                <select class="form-control custom-select" id="opciones-responsable-proceso" name="procesoRESPONSABLE" >
                                    <option value="">Seleccione un CARGO antes</option>
                                </select>
                            </div>

                            {% if ProcesoAP %}
                            <input type="hidden" name="procesoRESPONSABLE_ACTUAL" value="{{ProcesoAP.procesoRESPONSABLE}}" />
                            {% endif %}


                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {% if ProcesoAP %}
    <input type="hidden" name="procesoID" value="{{ProcesoAP.procesoID}}" />
    {% endif %}
</form>
<script type="text/javascript">
    "use strict";
    var editor;
    var procesoPUBLICADO = "NO";
    jQuery(document).ready(function(){
        editor = new Quill("#editor-proceso-procesosAP", {
            placeholder:"Escriba o pegue aquí el contenido del proceso...",
            theme:"snow"
        });
        $("#form-procesoAP").submit(function(){
            var procesoCONTENIDO = editor.root.innerHTML;
            var Datos = crearFormData("form-procesoAP");
            Datos.append("procesoDESCRIPCION", procesoCONTENIDO);
            ejecutarOperacionFormData('ProcesosAP', 'guardarDatos', Datos,
                    function(resp){
                        console.log(resp);
                        mostrarFormularioEditarProcesoAP(resp.procesoID);
                    }
            );
        });
    });
    function agregarNuevoProcesoDesdeProceso(){
    agregarNuevoProcesoSoloTitulo(nombreNuevoProceso.value,
            function(resp){
            // console.log(resp);
            cargarListadoProcesos();
            }
    );
    }

    function cargarSelectColaboradorPorCargos(){
    var cargoID = $("#cargoRESPONSABLE").val();
    bloquearPantalla();
    cargarDivision("opciones-responsable-proceso", "ProcesosAP", "listadoColaboradoresPorCargo", "cargoID=" + cargoID, function(){desbloquearPantalla(); });
    }


    function intercambiarModoBorrador(ACTIVADO){
    procesoPUBLICADO = ACTIVADO;
    }
</script>