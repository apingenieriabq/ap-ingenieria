
<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
    <span class="text-uppercase page-subtitle">Seguridad</span>
    <h3 class="page-title">Perfil de Usuario</h3>
  </div>
</div>
<div class="row">
  <div class="col-lg-4">
    <div class="card card-small mb-4 pt-3">
      <div class="card-header border-bottom text-center">
        <div class="mb-3 mx-auto">
          <img class="rounded-circle" src="{{DatosUsuario.Colaborador.Persona.personaIMAGEN}}" alt="User Avatar" width="110"> </div>
        <h4 class="mb-0">{{DatosUsuario.Colaborador.Persona.personaNOMBRES}} {{DatosUsuario.Colaborador.Persona.personaAPELLIDOS}}</h4>
        <p class="text-center text-light m-0 mb-2">Soy {{DatosUsuario.Colaborador.Cargo.cargoTITULO}}.</p>
        <span class="text-muted d-block mb-2">Mi jefe inmediato es {{DatosUsuario.Colaborador.JefeInmediato.Persona.personaNOMBRES}} {{DatosUsuario.Colaborador.JefeInmediato.Persona.personaAPELLIDOS}}</span>
      </div>
      <ul class="list-group list-group-flush">
        <!--<li class="list-group-item px-4">-->
        <!--  <div class="progress-wrapper">-->
        <!--    <strong class="text-muted d-block mb-2">Carga Laboral</strong>-->
        <!--    <div class="progress progress-sm">-->
        <!--      <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">-->
        <!--        <span class="progress-value">74%</span>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</li>-->
        <li class="list-group-item p-2" >
            <div class="row mb-1">
              <div class="col">
                <strong>Tipo de Vinculación</strong>
                <span>{{DatosUsuario.Colaborador.TipoColaborador.tipoColaboradorTITULO}}</span>
              </div>
            </div>
            <div class="row mb-1">
              <div class="col">
                <strong>Correo Corporativo</strong>
                <span>{{DatosUsuario.Colaborador.colaboradorEMAIL}}</span>
              </div>
            </div>
            <div class="row mb-1">
              <div class="col w-50">
                <strong>Teléfono</strong>
                <span>{{DatosUsuario.Colaborador.Persona.personaTELEFONO}}</span>
              </div>
              <div class="col w-50">
                <strong>Celular</strong>
                <span>{{DatosUsuario.Colaborador.Persona.personaCELULAR}}</span>
              </div>
            </div>
            <div class="row mb-1">
              <div class="col">
                <span>Nombre de Usuario</span>
                <span>{{DatosUsuario.usuarioNOMBRE}}</span>
              </div>
            </div>
          <!--<div class="user-details__tags p-4">-->
          <!--  <span class="badge badge-pill badge-light text-light text-uppercase mb-2 border">User Experience</span>-->
          <!--  <span class="badge badge-pill badge-light text-light text-uppercase mb-2 border">UI Design</span>-->
          <!--  <span class="badge badge-pill badge-light text-light text-uppercase mb-2 border">React JS</span>-->
          <!--  <span class="badge badge-pill badge-light text-light text-uppercase mb-2 border">HTML & CSS</span>-->
          <!--  <span class="badge badge-pill badge-light text-light text-uppercase mb-2 border">JavaScript</span>-->
          <!--  <span class="badge badge-pill badge-light text-light text-uppercase mb-2 border">Bootstrap 4</span>-->
          <!--</div>-->
        </li>
        <li class="list-group-item p-2">
          <strong class="text-muted d-block mb-2">Firma para Documentos Electrónicos</strong>
          <span><img src="{{DatosUsuario.Colaborador.colaboradorFIRMA}}" class="img img-thumbnail" /></span>
        </li>
        <!--<li class="list-group-item p-4">-->
        <!--  <strong class="text-muted d-block mb-2">Description</strong>-->
        <!--  <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?</span>-->
        <!--</li>-->
      </ul>
    </div>
  </div>
  <div class="col-lg-8">

    <div class="card card-small user-stats mb-1">
      <div class="card-body">
        <div class="row">
          <div class="col-6 col-sm-3 text-center">
            <h4 class="m-0">4</h4>
            <span class="text-light text-uppercase">Viajes</span>
          </div>
          <div class="col-6 col-sm-3 text-center">
            <h4 class="m-0">3</h4>
            <span class="text-light text-uppercase">Permisos</span>
          </div>
          <div class="col-6 col-sm-3 text-center">
            <h4 class="m-0">1128</h4>
            <span class="text-light text-uppercase">Tareas Pendientes</span>
          </div>
          <div class="col-6 col-sm-3 text-center">
            <h4 class="m-0">72.4%</h4>
            <span class="text-light text-uppercase">Completadas</span>
          </div>
        </div>
      </div>
    </div>

    <div class="card card-small mb-4">
      <div class="card-header border-bottom">
        <h6 class="m-0">Datos Personales</h6>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item p-3">
          <div class="row">
            <div class="col">
              <form id="frm-actualirPerfilUsuarioEnSesion" onsubmit="return false;">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="personaNOMBRES">Nombres</label>
                    <input type="text" class="form-control" id="personaNOMBRES" name="personaNOMBRES" placeholder="Tus Nombres" value="{{DatosUsuario.Colaborador.Persona.personaNOMBRES}}"> </div>
                  <div class="form-group col-md-6">
                    <label for="personaAPELLIDOS">Apellidos</label>
                    <input type="text" class="form-control" id="personaAPELLIDOS" name="personaAPELLIDOS" placeholder="Tus Apellidos" value="{{DatosUsuario.Colaborador.Persona.personaAPELLIDOS}}"> </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="personaEMAIL">Correo Personal</label>
                    <input type="email" class="form-control" id="personaEMAIL" name="personaEMAIL" placeholder="Email" value="{{DatosUsuario.Colaborador.Persona.personaEMAIL}}"> </div>
                  <div class="form-group col-md-6">
                    <label for="usuarioCLAVE">Clave Nueva</label>
                    <input type="password" class="form-control" id="usuarioCLAVE" name="usuarioCLAVE" placeholder=""> </div>
                </div>
                <div class="form-group">
                  <label for="personaDIRECCION">Dirección</label>
                  <input type="text" class="form-control" id="personaDIRECCION" name="personaDIRECCION" placeholder="Tu dirección de Residencia" value="{{DatosUsuario.Colaborador.Persona.personaDIRECCION}}">
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
                      <option {% if Municipio.municipioID == Usuario.Colaborador.Persona.personaMUNICIPIO %}selected{% endif %} class="departamento_{{Municipio.departamentoID}}"  value="{{Municipio.municipioID}}">{{Municipio.municipioNOMBRE}} {{Municipio.municipioCODIGO}} </option>
                      {% endfor %}
                    </select>
                  </div>
                </div>
                <!--<div class="form-row">-->
                <!--  <div class="form-group col-md-12">-->
                <!--    <label for="feDescription">Description</label>-->
                <!--    <textarea class="form-control" name="feDescription" rows="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi cumque?</textarea>-->
                <!--  </div>-->
                <!--</div>-->
                <input type="hidden" name="personaID" value="{{DatosUsuario.Colaborador.Persona.personaID}}"/>
                <button type="submit" class="btn btn-accent">Actualizar datos personales</button>
              </form>
            </div>
          </div>
        </li>
      </ul>
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

    $("#frm-actualirPerfilUsuarioEnSesion").submit(function(){
       if(usuarioCLAVE.value != "" ){
        if(!confirm('¿Segur@ que desea cambiar la clave para ingresar al sistema?') ){
          return false;
        }
      }

      var Formulario = crearFormData("frm-actualirPerfilUsuarioEnSesion");
      ejecutarOperacionFormData(
        'Perfil', 'actualizarDatosPersonales', Formulario ,
        function(Colaborador){
          bloquearPantalla();
          console.log(Colaborador);
          alert('Para ver reflejado los cambios, debe salir del sistema y volver a ingresar.');
        }
      );
    });

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