<?php

require_once('include_dao.php');

class generarHtmlRetiristas {

    public function TablaRetiristas($permiso_editar, $permiso_eliminar) {
       // $retiros = DAOFactory::getRetirosDAO()->queryAll();
        $retiristas = DAOFactory::getRetiristasDAO()->queryAll();

        if (count($retiristas) > 0) {
            for ($i = 0; $i < count($retiristas); $i++) {
                echo "<tr role='row' class='odd' id='lista_retiros_" . ($i) . "'>";
                echo "	<td>" . $retiristas[$i]->nombres . "</td>";
                echo "	<td>" . $retiristas[$i]->apellidos. "</td>";
                echo "	<td>" . $retiristas[$i]->edad . "</td>";
                echo "	<td>" . $retiristas[$i]->ciudad . "</td>";
                echo "	<td>" . $retiristas[$i]->telefono . "</td>";
                echo "	<td>" . $retiristas[$i]->cc . "</td>";
                echo "	<td>" . $retiristas[$i]->email . "</td>";
                
                echo "	<td>";
                echo "		<img src='images/reload.png' alt='' ";
                echo " title='Editar' onclick=\"editar('" . $retiristas[$i]->nombres . "', '" . $retiristas[$i]->apellidos. "', '" . $retiristas[$i]->edad . "','" . $retiristas[$i]->ciudad ."','" . $retiristas[$i]->telefono ."', '" . $retiristas[$i]->cc ."', '" . $retiristas[$i]->email ."', '" . $retiristas[$i]->idasistenteRetiros ."', ".$permiso_editar.")\" ";
                echo "style='cursor: pointer;' >";
                echo "		<img src='images/delete-item.png' alt='' title='Eliminar' style='cursor: pointer;' onclick=\"eliminarHv('" . $retiristas[$i]->idasistenteRetiros . "', 'lista_retiros_" . ($i) . "', ".$permiso_eliminar.")\">";

                echo "	</td>";
                echo "  </tr>";
            }
        }
    }

}

?>


