<!-- Page Header -->
<div class="page-header row no-gutters py-4">
    <div class="col">
        <span class="text-uppercase page-subtitle">Listados de Datos</span>
        <h3 class="page-title">Cargos de Colaboradores</h3>
    </div>
    <div class="col d-flex">
        <div class="btn-group btn-group-sm d-inline-flex ml-auto my-auto" role="group" aria-label="Table row actions">
        </div>
    </div>
</div>
<!-- End Page Header -->

<div class="row">

    <div class="col-lg-8 mb-4 py-0 px-0">
        <div class="card card-small country-stats">
            <div class="card-body p-0">
                <table id="tbl-listado-cargos-colaboradores" class="table m-0">
                    <thead class="bg-light">
                        <tr>
                            <th></th>
                            <th>Unidad/División</th>
                            <th>Tipo</th>
                            <th>Jefe</th>
                            <th>Código</th>
                            <th>Titulo</th>
                            <th scope="col" title="Estado" ><i class="material-icons">flag</i></th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for Cargo in Cargos%}
                        <tr>

                            <td scope="col" class="btn-operaciones-tablas" >
                                <div class="btn-group btn-group-sm btn-group-toggle " data-toggle="buttons">
                                    <button class="btn btn-xs btn-info" onclick="mostrarModalDetallesCargo({{Cargo.cargoID}});" ><i class="fas fa-eye"></i></button>
                                    <button class="btn  btn-xs btn-success" onclick="mostrarFormularioEditarCargo({{Cargo.cargoID}});" ><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-xs btn-danger" onclick="mostrarConfirmacionEliminarCargo({{Cargo.cargoID}}, abrirGestorCargosColaboradores);"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>                            

                            <td>{{Cargo.unidadTITULO}}</td>
                            <td>{{Cargo.tipoCargoTITULO}}</td>
                            <td>{{Cargo.Padre.cargoTITULO}}</td>
                            <td>{{Cargo.cargoCODIGO}}</td>
                            <td>{{Cargo.cargoTITULO}}</td>

                            <td scope="col">
                                {% if Cargo.cargoESTADO == 'ACTIVO' %}
                                <button onclick="mostrarConfirmacionCambiarEstadoCargo({{Cargo.cargoID}}, abrirGestorCargosColaboradores);" class="btn btn-xs btn-outline-java"><i class="fas fa-thumbs-up"></i></button>
                                {% elseif Cargo.cargoESTADO == 'INACTIVO' %}
                                <button onclick="mostrarConfirmacionCambiarEstadoCargo({{Cargo.cargoID}}, abrirGestorCargosColaboradores);" class="btn btn-xs btn-outline-salmon"><i class="fas fa-thumbs-down"></i></button>
                                {% elseif Cargo.cargoESTADO == 'PAPELERA' %}
                                <button onclick="mostrarConfirmacionRecuperarCargo({{Cargo.cargoID}}, abrirGestorCargosColaboradores);" class="btn btn-xs btn-outline-dark"><i class="fas fa-trash-alt"></i></button>
                                {% endif %}
                                <small style="font-size: 0px;">{{Cargo.cargoESTADO}}</small>

                            </td>                            

                        </tr>
                        {% endfor %}

                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
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
                                        <label for="unidadID">Unidad</label>
                                        <select id="unidadID" name="unidadID" class="form-control">
                                            <option selected="">Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="tipoCargoID">Tipo</label>
                                        <select id="tipoCargoID" name="tipoCargoID" class="form-control">
                                            <option selected="">Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="cargoPADRE">Cargo Jefe</label>
                                        <select id="cargoPADRE" name="cargoPADRE" class="form-control">
                                            <option selected="">Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="cargoCODIGO">Código</label>
                                        <input type="text" class="form-control mayusculas" id="cargoCODIGO" name="cargoCODIGO" placeholder="código sin espacios">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="cargoTITULO">Titulo</label>
                                        <input type="text" class="form-control tipoTitulo" id="cargoTITULO" name="cargoTITULO" placeholder="Titulo del Cargo">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Guardar <i class="fas fa-save" ></i></button>
                                <button type="reset" class="btn btn-primary">Limpiar</button>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {
    $('#tbl-listado-cargos-colaboradores').DataTable();
//    $("#botonera_sobreTablaAP.botonera").html(
//      '<button type="button" onclick="mostrarFormularioNuevoDocumentoAP();" class="btn btn-sm btn-accent btn-primary"><i class="material-icons">add</i> Nuevo </button>'
//      + '<button type="button" onclick="abrirGestorDocumentosAP();" class="btn btn-sm btn-gray"><i class="material-icons">refresh</i> Actualizar </button>'
//      );
    });
</script>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

