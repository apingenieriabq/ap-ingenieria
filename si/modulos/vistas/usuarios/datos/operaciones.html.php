<div class="container-fluid">
        <div class="row">
            <button id="btnSave" class="btn btn-default">Save Checked Nodes</button>
        </div>
        <div class="row">
            <div id="tree{{hash_vista}}"></div>
        </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    var tree = $('#tree{{hash_vista}}').tree({
        primaryKey: 'id',
        uiLibrary: 'bootstrap4',
        dataSource:
        [
          {% for Componente in Operaciones %}
           {
              "id":{{Componente.componenteID}},
              "text":"{{Componente.componenteTITULO}}",
              "flagUrl":"{{Componente.componenteMENUICONO}}",
              "checked":false,
              "hasChildren":false,
              "children":[
                {% for Operacion in Componente.Operaciones %}
                {
                    "id":{{Operacion.menuID}},
                    "text":"{{Operacion.menuTITULO}}",
                    "flagUrl":"{{Operacion.menuMENUICONO}}",
                    "checked":false,
                    "hasChildren":false,
                    "children":[
                      {% for SubOperacion in Operacion.SubOperaciones %}
                      {
                          "id":{{SubOperacion.menuID}},
                          "text":"{{SubOperacion.menuTITULO}}",
                          "flagUrl":"{{SubOperacion.menuMENUICONO}}",
                          "checked":false,
                          "hasChildren":false,
                          "children":[]
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