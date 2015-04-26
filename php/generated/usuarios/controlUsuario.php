<?php

@include_once("../include_dao.php");

class controlUsuario {

    public function guardarUsuario() {

        if (isset($_POST['activo'])) {

            $txtNombres = $_POST['txtNombres'];
            $txtApellidos = $_POST['txtApellidos'];
            $usuario1 = $_POST['usuario'];
            $activo = $_POST['activo'];
            $clave = $_POST['clave'];
            $organizacion_idorganizacion = $_POST['organizacion_idorganizacion'];

            $usuario = new Usuario();

            $usuario->nombre = $txtNombres;
            $usuario->apellido = $txtApellidos;
            $usuario->usuario = $usuario1;
            $usuario->activo = $activo;
            $usuario->clave = $clave;
            $usuario->organizacionIdorganizacion = $organizacion_idorganizacion;

            $id = DAOFactory::getUsuarioDAO()->insert($usuario);
            
            
            $obj_modulos = DAOFactory::getModulosDAO()->queryAll();
            
            for($i = 0; $i < count($obj_modulos); $i++){
                $nombre = $obj_modulos[$i]->nombre;                
                if(isset($_POST[$nombre])){                    
                    $data = $this->obtenerModulosRegistrados($id, $_POST[$nombre], $obj_modulos[$i]->id);
                    DAOFactory::getUsuarioHasModulosDAO()->insert($data);                 
                }
            }
        }
    }
    
    public function obtenerModulosRegistrados($id, $arreglo, $tipo){
        $arreglisimo = new UsuarioHasModulo();
        $arreglisimo->modulosId = $tipo;
        $arreglisimo->usuarioIdusuario = $id;
        $arreglisimo->permisoAgregar = 0;
        $arreglisimo->permisoEditar = 0;
        $arreglisimo->permisoEliminar = 0;
        
        //$arreglisimo["id"] = $tipo;
        for($i = 1; $i < count($arreglo); $i++){
            if($arreglo[$i] == 1)
                $arreglisimo->permisoAgregar = 1;
                //$arreglisimo["Agregar"]= 1;
            if($arreglo[$i] == 2)
                $arreglisimo->permisoEditar = 1;
                //$arreglisimo["Editar"]= 1;
            if($arreglo[$i] == 3)
                $arreglisimo->permisoEliminar = 1;
                //$arreglisimo["Eliminar"]= 1;
        }
        return $arreglisimo;
    }

    public function verificarCredenciales($nombre, $password) {
        return DAOFactory::getUsuarioDAO()->queryByCredenciales($nombre, $password);
        //return DAOFactory::getUsuarioDAO()->queryByCredenciales($nombre, $password);
    }

    public function eliminarUsuario($idusuario) {

        return $rowsDeleted = DAOFactory::getUsuarioDAO()->delete($idusuario);
    }

    public function editarUsuario() {

        if (isset($_POST['miid'])) {
            $usuario = DAOFactory::getUsuarioDAO()->load($_POST['miid']);
            $txtNombres = $_POST['txtNombres'];
            $txtApellidos = $_POST['txtApellidos'];
            $usuario1 = $_POST['usuario'];
            $activo = $_POST['activo'];
            $clave = $_POST['clave'];
            $organizacion_idorganizacion = $_POST['organizacion_idorganizacion'];

            $modulos = isset($_POST['modulos']) ? $_POST['modulos'] : null;



            $usuario->nombre = $txtNombres;
            $usuario->apellido = $txtApellidos;
            $usuario->usuario = $usuario1;
            $usuario->activo = $activo;

            if ('#{$3$}#' == $clave) {
                $usuario->clave = null;
            } else {
                $usuario->clave = $clave;
            }
            $usuario->organizacionIdorganizacion = $organizacion_idorganizacion;






            DAOFactory::getUsuarioDAO()->update($usuario);
            DAOFactory::getUsuarioHasModulosDAO()->delete($usuario->idusuario, null);

            if (($modulos)) {
                for ($i = 0; $i < count($modulos); $i++) {
                    $mismodulos = new UsuarioHasModulo();
                    $mismodulos->modulosId = $modulos[$i];
                    $mismodulos->usuarioIdusuario = $usuario->idusuario;
                    DAOFactory::getUsuarioHasModulosDAO()->insert($mismodulos);
                }
            }
        }
    }

}

?>