<?php

//include all DAO files	
//@include_once ("../include_dao.php");
//include all DAO files
require_once('include_dao.php');

class GeneraHTMLUsuarios {

    public function crearTabla_usu($permiso_editar, $permiso_eliminar) {

        $datos = DAOFactory::getUsuarioDAO()->queryAll();
        
        if (count($datos) > 0) {
            for ($i = 0; $i < count($datos); $i++) {
                $permisos = DAOFactory::getUsuarioHasModulosDAO()->queryAllByUsuario($datos[$i]->idusuario);
                
                //$permisosUsuario = $this->valida_permisos($permisos, $datos[$i]->idusuario);
                //print_r($permisosUsuario);
                echo "<tr role='row' class='odd' id='lista_usuarios_" . ($i) . "'>";
                //echo "	<td class='sorting_1'>".$datos[$i]->idelementos."</td>";
                echo "	<td>" . $datos[$i]->nombre . "</td>";

                echo "	<td>" . $datos[$i]->apellido . "</td>";
                echo "	<td>" . $datos[$i]->usuario . "</td>";
                //echo "	<td>" . $datos[$i]->clave . "</td>";

                if ($datos[$i]->activo == "0") {
                    $nombreActivo = "Inactivo";
                } else {
                    $nombreActivo = "Activo";
                }

                echo "	<td>" . $nombreActivo . "</td>";

                echo "	<td>";
                echo "		<img src='images/reload.png' alt='' ";                
                echo " title='Editar' data-permisos=\"234\"  onclick=\"editar('" . $datos[$i]->nombre . "', '" . $datos[$i]->apellido . "', '" . $datos[$i]->usuario . "', '" . $datos[$i]->clave . "'," . $datos[$i]->activo . ", " . $datos[$i]->idusuario . ", ".$permiso_editar.", ".serialize($permisos) ." ,this)\" ";
                echo "style='cursor: pointer;' >";
                echo "		<img src='images/delete-item.png' alt='' title='Eliminar' style='cursor: pointer;' onclick=\"eliminarUsuario(" . $datos[$i]->idusuario . ",'lista_usuarios_" . ($i) . "', ".$permiso_eliminar.")\">";

                echo "	</td>";
                echo "  </tr>";
            }
        }//fin de if
    }   

    public function valida_permisos($lista, $idUsuario) {

        $salida = "";
        $cont = 0;
        for ($i = 0; $i < count($lista); $i++) {
            $fila = $lista[$i];
            if ($fila->usuarioIdusuario == $idUsuario) {
                $salida.=$fila->modulosId . ",";
//                $salida[$cont] = array();
//                $cont2 = 0;
//                if($fila->$permisoAgregar == 1){
//                    
//                }
//                if($fila->$permisoEditar == 1){
//                    
//                }
//                if($fila->$permisoEliminar == 1){
//                    
//                }
            }
        }// fin de for
        return $salida;
    }
    
    public function generar_opciones_modulos(){
        $modulos = DAOFactory::getModulosDAO()->queryAll();
        
        $html = "";
        if($modulos != null ){
            for($i =0; $i < count($modulos); $i++){                
                $html = '<tr>
                        <td>'.$modulos[$i]->nombre.'</td>
                        <td><input class="accionPrincipalModulo" id="'.$modulos[$i]->nombre.'" type="checkbox" name="'.$modulos[$i]->nombre.'[]" value="0"></td>
                        <td><input class="AccionModulo" id="'.$modulos[$i]->nombre.'1" type="checkbox" name="'.$modulos[$i]->nombre.'[]" value="1"></td>
                        <td><input class="AccionModulo" id="'.$modulos[$i]->nombre.'2" type="checkbox" name="'.$modulos[$i]->nombre.'[]" value="2"></td>
                        <td><input class="AccionModulo" id="'.$modulos[$i]->nombre.'3" type="checkbox" name="'.$modulos[$i]->nombre.'[]" value="3"></td>
                    </tr>';
                echo $html;
            }            
        }return;
    }
}

//fin de clase
?>