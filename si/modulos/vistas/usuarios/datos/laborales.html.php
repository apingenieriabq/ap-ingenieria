<div class="form-row pt-2">
  <div class="col-lg-8">
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="cargoID">Cargo</label>
        <select class="custom-select" name="cargoID" id="cargoID" required >
          <option value="" selected >Seleccione</option>
          {% for Cargo in Listados.Cargos %}
          <option value="{{Cargo.cargoID}}">{{Cargo.cargoTITULO}}</option>
          {% endfor %}
        </select>
      </div>
      <div class="form-group col-md-12">
        <label for="tipoColaboradorID">Vinculación</label>
        {% for TipoColaborador in Listados.TiposColaboradores %}
        <div class="custom-control custom-radio mb-1">
          <input type="radio" id="TipoColaborador{{TipoColaborador.tipoColaboradorID}}" class="custom-control-input"
            name="tipoColaboradorID" value="{{TipoColaborador.tipoColaboradorID}}" required {% if UsuarioColaborador and UsuarioColaborador.tipoColaboradorID ==  TipoColaborador.tipoColaboradorID %}checked{% endif %}  >
          <label class="custom-control-label" for="TipoColaborador{{TipoColaborador.tipoColaboradorID}}">{{TipoColaborador.tipoColaboradorTITULO}}</label>
        </div>
        {% endfor %}
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <label for="img_colaboradorFOTO" class="text-center w-100 mb-4">Foto del Colaborador</label>
    <div class="edit-user-details__avatar m-auto">
      <img id="img_colaboradorFOTO" src="images/usuario-invitado.jpg" alt="User Avatar">
      <label class="edit-user-details__avatar__change">
        <i class="material-icons mr-1">&#xE439;</i>
        <input type="file" id="colaboradorFOTO" name="colaboradorFOTO" class="d-none">
    <input type="hidden" id="colaboradorFOTO_RUTA"  name="colaboradorFOTO_RUTA" value=""/>
      </label>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="form-row">
      <div class="form-group col-md-5">
        <label for="colaboradorFCHINGRESO">Fecha de Vinculación</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-calendar"></i>
            </div>
          </div>
          <input type="date" class="form-control" id="colaboradorFCHINGRESO" name="colaboradorFCHINGRESO" value="">
        </div>
      </div>
      <div class="form-group col-md-7">
        <label for="colaboradorCELULAR">Teléfono Corporativo</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">&#xE0CD;</i>
            </div>
          </div>
          <input type="tel" class="form-control" id="colaboradorCELULAR" name="colaboradorCELULAR" value="" >
        </div>
      </div>
      <div class="form-group col-md-12">
        <label for="colaboradorEMAIL">Correo Corporativo</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">&#xE0BE;</i>
            </div>
          </div>
          <input type="email" class="form-control" id="colaboradorEMAIL" name="colaboradorEMAIL">
        </div>
      </div>
    </div>
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
    <label for="colaboradorJEFEINMEDIATO">Jefe Inmediato</label>
    <select class="custom-select" id="colaboradorJEFEINMEDIATO" name="colaboradorJEFEINMEDIATO" >
      <option value="" selected >Seleccione</option>
    {% for Colaborador in Listados.Colaboradores %}>
      <option value="{{Colaborador.colaboradorID}}">{{Colaborador.Persona.personaNOMBRES}} {{Colaborador.Persona.personaAPELLIDOS}} - {{Colaborador.Persona.personaIDENTIFICACION}}</option>
    {% endfor %}
    </select>
  </div>
  <div class="form-group col-md-12">
    <label for="colaboradorAPROBADOR">Aprobador</label>
    <select class="custom-select" id="colaboradorAPROBADOR" name="colaboradorAPROBADOR" >
      <option value="" selected >Seleccione</option>
    {% for Colaborador in Listados.Colaboradores %}>
      <option value="{{Colaborador.colaboradorID}}">{{Colaborador.Persona.personaNOMBRES}} {{Colaborador.Persona.personaAPELLIDOS}} - {{Colaborador.Persona.personaIDENTIFICACION}}</option>
    {% endfor %}
    </select>
  </div>
</div>
<hr />
<div class="form-row">
  <div class="col mb-3">
    <h6 class="form-text m-0">Firma Manuscrita Digitalizada</h6>
    <p class="form-text text-muted m-0">Necesario para gestión de documentos electrónicos.</p>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-12">
    <div id="cargarFirmaColaborador" class="dropzone"></div>
    <input type="hidden" id="colaboradorFIRMA_RUTA"  name="colaboradorFIRMA_RUTA" value=""/>
  </div>
</div>

<script type="text/javascript" >
  "use strict";
  var myDropzone;
  jQuery(document).ready(function(){
    myDropzone = new Dropzone("div#cargarFirmaColaborador", {
      paramName: "colaboradorFIRMA",
      params: {
        modulo: "Usuarios",
        operacion: "recibirFirmaColaborador",
      },
      maxFilesize: 1,
      acceptedFiles: 'image/*',
    });

    myDropzone.on("sending", function(file, done) { bloquearPantalla(); });
    myDropzone.on("complete", function(file, done) { desbloquearPantalla(); });

    myDropzone.on("success", function(file, done) {
      controlRespuesta(done,
        function(ruta){
          $("#colaboradorFIRMA_RUTA").val( ruta );
        }
      );
    });



$('#colaboradorFOTO').on('change', function () {

  bloquearPantalla();

  var files = $(this).get(0).files;
  if (files.length > 0) {
    //
    // crear un objeto FormData que se enviará como la carga de datos en la
    // solicitud AJAX
    var formData = new FormData();
    // recorrer todos los archivos seleccionados y agregarlos al objeto formData
    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      //agregue los archivos al objeto formData para la carga de datos
      formData.append('colaboradorFOTO', file, file.name);
    }

    ejecutarOperacionArchivo('Usuarios','recibirFotoColaborador', formData, function(ruta){
      bloquearPantalla();
      $("#img_colaboradorFOTO").attr('src', ruta );
      $("#colaboradorFOTO_RUTA").val( ruta );
      desbloquearPantalla();
    });

    //Peticion ajax
    // $.ajax({
    //   url: 'index.php',
    //   type: 'POST',
    //   data: formData,
    //   processData: false,
    //   contentType: false,
    //   xhrprocessData:false,
    //   beforeSend : function(){

    //   },
    //   success: function(data){
    //   console.log(data);
    //   var datos = JSON.parse(data);
    //   $("#img_colaboradorFOTO").attr('src', datos.DATOS );
    //   $("#colaboradorFOTO_RUTA").val( datos.DATOS );
    //   },
    // }).done(function (data) {
    //   desbloquearPantalla();
    // });
  }


});






  });

  function cargarFotoColaborador(){


  }

</script>