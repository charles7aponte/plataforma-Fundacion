<?php
    @include_once("include_dao.php");
    
    
    
    
    
    class control_Retiristas{
        
        public function guardarRetiristas(){
            if(isset($_POST["txtNombres"]) && isset($_POST["txtApellidos"]) && isset($_POST["cc"]) && isset($_POST["ciudad"]) && isset($_POST["email"]) && isset($_POST["telefono"]) && isset($_POST["edad"])){
                $retirista = new Retirista();
                
                $retirista->apellidos = $_POST["txtApellidos"];
                $retirista->cc = $_POST["cc"];
                $retirista->ciudad = $_POST["ciudad"];
                $retirista->nombres =  $_POST["txtNombres"];
                $retirista->edad =  $_POST["edad"];
                $retirista->email =  $_POST["email"];
                $retirista->telefono =  $_POST["telefono"];
                
                        
                print_r($retirista);
                DAOFactory::getRetiristasDAO()->insert($retirista);  
                return true;
            }
            return false;
        }
        
        public function editarRetirista(){            
            if(isset($_POST["miid"]) && isset($_POST["txtNombres"]) && isset($_POST["txtApellidos"]) && isset($_POST["cc"]) && isset($_POST["ciudad"]) && isset($_POST["email"]) && isset($_POST["telefono"]) && isset($_POST["edad"])){
                $retirista = new Retirista();
                
                $retirista->idasistenteRetiros = $_POST["miid"];
                $retirista->apellidos = $_POST["txtApellidos"];
                $retirista->cc = $_POST["cc"];
                $retirista->ciudad = $_POST["ciudad"];
                $retirista->nombres =  $_POST["txtNombres"];
                $retirista->edad =  $_POST["edad"];
                $retirista->email =  $_POST["email"];
                $retirista->telefono =  $_POST["telefono"];
                        
                print_r($retirista);
                DAOFactory::getRetiristasDAO()->update($retirista);  
                return true;
            }
            return false;
        }
        
        public function eliminarRetirista(){
            if(isset($_POST["id"])){
                DAOFactory::getRetiristasDAO()->delete($_POST["id"]);
                return 1;
            }return 0;
        }
        
    }

?>

