<?php
if (!defined('CLAVE_SECRETA')) die('acceso no autorizado');
class ModeloDatos {

    var $nombreTabla;
    var $nombreCampoID;
    function porID($valorCampoID){
        return $this->datos([$this->nombreCampoID=> $valorCampoID]);
    }
    public function datos($donde = null){
        if(is_null($donde)){
            echo $valor = $this->nombreCampoID;
            $donde = [
                $this->nombreCampoID =>
                $valor
            ];
        }
         $datosRegistro = self::fila($donde);
         if(count($datosRegistro)){
            foreach($datosRegistro as $variable => $dato){
            //  echo $variable."  =  ".$dato. " <br />  ";
             $this->$variable = $dato;
         }
            return (object) $datosRegistro;
         }
         return null;

    }


    function consulta($sql, $donde = null){
        global $BD_AP_PRINCIPAL;
        return $BD_AP_PRINCIPAL->query($sql, $donde)->fetchAll();
    }
    function fila($donde = null, $columnas = '*' ){
        global $BD_AP_PRINCIPAL;
        return $BD_AP_PRINCIPAL->get($this->nombreTabla, $columnas, $donde);
    }
    function variasFilas($donde = null, $columnas = '*' ){
        global $BD_AP_PRINCIPAL;
        return $BD_AP_PRINCIPAL->select(self::$nombreTabla, $columnas, $donde);
    }


    function insertar($datos){
        global $BD_AP_PRINCIPAL;
        $BD_AP_PRINCIPAL->insert($this->nombreTabla, $datos);
        return $BD_AP_PRINCIPAL->id();
    }
    function actualizar($datos, $donde){
        global $BD_AP_PRINCIPAL;
        $datos = $BD_AP_PRINCIPAL->update($this->nombreTabla, $datos, $donde );
        return $datos->rowCount();
    }


}
