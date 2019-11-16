<div class="page-header row no-gutters py-4">
    <div class="col">
        <span class="text-uppercase page-subtitle">Listados de Datos</span>
        <h3 class="page-title">Unidades, Divisiones o Áreas de la Empresa</h3>
    </div>
    <div class="col d-flex">
        <div class="btn-group btn-group-sm d-inline-flex ml-auto my-auto" role="group" aria-label="Table row actions">
            <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#divOrganigamaUnidades" aria-expanded="false" aria-controls="collapseExample">
                Mostrar /Ocultar Organigrama
            </button>
        </div>
    </div>
</div>

<div class="row">


    <div class="col-lg-12 mb-2 py-0 px-0">
        <div class="card card-small country-stats">
            <div class="card-body p-0">
                <table id="tbl-listado-unidads-colaboradores" class="table m-0">
                    <thead class="bg-light">
                        <tr>
                            <th></th>
                            <th>Tipo</th>
                            <th>Código</th>
                            <th>Titulo</th>
                            <!--<th>Responsable</th>-->
                            <th>Pertenece a</th>
                            <th scope="col" title="Estado" ><i class="material-icons">flag</i></th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for Unidad in Unidades%}
                        <tr>

                            <td scope="col" class="btn-operaciones-tablas" >
                                <div class="btn-group btn-group-sm btn-group-toggle " data-toggle="buttons">
                                    <button class="btn btn-xs btn-info" onclick="mostrarModalDetallesUnidad({{Unidad.unidadID}});" ><i class="fas fa-eye"></i></button>
                                    <button class="btn  btn-xs btn-success" onclick="mostrarFormularioEditarUnidad({{Unidad.unidadID}});" ><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-xs btn-danger" onclick="mostrarConfirmacionEliminarUnidad({{Unidad.unidadID}}, abrirGestorUnidadsColaboradores);"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>                            

                            <td>{{Unidad.unidadTIPO}}</td>
                            <td>{{Unidad.unidadCODIGO}}</td>
                            <td>{{Unidad.unidadTITULO}}</td>
                            <!--<td>{{Unidad.Colaborador.Persona.personaNOMBRES}}</td>-->
                            <td>{{Unidad.Padre.unidadTITULO}}</td>

                            <td scope="col">
                                {% if Unidad.unidadESTADO == 'ACTIVO' %}
                                <button onclick="mostrarConfirmacionCambiarEstadoUnidad({{Unidad.unidadID}}, abrirGestorUnidadsColaboradores);" class="btn btn-xs btn-outline-java"><i class="fas fa-thumbs-up"></i></button>
                                {% elseif Unidad.unidadESTADO == 'INACTIVO' %}
                                <button onclick="mostrarConfirmacionCambiarEstadoUnidad({{Unidad.unidadID}}, abrirGestorUnidadsColaboradores);" class="btn btn-xs btn-outline-salmon"><i class="fas fa-thumbs-down"></i></button>
                                {% elseif Unidad.unidadESTADO == 'PAPELERA' %}
                                <button onclick="mostrarConfirmacionRecuperarUnidad({{Unidad.unidadID}}, abrirGestorUnidadsColaboradores);" class="btn btn-xs btn-outline-dark"><i class="fas fa-trash-alt"></i></button>
                                {% endif %}
                                <small style="font-size: 0px;">{{Unidad.unidadESTADO}}</small>

                            </td>                            

                        </tr>
                        {% endfor %}

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    
    <div id="divOrganigamaUnidades" class="col-lg-12 mb-1  collapse show">
        <div class="card card-small">
            <div id="org-unidades"></div>    
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {
    var datosUnidades = [
    {% for Unidad in Unidades %}
        { id: {{Unidad.unidadID}}, parentId: {{Unidad.unidadPADRE}}, Name: "{{Unidad.unidadTITULO}}"},
    {% endfor %}
    ];
    var orgchart = new getOrgChart(document.getElementById("org-unidades"), {
    theme: "lena",
        expandToLevel: 10,
            enableEdit: false,
            enableGridView: false,
            enableExportToImage: true,
            enableDetailsView: false,
            enableSearch: false,
            enableEdit: false,
            enableZoom: true,
            enableMove: true,
            dataSource: datosUnidades
    });
    $('#tbl-listado-unidads-colaboradores').DataTable();
    $("#botonera_sobreTablaAP.botonera").html(
      '<button type="button" onclick="mostrarFormularioNuevoUnidadAP();" class="btn btn-sm btn-accent btn-primary"><i class="material-icons">add</i> Nuevo </button>'
      + '<button type="button" onclick="abrirGestorUnidades();" class="btn btn-sm btn-gray"><i class="material-icons">refresh</i> Actualizar </button>'
      );
    });
</script>