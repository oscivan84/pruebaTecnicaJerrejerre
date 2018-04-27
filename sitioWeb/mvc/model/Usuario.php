<?php

class Usuario extends EntidadBase {

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $codigo;

    public function __construct($adapter) {
        $table = "usuarios";
        parent::__construct($table, $adapter);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getValidationRules() {
        return array(
            "required" => "email,codigo",
            "validValues" => array("codigo" => array("min" => 1, "max" => 3))
        );
    }

    public function validate() {
        $rules = $this->getValidationRules();
        $required = explode(",", $rules["required"]);
        $valid = $rules["validValues"];

        foreach ($this as $key => $value) {
            if (in_array($key, $required)) {
                if (trim($value) == "") {
                    return false;
                }
            }
            if (array_key_exists($key, $valid)) {
                $min = (int) $valid[$key]["min"];
                $max = (int) $valid[$key]["max"];

                if ((int) $value < $min || (int) $value > $valid[$key]["max"]) {
                    return false;
                }
            }
        }
        return true;
    }

    public function save($returnSql = false) {
        $query = "INSERT INTO usuarios (id,nombre,apellido,email,codigo)
                VALUES(NULL,
                       '" . $this->nombre . "',
                       '" . $this->apellido . "',
                       '" . $this->email . "',
                       '" . trim($this->codigo) . "');";
    if($returnSql){
        return $query;
    }
        $save = $this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    public function MultiSave($sql) {
        try {
            foreach ($sql as $value) {
                $save = $this->db()->query($value);
            }
            return true;
        } catch (Exception $exc) {
            return; $exc->getTraceAsString();
        }
        
    }

}

?>