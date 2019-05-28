<div class="form-row pt-2">
  <div class="col mb-3">
    <h6 class="form-text m-0">Politicas y Documentación Interna</h6>
    <p class="form-text text-muted m-0">Seleccione a cual documentación tiene acceso el colaborador.</p>
  </div>
</div>
<div class="form-row pt-2">
    <div id="arbol_confidencialidad"></div>
</div>
<script type="text/javascript">
var arbol_confidencialidad;
$(document).ready(function () {
    arbol_confidencialidad = $('#arbol_confidencialidad').tree({
        primaryKey: 'id',
        uiLibrary: 'bootstrap4',
        dataSource:
        [
          {% for Proceso in Listados.Institucional %}
           {
              "id":"Proceso_{{Proceso.procesoID}}",
              "text":"{{Proceso.procesoTITULO}}",
              "children":[
                {% for Documento in Proceso.Documentos %}
                {
                    "id":{{Documento.documentoID}},
                    "value":{{Documento.documentoID}},
                    "text":"{{Documento.documentoNOMBRE}}",
                    "flagUrl":"{{Documento.documentoIMAGEN}}",
                    {% set seleccionado = 'false' %}
                    {% for Confidencial in UsuarioColaborador.Confidencialidad %}
                    {% if Confidencial.documentoID == Documento.documentoID %}
                    {% set seleccionado = 'true' %}
                    {% endif %}
                    {% endfor %}
                    "checked":{{seleccionado}},
                 },
                {% endfor %}
              ]
           },
          {% endfor %}
        ] ,
        checkboxes: true
    });
});
</script>