<div class="page-header row no-gutters py-4">
    <div class="col  text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Directorios</span>
        <h3 class="page-title">Colaboradores <small>[empleados y contratistas]</small></h3>
    </div>
    <div class="col d-flex">
        <div class="btn-group btn-group-sm d-inline-flex ml-auto my-auto" role="group" aria-label="Table row actions">

            <form id="frm-buscarDirectorioColaboradores" class="main-navbar__search d-none d-md-flex d-lg-flex" onsubmit="return false;">
                <div class="input-group input-group-seamless" >
                    <input class="navbar-search form-control" type="text" placeholder="cedula o  nombre..." name="palabras_buscar" aria-label="Search" style="width: 210px;">
                    <div class="input-group-append">
                        <button class="btn btn-white" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

        </div>
    </div>    
</div>
<div class="container-fluid"  >
    <div id="directorio-colaboradores" class="row">
        <div >
            <div class="col-12  d-flex align-items-center">

                <nav aria-label="" class="m-auto">
                    <ul class="pagination pagination-sm btn-group">
                        <li class="page-item">
                            <a class=" page-link" href="javascript:void(0);" target="_self" onclick="anteriorPaginaDirectorioColaboradores();">Anterior</a>
                        </li>
                        {% if Directorio.Navegador > 0 %}
                        {% for i in range(0, Directorio.Navegador - 1) %}
                        <li class="page-item {% if i == Directorio.PaginaActual %}active{% endif %}">
                            <a class=" page-link" href="javascript:void(0);" target="_self" onclick="cambiarPaginaDirectorioColaboradores({{i}});">{{i+1}}</a>
                        </li>
                        {% endfor %}
                        {% endif %}
                        <li class="page-item">
                            <a class=" page-link" href="javascript:void(0);" target="_self" onclick="siguientePaginaDirectorioColaboradores();">Siguiente</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
        {% include 'directorios/colaboradores/lista-horizontal.html.php' %}
    </div>
</div>

<script type="text/javascript" >
    $(document).ready(function(){
        $("#frm-buscarDirectorioColaboradores").submit(function(){
            cargarDivision('directorio-colaboradores', 
             'Directorios', 'buscarColaboradores', $(this).serialize(),
            function(resp){
                
            });                        
        });
    });
    var pagina = {{Directorio.PaginaActual}};
    var paginasTotales = {{Directorio.Navegador - 1}};
    function siguientePaginaDirectorioColaboradores(){
    var sigPagina = (pagina + 1);
    if (paginasTotales >= sigPagina){
    cambiarPaginaDirectorioColaboradores(sigPagina);
    }
    }
    function anteriorPaginaDirectorioColaboradores(){
    var antPagina = (pagina - 1);
    if (antPagina >= 0){
    cambiarPaginaDirectorioColaboradores(antPagina);
    }
    }
    function cambiarPaginaDirectorioColaboradores(pagina){
    if (pagina >= 0 && pagina <= paginasTotales){
    cargarVista('Directorios', 'cambiarPaginaColaboradores', 'pagina=' + pagina);
    }
    }
    function mostrarModalDatosContactoColaborador(colaboradorID) {
    cargarModal('Datos de Contacto', 'Directorios', 'mostrarDatosContactoColaboradorEnModal', 'colaboradorID=' + colaboradorID, function(respuesta) {});
    }
</script>