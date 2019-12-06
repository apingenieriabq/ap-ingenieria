<div class="page-header row no-gutters py-4">
    <div class="col  text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Configuración</span>
        <h3 class="page-title">Consecutivos <small>[Solicitudes y documentos]</small></h3>
    </div>
    <div class="col d-flex">
       
    </div>    
</div>

<div class="container-fluid"  >
    <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;border-color:#aaa;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#fff;background-color:#f38630;}
    .tg .tg-0lax{text-align:left;vertical-align:top}
    </style>
    <table class="tg">
        <thead>
      <tr>
        <th class="tg-0lax">CODIGO</th>
        <th class="tg-0lax">TITULO</th>
        <th class="tg-0lax">PREFIJO</th>
        <th class="tg-0lax">RELLENO</th>
        <th class="tg-0lax">ACTUAL</th>
        <th class="tg-0lax"></th>
      </tr>
      </thead>
      <tbody>
          {% for Consecutivo in Consecutivos %}
      <tr>
        <td class="tg-0lax">{{Consecutivo.consecutivoCODIGO}}</td>
        <td class="tg-0lax">{{Consecutivo.consecutivoTITULO}}</td>
        <td class="tg-0lax">{{Consecutivo.consecutivoPREFIJO}}</td>
        <td class="tg-0lax">{{Consecutivo.consecutivoRELLENO}}</td>
        <td class="tg-0lax">
            <input type="text" id="consecutivoACTUAL_{{Consecutivo.consecutivoID}}" name="consecutivoACTUAL" value="{{Consecutivo.consecutivoACTUAL}}" />
        </td>
        <td class="tg-0lax">
            <button onclick="guardarConsecutivoActualNuevo({{Consecutivo.consecutivoID}});" >gaurdar</button>
        </td>
      </tr>
      
{% endfor %}
</tbody>
    </table>

</div>


<script type="text/javascript">
    function guardarConsecutivoActualNuevo(consecutivoID){
        
        var nuevoValorActual = $("#consecutivoACTUAL_"+consecutivoID).val();
        
        ejecutarOperacion(
            'Consecutivos', 'actualizarActualConsecutivo',  
            "consecutivoID="+consecutivoID+"&consecutivoACTUAL=" + nuevoValorActual, 
            function(datos){
                 
                alertaExito( "SE ah actualizado correctamente el número actual para el consecutivo <b>" +
                 datos.consecutivoTITULO + "</b> con código " + datos.consecutivoCODIGO)
                
            }
        ); 
        
        
    }
</script>