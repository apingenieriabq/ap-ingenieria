<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Archivos
 *
 * @author Juan Pablo Llinás Ramírez <www.ccsm.org.co>
 */
class ArchivosControlador extends Controladores {

    function recibirImagenEditor() {
        $return_value = "";

        if ($_FILES['image']['name']) {
            if (!$_FILES['image']['error']) {
                $name = md5(rand(100, 200));
                $ext = explode('.', $_FILES['image']['name']);
                $filename = $name . '.' . $ext[1];
                $destination = DIR_BASE . 'images' . DS . 'editor-html' . DS . $filename;
                $destinationURL = URL_BASE . 'images' . DS . 'editor-html' . DS . $filename;
                $location = $_FILES["image"]["tmp_name"];
                move_uploaded_file($location, $destination);
                $return_value = 'Se ha cargado la imagen en la ruta ' . $filename;
                echo RespuestasSistema::exito($return_value, $destinationURL);
            } else {
                $return_value = 'Ooops! Ha ocurrido un error al cargar la imagen: ' . $_FILES['image']['error'];
                echo RespuestasSistema::fallo($return_value, $_FILES['image']['error']);
            }
        }
    }

}
