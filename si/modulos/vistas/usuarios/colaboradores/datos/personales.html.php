
<div class="form-row mx-4 pt-2">
  <div class="col-lg-12">
    <div class="form-row">

      <div class="form-group col-md-3">
        <label for="displayEmail">Tipo de ID</label>
        <select class="custom-select" name="tipoIdentificacionID">
          {% for TipoID in Listados.TiposIdentificacion %}
          <option {% if TipoID.tipoIdentificacionID == UsuarioColaborador.Persona.tipoIdentificacionID %}selected{% endif %} value="{{TipoID.tipoIdentificacionID}}" >{{TipoID.tipoIdentificacionCODIGO}} {{TipoID.tipoIdentificacionTITULO}}</option>
          {% endfor %}
        </select>
      </div>
      <div class="form-group col-md-5">
        <label for="firstName">Identificación</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-id-card"></i>
            </div>
          </div>
          <input type="text" class="form-control" id="personaIDENTIFICACION" name="personaIDENTIFICACION" value="{{UsuarioColaborador.Persona.personaIDENTIFICACION}}">
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="firstName">si tiene R.U.T o N.I.T</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fab fa-wpforms"></i>
            </div>
          </div>
          <input type="text" class="form-control" id="personaNIT" name="personaNIT"  value="{{UsuarioColaborador.Persona.personaNIT}}">
        </div>
      </div>

    </div>
    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="firstName">Nombres</label>
        <input type="text" class="form-control" id="personaNOMBRES" name="personaNOMBRES" value="{{UsuarioColaborador.Persona.personaNOMBRES}}">
      </div>
      <div class="form-group col-md-6">
        <label for="lastName">Apellidos</label>
        <input type="text" class="form-control" id="personaAPELLIDOS" name="personaAPELLIDOS" value="{{UsuarioColaborador.Persona.personaAPELLIDOS}}">
      </div>

    </div>

    <hr>
    <div class="form-row">
      <div class="col mb-3">
        <h6 class="form-text m-0">Contacto</h6>
        <p class="form-text text-muted m-0">Información de Ubicación y Contacto</p>
      </div>
    </div>

    <div class="form-row">

      <div class="form-group col-md-4">
        <label for="paisID">País</label>
        <select class="custom-select" id="paisID"  name="paisID" disabled >
          {% for Pais in Listados.Paises %}
          <option value="{{Pais.paisID}}" {% if Pais.paisID == 47 %}selected{% endif %} >{{Pais.paisCODIGOISO}} {{Pais.paisNOMBRE}}</option>
          {% endfor %}
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="departamentoID">Departamento </label>
        <select class="custom-select" id="departamentoID" name="departamentoID" >
          <option class="seleccione" value="" selected >Seleccione</option>
          {% for Departamento in Listados.Departamentos %}
          <option class="pais_{{Departamento.paisID}}" value="{{Departamento.departamentoID}}">{{Departamento.departamentoNOMBRE}} {{Departamento.departamentoCODIGO}}</option>
          {% endfor %}
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="personaMUNICIPIO">Ciudad</label>
        <select class="custom-select" id="personaMUNICIPIO" name="personaMUNICIPIO" >
          <option class="seleccione" value="" selected >Seleccione un departamento</option>
          {% for Municipio in Listados.Municipios %}
          <option {% if Municipio.municipioID == UsuarioColaborador.Persona.personaMUNICIPIO %}selected{% endif %} class="departamento_{{Municipio.departamentoID}}"  value="{{Municipio.municipioID}}">{{Municipio.municipioNOMBRE}} {{Municipio.municipioCODIGO}} </option>
          {% endfor %}
        </select>
      </div>
      <div class="form-group col-md-12">
        <label for="userLocation">Dirección</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">&#xE0C8;</i>
            </div>
          </div>
          <input type="text" class="form-control" id="personaDIRECCION" name="personaDIRECCION"  value="{{UsuarioColaborador.Persona.personaDIRECCION}}">
        </div>
      </div>

    </div>
    <div class="form-row">

      <div class="form-group col-md-3">
        <label for="phoneNumber">Teléfono Fijo</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">&#xE0CD;</i>
            </div>
          </div>
          <input type="tel" class="form-control" id="personaTELEFONO" name="personaTELEFONO" value="{{UsuarioColaborador.Persona.personaTELEFONO}}">
        </div>
      </div>
      <div class="form-group col-md-3">
        <label for="phoneNumber">Teléfono Movil</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">&#xE0CD;</i>
            </div>
          </div>
          <input type="tel" class="form-control" id="personaCELULAR" name="personaCELULAR" value="{{UsuarioColaborador.Persona.personaCELULAR}}">
        </div>
      </div>
      <div class="form-group col-md-6">
        <label for="emailAddress">Correo Personal</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">&#xE0BE;</i>
            </div>
          </div>
          <input type="email" class="form-control" id="personaEMAIL" name="personaEMAIL" value="{{UsuarioColaborador.Persona.personaEMAIL}}"  >
        </div>
      </div>

    </div>
  </div>
</div>


<script>
  "use strict";
  jQuery(document).ready(function(){

    $('#paisID').change(function () {
      actualizarListaDepartamentos($(this).val());
    });
    $('#departamentoID').change(function () {
      actualizarListaMunicipios($(this).val());
    });
    $('#departamentoID').change();

  });

  function actualizarListaDepartamentos(paisID){
    $('#departamentoID option').css('display','none');
    $('#departamentoID option.seleccione').css('display','block');
    $('#departamentoID option.pais_'+paisID).css('display','block');
  }
  function actualizarListaMunicipios(departamentoID){
    $('#personaMUNICIPIO option').css('display','none');
    $('#personaMUNICIPIO option.seleccione').css('display','block');
    $('#personaMUNICIPIO option.departamento_'+departamentoID).css('display','block');
  }

</script>