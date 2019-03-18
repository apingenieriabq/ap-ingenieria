<?php
class Personas extends ModeloDatos {
  public function __construct($personaID = null, $personaIDENTIFICACION = null) {
    if(!is_null($personaIDENTIFICACION)){
      parent::__construct('Personas', 'personaID');
      $this->datos(['tipoIdentificacionID' => $personaID, 'personaIDENTIFICACION' => $personaIDENTIFICACION]);
    }else{
      parent::__construct('Personas', 'personaID', $personaID);
    }
  }

  function crear($tipoIdentificacionID, $personaIDENTIFICACION, $personaNOMBRES,$personaAPELLIDOS,$personaEMAIL,$personaFCHNACIMIENTO, $personaSEXO, $personaTIPOSANGRE, $personaIMAGEN){
    return $this->personaID = $this->insertar([
      'tipoIdentificacionID' => $tipoIdentificacionID,
      'personaIDENTIFICACION' => $personaIDENTIFICACION,
      'personaRAZONSOCIAL' => $personaNOMBRES." ".$personaAPELLIDOS,
      'personaNOMBRES' => $personaNOMBRES,
      'personaAPELLIDOS' => $personaAPELLIDOS,
      'personaFCHNACIMIENTO' => $personaFCHNACIMIENTO,
      'personaSEXO' => $personaSEXO,
      'personaTIPOSANGRE' => $personaTIPOSANGRE,
      'personaEMAIL' => $personaEMAIL,
      'personaIMAGEN' => $personaIMAGEN
   ]);
  }

  function modificar($tipoIdentificacionID, $personaIDENTIFICACION, $personaNOMBRES,$personaAPELLIDOS,$personaEMAIL,$personaFCHNACIMIENTO, $personaSEXO, $personaTIPOSANGRE, $personaIMAGEN ){
    return $this->actualiza([
      'tipoIdentificacionID' => $tipoIdentificacionID,
      'personaIDENTIFICACION' => $personaIDENTIFICACION,
      'personaRAZONSOCIAL' => $personaNOMBRES." ".$personaAPELLIDOS,
      'personaNOMBRES' => $personaNOMBRES,
      'personaAPELLIDOS' => $personaAPELLIDOS,
      'personaFCHNACIMIENTO' => $personaFCHNACIMIENTO,
      'personaSEXO' => $personaSEXO,
      'personaTIPOSANGRE' => $personaTIPOSANGRE,
      'personaEMAIL' => $personaEMAIL,
      'personaIMAGEN' => $personaIMAGEN
      ] , ['personaID' => $this->personaID ]
    );
  }

}