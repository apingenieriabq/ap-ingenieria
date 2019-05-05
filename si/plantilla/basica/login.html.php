{% extends "basica/base.html.php" %}

{% block clase_contenedor %}icon-sidebar-nav h-100{% endblock %}
{% block clase_fila_contenedor %}h100{% endblock %}
{% block area_central %}
<main class="main-content col">
  <div class="main-content-container container-fluid px-4 my-auto h-100">
    <div class="row no-gutters h-100">
      <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
        <div class="card">
          <div class="card-body">
            <img class="auth-form__logo d-table mx-auto mb-3" style="max-width: 100%;" src="{{url_api}}{{logo}}" alt="AP Ingenieria" />
            <form id="frm-login-siapi" onsubmit=" return false;" >
              <div class="form-group">
                <label for="nombre_usuario">Cédula del Colaborador</label>
                <input type="text" class="form-control" id="nombre_usuario" name="cedulaDelColaborador" required  aria-describedby="emailHelp" placeholder="digite su cédula">
              </div>
              <div class="form-group">
                <label for="clave_usuario">Contraseña</label>
                <input type="password" class="form-control" id="clave_usuario" name="claveDelColaborador" required  placeholder="contraseña">
              </div>
              <div class="form-group mb-3 d-table mx-auto">
                <!--<div class="custom-control custom-checkbox mb-1">-->
                <!--  <input type="checkbox" class="custom-control-input" id="chk_recordardatos_inicio" value="SI" >-->
                <!--  <label class="custom-control-label" for="chk_recordardatos_inicio">Recordar mis datos de inicio.</label>-->
                <!--</div>-->
              </div>
              <button type="submit" class="btn btn-pill btn-accent d-table mx-auto">Ingresar al Sistema</button>
            </form>
          </div>
          <div class="card-footer border-top">
            <ul class="auth-form__social-icons d-table mx-auto">
              <li><a href="https://www.facebook.com/apingenieriasas/"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="https://twitter.com/apingenieria"><i class="fab fa-twitter"></i></a></li>
              <li><a href="https://www.linkedin.com/company/ap-ingenieria"><i class="fab fa-github"></i></a></li>
              <li><a href="https://www.instagram.com/apingenieria/"><i class="fab fa-google-plus-g"></i></a></li>
            </ul>
          </div>
        </div>
        <!--<div class="auth-form__meta d-flex mt-4">-->
        <!--  <a href="forgot-password.html">olvidaste tu contraseña?</a>-->
          <!--<a class="ml-auto" href="register.html">Create new account?</a>-->
        <!--</div>-->
      </div>
    </div>
  </div>
</main>
{% endblock %}


{% block area_sidebar_izquierda %}
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
  <div class="main-navbar">
    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
      <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
        <div class="d-table m-auto">
          <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 210px;" src="{{url_api}}{{logo}}" alt="AP Ingenieria">
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
      <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
    </div>
  </form>
  <div class="nav-wrapper">
    <h6 class="main-sidebar__nav-title">Sitios Web</h6>
    <ul class="nav nav--no-borders flex-column">
      <li class="nav-item">
        <a class="nav-link " href="https://www.apingenieria.com">
          <i class="material-icons">&#xE917;</i>
          <span>Portal Oficial</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="https://goo.gl/maps/pv4twdgqhN22">
          <i class="material-icons">&#xE8D1;</i>
          <span>Mapa de Ubicación</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="https://www.apingenieria.com/ap-blog/">
          <i class="material-icons">edit</i>
          <span>Blog</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="https://www.apingenieria.com/noticias/">
          <i class="material-icons">new_releases</i>
          <span>Noticias</span>
        </a>
      </li>
    </ul>
    <!--<h6 class="main-sidebar__nav-title">Dashboards</h6>-->
    <!--<ul class="nav nav--no-borders flex-column">-->
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link " href="index-2.html">-->
    <!--      <i class="material-icons">&#xE917;</i>-->
    <!--      <span>Analytics</span>-->
    <!--    </a>-->
    <!--  </li>-->
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link " href="ecommerce.html">-->
    <!--      <i class="material-icons">&#xE8D1;</i>-->
    <!--      <span>Online Store</span>-->
    <!--    </a>-->
    <!--  </li>-->
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link " href="blog-overview.html">-->
    <!--      <i class="material-icons">edit</i>-->
    <!--      <span>Personal Blog</span>-->
    <!--    </a>-->
    <!--  </li>-->
    <!--</ul>-->
    <!--<h6 class="main-sidebar__nav-title">Templates</h6>-->
    <!--<ul class="nav nav--no-borders flex-column">-->
    <!--  <li class="nav-item dropdown">-->
    <!--    <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">-->
    <!--      <i class="material-icons">&#xE7FD;</i>-->
    <!--      <span>User Account</span>-->
    <!--    </a>-->
    <!--    <div class="dropdown-menu dropdown-menu-small">-->
    <!--      <a class="dropdown-item " href="user-profile.html">User Profile</a>-->
    <!--      <a class="dropdown-item " href="user-profile-lite.html">User Profile Lite</a>-->
    <!--      <a class="dropdown-item " href="edit-user-profile.html">Edit User Profile</a>-->
    <!--      <a class="dropdown-item active" href="login.html">Login</a>-->
    <!--      <a class="dropdown-item " href="register.html">Register</a>-->
    <!--      <a class="dropdown-item " href="forgot-password.html">Forgot Password</a>-->
    <!--      <a class="dropdown-item " href="change-password.html">Change Password</a>-->
    <!--    </div>-->
    <!--  </li>-->
    <!--  <li class="nav-item dropdown">-->
    <!--    <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">-->
    <!--      <i class="material-icons">&#xE2C7;</i>-->
    <!--      <span>File Managers</span>-->
    <!--    </a>-->
    <!--    <div class="dropdown-menu dropdown-menu-small">-->
    <!--      <a class="dropdown-item " href="file-manager-list.html">Files - List View</a>-->
    <!--      <a class="dropdown-item " href="file-manager-cards.html">Files - Cards View</a>-->
    <!--    </div>-->
    <!--  </li>-->
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link " href="transaction-history.html">-->
    <!--      <i class="material-icons">&#xE889;</i>-->
    <!--      <span>Transaction History</span>-->
    <!--    </a>-->
    <!--  </li>-->
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link " href="calendar.html">-->
    <!--      <i class="material-icons">calendar_today</i>-->
    <!--      <span>Calendar</span>-->
    <!--    </a>-->
    <!--  </li>-->
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link " href="add-new-post.html">-->
    <!--      <i class="material-icons">note_add</i>-->
    <!--      <span>Add New Post</span>-->
    <!--    </a>-->
    <!--  </li>-->
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link " href="errors.html">-->
    <!--      <i class="material-icons">error</i>-->
    <!--      <span>Errors</span>-->
    <!--    </a>-->
    <!--  </li>-->
    <!--</ul>-->
    <!--<h6 class="main-sidebar__nav-title">Components</h6>-->
    <!--<ul class="nav nav--no-borders flex-column">-->
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link " href="components-overview.html">-->
    <!--      <i class="material-icons">view_module</i>-->
    <!--      <span>Overview</span>-->
    <!--    </a>-->
    <!--  </li>-->
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link " href="tables.html">-->
    <!--      <i class="material-icons">table_chart</i>-->
    <!--      <span>Tables</span>-->
    <!--    </a>-->
    <!--  </li>-->
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link " href="components-blog-posts.html">-->
    <!--      <i class="material-icons">vertical_split</i>-->
    <!--      <span>Blog Posts</span>-->
    <!--    </a>-->
    <!--  </li>-->
    <!--</ul>-->
    <!--<h6 class="main-sidebar__nav-title">Layouts</h6>-->
    <!--<ul class="nav nav--no-borders flex-column">-->
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link " href="header-navigation.html">-->
    <!--      <i class="material-icons">view_day</i>-->
    <!--      <span>Header Nav</span>-->
    <!--    </a>-->
    <!--  </li>-->
    <!--  <li class="nav-item">-->
    <!--    <a class="nav-link " href="icon-sidebar-nav.html">-->
    <!--      <i class="material-icons">&#xE251;</i>-->
    <!--      <span>Icon Sidebar</span>-->
    <!--    </a>-->
    <!--  </li>-->
    <!--</ul>-->
  </div>
</aside>
{% endblock %}


{% block archivos_script %}
<script src="js/modulos/login.js"></script>
{% endblock %}

{% block scripts_al_pie %}
<script type="text/javascript">
  $(document).ready(function(){
    $("#frm-login-siapi").submit(function(evt){
      iniciarSesionColaborador();
      evt.preventDefault();
    });

    // if( comerGalleta('RecordarDatosInicio') == 'SI' ){
    //   document.getElementById("chk_recordardatos_inicio").checked = true;
    //   // iniciarSesionColaboradorDatosNavegador();
    // }

  })
</script>
{% endblock %}