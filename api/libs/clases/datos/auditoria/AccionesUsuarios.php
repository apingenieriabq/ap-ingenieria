<?php

class AccionesUsuarios extends ModeloAuditoria {

   var $accionID;
   public function __construct($accionCOMPONENTE, $accionCONTROLADOR, $accionOPERACION)
   {
       self::$nombreTabla = 'AccionesUsuarios';
       $this->nuevo($operacionID = null, $accionCOMPONENTE, $accionCONTROLADOR, $accionOPERACION );
   }


  function nuevo( $operacionID, $accionCOMPONENTE, $accionCONTROLADOR, $accionOPERACION ){
      $this->accionID = self::insertar(array(
        'usuarioID' => Usuario::usuarioID(),
        'usuarioNOMBRE' => Usuario::usuarioNOMBRE(),
        'operacionID' => $operacionID,
        'accionIP' => Usuario::ip(),
        'accionCOMPONENTE' => $accionCOMPONENTE,
        'accionCONTROLADOR' => $accionCONTROLADOR,
        'accionOPERACION'  => $accionOPERACION
      ));
  }

  function respuesta( $accionRESPUESTA ){
      $registros = self::actualizar(array(
        'accionRESPUESTA' => $accionRESPUESTA,
      ), ['accionID' => $this->accionID]);
  }


}