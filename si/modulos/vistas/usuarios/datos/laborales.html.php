<div class="form-row pt-2">
  <div class="col-lg-8">

    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="displayEmail">Cargo</label>
        <select class="custom-select">
          <option value="1" selected>Yes, display my email</option>
          <option value="2">No, do not display my email.</option>
        </select>
      </div>

      <div class="form-group col-md-8">
        <label for="displayEmail">Vinculación</label>
        {% for TipoColaborador in TiposColaboradores %}
        <div class="custom-control custom-radio mb-1">
          <input type="radio" id="proceso{{Proceso.procesoID}}" class="custom-control-input"
            name="procesoID" value="{{Proceso.procesoID}}" required {% if DocumentoAP and DocumentoAP.procesoID ==  Proceso.procesoID %}checked{% endif %}  >
          <label class="custom-control-label" for="proceso{{Proceso.procesoID}}">{{Proceso.procesoTITULO}}</label>
        </div>
        {% endfor %}
      </div>

      <div class="form-group col-md-4">
        <label for="phoneNumber">Fecha de Vinculación</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">&#xE0CD;</i>
            </div>
          </div>
          <input type="text" class="form-control" id="phoneNumber" value="+40 1234 567 890">
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="emailAddress">Correo Corporativo</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">&#xE0BE;</i>
            </div>
          </div>
          <input type="email" class="form-control" id="emailAddress">
        </div>
      </div>

      <div class="form-group col-md-4">
        <label for="phoneNumber">Teléfono Corporativo</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">&#xE0CD;</i>
            </div>
          </div>
          <input type="text" class="form-control" id="phoneNumber" value="+40 1234 567 890">
        </div>
      </div>
    </div>

  </div>
  <div class="col-lg-4">
    <label for="userProfilePicture" class="text-center w-100 mb-4">Profile Picture</label>
    <div class="edit-user-details__avatar m-auto">
      <img src="images/avatars/0.jpg" alt="User Avatar">
      <label class="edit-user-details__avatar__change">
        <i class="material-icons mr-1">&#xE439;</i>
        <input type="file" id="userProfilePicture" class="d-none">
      </label>
    </div>
    <button class="btn btn-sm btn-white d-table mx-auto mt-4"><i class="material-icons">&#xE2C3;</i> Upload Image</button>
  </div>
</div>
<hr />
<div class="form-row">
  <div class="col mb-3">
    <h6 class="form-text m-0">Jefes o Supervisores</h6>
    <p class="form-text text-muted m-0">Elija quien debe autorizar las solicitudes.</p>
  </div>
</div>
<div class="form-row">

  <div class="form-group col-md-12">
    <label for="displayEmail">Jefe Inmediato</label>
    <select class="custom-select">
    {% for Colaborador in Colaboradores %}

    {% endfor %}
    </select>
  </div>

  <div class="form-group col-md-12">
    <label for="displayEmail">Aprobador</label>
    <select class="custom-select">
    {% for Colaborador in Colaboradores %}

    {% endfor %}
    </select>
  </div>

</div>
