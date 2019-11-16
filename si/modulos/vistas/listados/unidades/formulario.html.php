<div class="page-header row no-gutters py-4">
    <div class="col">
        <span class="text-uppercase page-subtitle">Listados de Datos</span>
        <h3 class="page-title">Formulario para Unidades, Divisiones o Áreas de la Empresa</h3>
    </div>
    <div class="col d-flex">
        <div class="btn-group btn-group-sm d-inline-flex ml-auto my-auto" role="group" aria-label="Table row actions">

            <button type="submit" class="btn btn-primary">Guardar <i class="fas fa-save" ></i></button>
            <button type="reset" class="btn btn-primary">Limpiar</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 py-0 px-0">
        <div class="card card-small lo-stats h-100">
            <div class="card-header border-bottom">
                <h6 class="m-0">Formulario</h6>
                <div class="block-handle"></div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">

                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label for="unidadPADRE">Unidad Jefe</label>
                                        <select id="unidadPADRE" name="unidadPADRE" class="form-control">
                                            {% for Unidad in Unidades %}
                                            <option value="{{Unidad.unidadID}}">{{Unidad.unidadTITULO}}</option>
                                            {% endfor %}
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="tipoUnidadID">Tipo</label>
                                        <select id="tipoUnidadID" name="tipoUnidadID" class="form-control">
                                            <option value="DIRECCION">DIRECCION</option>
                                            <option value="DIVISION">DIVISION</option>
                                            <option value="SUBDIVISION">SUBDIVISION</option>
                                            <option value="AREA">AREA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="unidadCODIGO">Código</label>
                                        <input type="text" class="form-control mayusculas" id="unidadCODIGO" name="unidadCODIGO" placeholder="código sin espacios">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="unidadTITULO">Titulo</label>
                                        <input type="text" class="form-control tipoTitulo" id="unidadTITULO" name="unidadTITULO" placeholder="Titulo del Unidad">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </li>
                </ul>
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
                            <i class="material-icons mr-1">calendar_today</i><strong class="mr-1">Actualización: </strong>
                            {% if Unidad %}{{Unidad.unidadFCHACTUALIZACION}}{% else %}{{ "now"|date("Y-m-d h:i.s") }}{% endif %}
                        </span>
                        <span class="d-flex mb-2">
                            <i class="material-icons mr-1">score</i><strong class="mr-1">Responsable: </strong>
                            <span class="text-warning">{% if Unidad %}{{Unidad.personaNOMBRES}} {{Unidad.personaAPELLIDOS}}<br/><strong>{{Unidad.cargoTITULO}}</strong>{% else %}-{% endif %}</span>
                        </span>
                        <span class="d-flex mb-2">
                            <i class="material-icons mr-1">flag</i>
                            <strong class="mr-1">Estado: </strong>
                            {% if Unidad %}
                            {{Unidad.unidadESTADO}}
                            <a class="ml-auto" href="javascript:void(0);"
                               onclick="mostrarConfirmacionCambiarEstadoUnidad({{Unidad.unidadID}}, function(){ mostrarFormularioEditarUnidad({{Unidad.unidadID}}); });"><i class="fas fa-sync"></i></a>
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
                            <label for="opciones-responsable-unidad">Colaborador</label>
                            <select class="form-control custom-select" id="opciones-responsable-unidad" name="unidadRESPONSABLE" >
                                <option value="">Seleccione un CARGO antes</option>
                            </select>
                        </div>

                        {% if Unidad %}
                        <input type="hidden" name="unidadRESPONSABLE_ACTUAL" value="{{Unidad.unidadRESPONSABLE}}" />
                        {% endif %}


                    </li>
                </ul>
            </div>
        </div>
        
    </div>
</div>

