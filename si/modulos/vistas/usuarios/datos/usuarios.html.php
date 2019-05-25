<div class='card card-small mb-3'>
  <div class="card-header border-bottom">
    <h6 class="m-0">Datos de Usuario</h6>
  </div>
  <div class='card-body p-0 mb-2'>

    <div class="form-row mx-4" >
      <h6 class="form-text m-0">Nombre de Usuario</h6>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">@</span>
        </div>
        <input type="text" class="form-control" id="usuarioNOMBRE" name="usuarioNOMBRE"
          placeholder="nombre_usuario" aria-label="Username" value="usuario{{random()}}" aria-describedby="basic-addon1">
      </div>
    </div>
    <div class="form-row mx-4">
      <div class="col mb-0">
        <h6 class="form-text m-0">Cambiar Contraseña</h6>
      </div>
    </div>
    <div class="form-row mx-4">
      <div class="form-group">
        <label for="usuarioCLAVE">Nueva Clave</label>
        <input type="text" class="form-control" id="usuarioCLAVE" name="usuarioCLAVE" placeholder="">
      </div>
      <div class="form-group ">
        <label for="usuarioCLAVE_REPETIR">Repita la clave</label>
        <input type="text" class="form-control" id="usuarioCLAVE_REPETIR" name="usuarioCLAVE_REPETIR" placeholder="">
      </div>
    </div>
    <hr />

    <div class="form-row mx-4">

      <label for="usuarioADMINISTRADOR" class="col col-form-label"> ¿Es Administrador? <small class="form-text text-muted"> Tiene permiso para ejecutar cualquier código.</small>
      </label>
      <div class="col d-flex">
        <div class="custom-control custom-toggle ml-auto my-auto">
          <input type="checkbox" id="usuarioADMINISTRADOR" name="usuarioADMINISTRADOR" class="custom-control-input" value="SI" >
          <label class="custom-control-label" for="usuarioADMINISTRADOR"></label>
        </div>
      </div>

    </div>

  </div>
</div>
