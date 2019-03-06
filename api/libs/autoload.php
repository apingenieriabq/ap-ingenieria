<?php
class AutoCargaClases
{
    public static function start()
    {
        spl_autoload_register('AutoCargaClases::cargarClasesSistema');
        spl_autoload_register('AutoCargaClases::cargarClasesUtilidades');
        spl_autoload_register('AutoCargaClases::cargarClasesModelos');
        //self::cargarModelos(DIR_MODELOS);
        //self::cargarModelos(DIR_LIBRERIA . 'clases/');
    }

    private static function cargarClasesSistema(){
        self::cargarModelos(DIR_LIBRERIA . 'clases'.DS.'sistema'.DS);
    }

    private static function cargarClasesUtilidades(){
        self::cargarModelos(DIR_LIBRERIA . 'clases'.DS.'utilidades'.DS);
    }

    private static function cargarClasesModelos(){
        self::cargarModelos(DIR_LIBRERIA . 'clases'.DS.'datos'.DS);
    }

    protected static function cargarModelos($directorio)
    {
        $listArchivos = array();
        if (is_dir($directorio)):
            $listArchivos = self::buscarArchivos($directorio);

        // krumo($listArchivos);
        // echo "<br />";
            foreach ($listArchivos as $archivo) {
                $Ext = pathinfo($archivo, PATHINFO_EXTENSION);
                if ($Ext == "php") {
                    try {
                        // echo "cargando ......  ".$archivo. "<br /><br />";
                        require_once $archivo;
                    }
                    catch (Exception $e) {
                        krumo($e);
                    }
                }
            }
        endif;
        // krumo($listArchivos);
    }

    private static function buscarCarpetas($directorio)
    {
        $listDireccionCarpetas = array();
        if (is_dir($directorio)):
            $openDirectorio = scandir($directorio);
            foreach ($openDirectorio as $key => $componente):
                if (!in_array($componente, array(
                    '.',
                    '..'
                ))):
                    if (is_dir($directorio . $componente)):
                        array_push($listDireccionCarpetas, $directorio . $componente . '/');
                    endif;
                endif;
            endforeach;
        endif;
        return $listDireccionCarpetas;
    }

    private static function buscarArchivos($carpetas, $listArchivos = array() )
    {
            // echo "buscando archivos en $carpetas ".date("ymdhisu").".....<br />";
            if (is_dir($carpetas)):
                $openCarpetas = scandir($carpetas);
                foreach ($openCarpetas as $key => $nombre):
                    if (!in_array($nombre, array('.','..'))):
                        if (is_file($carpetas . $nombre)):
                            array_push($listArchivos, $carpetas . $nombre);
                        else:
                            $listArchivos = self::buscarArchivos($carpetas.$nombre.DS, $listArchivos);
                        endif;
                    else:

                    endif;
                endforeach;
            endif;

        return $listArchivos;
    }
}
AutoCargaClases::start();