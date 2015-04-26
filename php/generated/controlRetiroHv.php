<?php
    @include_once("include_dao.php");
    
    
    
    
    
    class control_Retiros{
        
        public function guardarRetiro(){
            if(isset($_POST["txtNombres"]) && isset($_POST["fec_inicio"]) && isset($_POST["fec_final"]) && isset($_POST["descripcion"])){
                $retiro = new Retiro();
                
                $retiro->descripcion = $_POST["descripcion"];
                $retiro->fechaInicio = $_POST["fec_inicio"];
                $retiro->fechaFinal = $_POST["fec_final"];
                $retiro->nombre =  $_POST["txtNombres"];
                        
                print_r($retiro);
                DAOFactory::getRetirosDAO()->insert($retiro);  
                return true;
            }
            return false;
        }
        
        public function editarRetiro(){            
            if(isset($_POST["miid"]) && isset($_POST["txtNombres"]) && isset($_POST["fec_inicio"]) && isset($_POST["fec_final"]) && isset($_POST["descripcion"])){
                $retiro = new Retiro();
                
                $retiro->idretiros = $_POST["miid"];
                $retiro->descripcion = $_POST["descripcion"];
                $retiro->fechaInicio = $_POST["fec_inicio"];
                $retiro->fechaFinal = $_POST["fec_final"];
                $retiro->nombre =  $_POST["txtNombres"];
                        
                print_r($retiro);
                DAOFactory::getRetirosDAO()->update($retiro);  
                return true;
            }
            return false;
        }
        
        public function elimiarRetiro(){
            if(isset($_POST["id"])){
                DAOFactory::getRetirosDAO()->delete($_POST["id"]);
                return 1;
            }return 0;
        }
        
    }

?>

