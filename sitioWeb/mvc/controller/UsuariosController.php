<?php
include_once("./core/fileManagement/fileManager.php");

class UsuariosController extends ControladorBase {

    public $conectar;
    public $adapter;

    public function __construct() {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }

    public function index() {

        //Creamos el objeto usuario
        $usuario = new Usuario($this->adapter);

        //Conseguimos todos los usuarios
        $allusers = $usuario->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("index", array(
            "mensaje" => ""
        ));
    }
    
    public function accionVerUsuarios() {
        //Creamos el objeto usuario
        $usuario = new Usuario($this->adapter);

        //Conseguimos todos los usuarios
        $allActiveUsers = $usuario->getAll("where codigo = 1");
        $allInactiveUsers = $usuario->getAll("where codigo = 2");
        $allInHoldUsers = $usuario->getAll("where codigo = 3");

        //Cargamos la vista index y le pasamos valores
        $this->view("users", array(
            "usuariosActivos" => $allActiveUsers,
            "usuariosInactivos" => $allInactiveUsers,
            "usuariosEspera" => $allInHoldUsers
        ));
    }

    public function accionSubirArchivo() {
        $mensaje = "";

        if (count($_FILES) > 0 && $_FILES["info"]["name"] != "") {
            $resultadoSubida = fileManager::subirArchivo();
            if($resultadoSubida["estado"] == true){
                $resultadoLectura = fileManager::leerArchivo($resultadoSubida["ruta"]);
                //$this->adapter->begin_transaction();
                $validstate = true;
                foreach ($resultadoLectura as $value) {
                    $usuario = new Usuario($this->adapter);
                    $usuario->setNombre($value[1]);
                    $usuario->setApellido($value[2]);
                    $usuario->setEmail($value[0]);
                    $usuario->setCodigo($value[3]);
                    if($usuario->validate()){
                        
                        $acumSql[] = $usuario->save(true);
                    }
                    else{
                        $validstate = false;
                        break;
                        //$this->adapter->rollback();
                    }
                }
                if($validstate){
                        $usuario->MultiSave($acumSql);
                        $this->redirect("Usuarios", "accionVerUsuarios");
                    }
                    else{
                        $mensaje = "El archivo no tiene el formato correcto";
                    }
                //$this->adapter->commit();
                
            }       
            else{
                $mensaje = $resultadoSubida["mensaje"];
            }
            
        }
        $this->view("index", array(
            "mensaje" => $mensaje   
        ));
    }
}

?>
