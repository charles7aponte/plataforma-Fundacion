<?php

//require_once('../../php/generated/include_dao.php');
$sesion = new sesiones();
if(!isset($_POST["sesion"])){
    if(isset($_POST["usuario"])){
        require_once('../../php/generated/include_dao.php');
        $sesion->inicarSesion();
    }else
        require_once('php/generated/include_dao.php');
        
}else{
    require_once('../../php/generated/include_dao.php');
    $sesion->cerrarSesion();
}

class sesiones{
    public function inicarSesion(){
        if(strlen($_POST["usuario"]) > 0 && strlen($_POST["password"])){    
            $valor = DAOFactory::getUsuarioDAO()->queryByCredenciales($_POST["usuario"], $_POST["password"]);    
            if(count($valor)> 0){               
                session_start();
                $_SESSION["usuario"] = $_POST["usuario"];            
                $_SESSION["idUsuario"] = $valor[0]->idusuario;
                header("location: ../../inicio2.php");
            }else{            
                header("location: ../../login.php");
            }
        }
    }
    
    public function cerrarSesion(){
        session_start();
        session_destroy();
        header("location: ../../login.php");
    }
    
    public function validaModulos($idUsuario){
        //session_start();
        if(isset($idUsuario)){
            $credenciales = DAOFactory::getUsuarioHasModulosDAO()->queryByCredenciales($idUsuario);            
            return $credenciales;
        }
    }
    
    public function validarAccesoModulos($idUsuario, $nombreModulo){
        if(isset($idUsuario) && isset($nombreModulo)){
            return DAOFactory::getUsuarioHasModulosDAO()->queryValidaUsuarioModulo($idUsuario, $nombreModulo);
        }
        return "";
    }
}
?>