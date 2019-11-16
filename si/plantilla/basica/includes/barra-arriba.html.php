<div class="main-navbar sticky-top bg-white">
  <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
    <div action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
      <!--<div class="input-group input-group-seamless ml-3">-->
      <!--  <div class="input-group-prepend">-->
      <!--    <div class="input-group-text">-->
      <!--      <i class="fas fa-search"></i>-->
      <!--    </div>-->
      <!--  </div>-->
        <!--<input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">-->
      <!--</div>-->
    </div>
    <ul class="navbar-nav border-left flex-row ">
      <li class="nav-item border-right dropdown notifications">
        <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="nav-link-icon__wrapper">
            <i class="material-icons">&#xE7F4;</i>
            <span class="badge badge-pill badge-danger">2</span>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">
            <div class="notification__icon-wrapper">
              <div class="notification__icon">
                <i class="material-icons">&#xE6E1;</i>
              </div>
            </div>
            <div class="notification__content">
              <span class="notification__category">Legalización</span>
              <p>Tienes pendiente <span class="text-success text-semibold">4 Viaticos</span> por legalizar. Revisalos ahora!</p>
            </div>
          </a>
          <a class="dropdown-item" href="#">
            <div class="notification__icon-wrapper">
              <div class="notification__icon">
                <i class="material-icons">&#xE8D1;</i>
              </div>
            </div>
            <div class="notification__content">
              <span class="notification__category">Institucional</span>
              <p>Nueva publicacción titulada: <span class="text-danger text-semibold">docuemnto / procedimeinto/ politica</span>. Consultalo!</p>
            </div>
          </a>
          <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img class="user-avatar rounded-circle mr-2" src="{{Usuario.Colaborador.colaboradorFOTO}}" alt="User Avatar">
          <span class="d-none d-md-inline-block">{{Usuario.Colaborador.Persona.personaNOMBRES}} {{Usuario.Colaborador.Persona.personaAPELLIDOS}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-small">
          <a class="dropdown-item" href="javascript:void(0);" data-modulo="Perfil" data-operacion="delUsuario" onclick="abrirItemMenu(this);" ><i class="material-icons">&#xE7FD;</i> Perfil
          </a>
          <!--<a class="dropdown-item" href="edit-user-profile.html"><i class="material-icons">&#xE8B8;</i> Modificar</a>-->
          <a class="dropdown-item" href="javascript:void(0);" data-modulo="ListadoMaestroDocumento" data-operacion="mostrarNavegador" onclick="abrirItemMenu(this);" target="_self">
            <!--<i class="material-icons">&#xE917;</i>-->
            <i class="fa fa-folder-open"></i><span>Información Institucional</span>
          </a>
          <a class="dropdown-item" href="transaction-history.html"><i class="material-icons">&#xE896;</i> Acciones</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="cerrarSesionColaborador();" >
            <i class="material-icons text-danger">&#xE879;</i> Salir </a>
        </div>
      </li>
    </ul>
    <nav class="nav">
      <a href="#" class="nav-link nav-link-icon toggle-sidebar d-sm-inline d-md-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
        <i class="fas fa-bars"></i>
      </a>
    </nav>
  </nav>
</div>