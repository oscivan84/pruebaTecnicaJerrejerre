<?php

class fileManager {
    
    public static function subirArchivo() {
        $errors = array();
        $file_name = $_FILES['info']['name'];
        $file_size = $_FILES['info']['size'];
        $file_tmp = $_FILES['info']['tmp_name'];
        $file_type = $_FILES['info']['type'];
        $name = $_FILES['info']['name'];
        $ext = explode('.', $name)[1];
        $file_ext = strtolower($ext);

        $expensions = array("txt");

        if (in_array($file_ext, $expensions) === false) {
            $errors["estado"] = false;
            $errors["mensaje"] = "extension no permitida";
        }

        if (empty($errors) == true) {
            $carpeta = 'uploadInfo';
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }
            $rutaFinal = "uploadInfo/" . $file_name;
            move_uploaded_file($file_tmp, $rutaFinal);
            return array("estado" => true, "mensaje" => "Archivo cargado con Éxito", "ruta" => $rutaFinal);
        } else {
            return $errors;
        }
    }

    public static function leerArchivo($ruta) {
        $file = fopen($ruta, "r");
        while (!feof($file)) {
            $linea = fgets($file);
            $element[] = explode(",", $linea);         
        }
        fclose($file);
        return $element;
    }
}
