function agregarNuevoProcesoSoloTitulo( procesoTITULO, functionEXITO = function(){} ){
  ejecutarOperacion(
    'ProcesosAP', 'guardarSoloTitulo', 'procesoTITULO='+procesoTITULO,
    function(respuesta){ functionEXITO(respuesta); }
  );
}