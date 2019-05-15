{% extends "basica/base.html.php" %}


{% block clase_contenedor %}{% endblock %}
{% block clase_fila_contenedor %}{% endblock %}
{% block area_central %}
<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
    {% include 'basica/includes/barra-arriba.html.php' %}
    <div id="contenido-vista" class="main-content-container container-fluid px-4"></div>
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
          <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 95%;" src="{{url_api}}{{logo}}" alt="AP Ingenieria" />
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
<link rel="stylesheet" href="plantilla/basica/scripts/cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css">
{% endblock %}



{% block archivos_script %}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
<script src="plantilla/basica/scripts/shards-dashboards.1.3.1.min.js"></script>
<!--<script src="plantilla/basica/scripts/app/app-analytics-overview.1.3.1.min.js"></script>-->
<script src="plantilla/basica/scripts/cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>

<script type="text/javascript" src="plantilla/basica/scripts/cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
<script type="text/javascript" src="plantilla/basica/scripts/app/app-file-manager.1.3.1.min.js"></script>


<script src="js/modulos/login.js"></script>
<script src="js/modulos/menu.js"></script>
<script src="js/modulos/institucional.js"></script>
{% endblock %}

{% block scripts_al_pie %}
<script type="text/javascript">
  $(document).ready(function(){
    // cargarMenuDelSistema();
  })
</script>
{% endblock %}