<div class="form-row">
  <div class="col mb-3">
    <h6 class="form-text m-0">Permisos para el SIAPI.</h6>
    <p class="form-text text-muted m-0">Seleccione las operación que puede realizar el usuario sobre el sistema.</p>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
      <div id="tree{{hash_vista}}"></div>
  </div>
</div>
<script type="text/javascript">
var arbol_permisos;
$(document).ready(function () {
    arbol_permisos = $('#tree{{hash_vista}}').tree({
        primaryKey: 'id',
        uiLibrary: 'bootstrap4',
        dataSource:
        [
          {% for Componente in Listados.Permisos %}
           {
              "id": 'Componente_{{Componente.componenteID}}',
              "text":"{{Componente.componenteTITULO}}",
              "flagUrl":"{{Componente.componenteMENUICONO}}",
              "children":[
                {% for Operacion in Componente.Operaciones %}
                {
                    "id":{{Operacion.menuID}},
                    "text":"{{Operacion.menuTITULO}}",
                    "flagUrl":"{{Operacion.menuMENUICONO}}",
                    {% set seleccionado = 'false' %}
                    {% for Menu in UsuarioColaborador.Menus %}
                    {% if Menu.menuID == Operacion.menuID %}
                    {% set seleccionado = 'true' %}
                    {% endif %}
                    {% endfor %}
                    "checked":{{seleccionado}},
                    "children":[
                      {% for SubOperacion in Operacion.SubOperaciones %}
                      {
                          "id":{{SubOperacion.menuID}},
                          "text":"{{SubOperacion.menuTITULO}}",
                          "flagUrl":"{{SubOperacion.menuMENUICONO}}",
                          {% set seleccionado = 'false' %}
                          {% for Menu in UsuarioColaborador.Menus %}
                          {% if Menu.menuID == SubOperacion.menuID %}
                          {% set seleccionado = 'true' %}
                          {% endif %}
                          {% endfor %}
                          "checked":{{seleccionado}},
                       },
                      {% endfor %}
                    ]
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