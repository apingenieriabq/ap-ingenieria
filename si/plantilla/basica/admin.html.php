{% extends "basica/base.html.php" %}


{% block clase_contenedor %}{% endblock %}
{% block clase_fila_contenedor %}{% endblock %}
{% block area_central %}
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
    {% include 'basica/includes/barra-arriba.html.php' %}
    <div id="contenido-vista" class="main-content-container container-fluid px-4">
    </div>
    <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
      <!--<ul class="nav">-->
      <!--  <li class="nav-item">-->
      <!--    <a class="nav-link" href="#">Home</a>-->
      <!--  </li>-->
      <!--  <li class="nav-item">-->
      <!--    <a class="nav-link" href="#">Services</a>-->
      <!--  </li>-->
      <!--  <li class="nav-item">-->
      <!--    <a class="nav-link" href="#">About</a>-->
      <!--  </li>-->
      <!--  <li class="nav-item">-->
      <!--    <a class="nav-link" href="#">Products</a>-->
      <!--  </li>-->
      <!--  <li class="nav-item">-->
      <!--    <a class="nav-link" href="#">Blog</a>-->
      <!--  </li>-->
      <!--</ul>-->
      <span class="copyright ml-auto my-auto mr-2">Derechos reservados © 2019 AP Ingenieria S.A.S.</span>
    </footer>
  </main>
{% endblock %}

{% block area_sidebar_izquierda %}
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
  <div class="main-navbar">
    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
      <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
        <div class="d-table m-auto">
          <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 95%;max-height: 32px;" src="{{url_api}}{{logo}}" alt="AP Ingenieria" />
        </div>
      </a>
      <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
        <i class="material-icons">&#xE5C4;</i>
      </a>
    </nav>
  </div>
  <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
    <div class="input-group input-group-seamless ml-3">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-search"></i>
        </div>
      </div>
      <input class="navbar-search form-control" type="text" placeholder="buscar en el menú..." aria-label="Buscar">
    </div>
  </form>
  <div class="nav-wrapper">
    <!--<div id="menu-del-usuario" ><button onclick="cargarMenuDelSistema();" >Recargar Menú</button></div>-->
    {% for Componente in Menu %}
    <h6 class="main-sidebar__nav-title" style="color:black;">
      <span class="badge badge-pill" style="color:black;"><i class="fa fa-minus-square"></i></span> {{Componente.componenteMENUTITULO}}
    </h6>
    <ul class="nav nav--no-borders flex-column">
      {% for ItemMenu in Componente.Operaciones %}

        {% if ItemMenu.SubOperaciones|length > 0 %}
        <li class="nav-item dropdown menu-lateral ">
          <a class="nav-link dropdown-toggle menu-lateral" href="javascript:void(0);"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
            <i class="{{ItemMenu.menuMENUICONO}}"></i>
            <span>{{ItemMenu.menuTITULO}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-small">
            {% for SubItemMenu in ItemMenu.SubOperaciones %}
            <a class="dropdown-item " href="javascript:void(0);" data-modulo="{{SubItemMenu.menuCONTROLADOR}}" data-operacion="{{SubItemMenu.menuOPERACION}}"
               onclick="abrirItemMenu(this);" target="_self" >{{SubItemMenu.menuTITULO}}</a>
            {% endfor %}
          </div>
        </li>
        {% else %}
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0);"  data-modulo="{{ItemMenu.menuCONTROLADOR}}" data-operacion="{{ItemMenu.menuOPERACION}}"
               onclick="abrirItemMenu(this);" target="_self">
            <!--<i class="material-icons">&#xE917;</i>-->
            <i class="{{ItemMenu.menuMENUICONO}}"></i>
            <span>{{ItemMenu.menuTITULO}}</span>
          </a>
        </li>
        {% endif %}


      {% endfor %}
    </ul>
    {% endfor %}
  </div>
</aside>
{% endblock %}

{% block debajo_contenedor %}
<div id="modales"></div>
{% endblock %}


{% block archivo_cabeza %}
<!--<link rel="stylesheet" type="text/css" href="plantilla/basica/scripts/cdn.datatables.net/1.10.16/css/jquery.dataTables.css">-->
<link rel="stylesheet" type="text/css" href="plantilla/basica/scripts/cdn.datatables.net/1.10.18/DataTables-1.10.18/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="plantilla/basica/scripts/cdn.datatables.net/1.10.18/AutoFill-2.3.3/css/autoFill.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="plantilla/basica/scripts/cdn.datatables.net/1.10.18/Buttons-1.5.6/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="plantilla/basica/scripts/cdn.datatables.net/1.10.18/FixedColumns-3.2.5/css/fixedColumns.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="plantilla/basica/scripts/cdn.datatables.net/1.10.18/FixedHeader-3.1.4/css/fixedHeader.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="plantilla/basica/scripts/cdn.datatables.net/1.10.18/Responsive-2.2.2/css/responsive.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="plantilla/basica/scripts/cdn.datatables.net/1.10.18/RowGroup-1.1.0/css/rowGroup.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="plantilla/basica/scripts/cdn.datatables.net/1.10.18/RowReorder-1.2.4/css/rowReorder.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="plantilla/basica/scripts/cdn.datatables.net/1.10.18/Scroller-2.0.0/css/scroller.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="plantilla/basica/scripts/cdn.datatables.net/1.10.18/Select-1.3.0/css/select.dataTables.min.css"/>


<link rel="stylesheet" type="text/css" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css"/>

<link rel="stylesheet" href="plantilla/basica/scripts/cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css">
<link rel="stylesheet" href="plantilla/basica/scripts/cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.css">
{% endblock %}



{% block archivos_script %}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
<script src="plantilla/basica/scripts/shards-dashboards.1.3.1.min.js"></script>
<!--<script src="plantilla/basica/scripts/app/app-analytics-overview.1.3.1.min.js"></script>-->
<script src="plantilla/basica/scripts/cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>

<!--<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->

<script type="text/javascript" src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" ></script>

<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/AutoFill-2.3.3/js/dataTables.autoFill.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/Buttons-1.5.6/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/Buttons-1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/Buttons-1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/Buttons-1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/FixedColumns-3.2.5/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/FixedHeader-3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/RowGroup-1.1.0/js/dataTables.rowGroup.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/RowReorder-1.2.4/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/Scroller-2.0.0/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.18/Select-1.3.0/js/dataTables.select.min.js"></script>






<script type="text/javascript" src="plantilla/basica/scripts/cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
<!--<script type="text/javascript" src="plantilla/basica/scripts/app/app-file-manager.1.3.1.min.js"></script>-->

<script src="js/configs.js"></script>


<script src="modulos/js/login.js"></script>
<script src="modulos/js/menu.js"></script>
<script src="modulos/js/institucional.js"></script>
<script src="modulos/js/procesos.js"></script>
<script src="modulos/js/colaboradores.js"></script>
{% endblock %}

{% block scripts_al_pie %}
<script type="text/javascript">
  $(document).ready(function(){
    // cargarMenuDelSistema();
  })
</script>
<div id="area-modales"></div>
{% endblock %}