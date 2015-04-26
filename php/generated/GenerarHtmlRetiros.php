<?php

require_once('include_dao.php');

class generarHtmlRetiros {

    public function TablaRetiros($permiso_editar, $permiso_eliminar) {
        $retiros = DAOFactory::getRetirosDAO()->queryAll();

        if (count($retiros) > 0) {
            for ($i = 0; $i < count($retiros); $i++) {
                echo "<tr role='row' class='odd' id='lista_retiros_" . ($i) . "'>";
                echo "	<td>" . $retiros[$i]->nombre . "</td>";
                echo "	<td>" . $retiros[$i]->fechaInicio. "</td>";
                echo "	<td>" . $retiros[$i]->fechaFinal . "</td>";
                echo "	<td>" . $retiros[$i]->descripcion . "</td>";

                echo "	<td>";
                echo "		<img src='images/reload.png' alt='' ";
                echo " title='Editar' onclick=\"editar('" . $retiros[$i]->nombre . "', '" . $retiros[$i]->fechaInicio. "', '" . $retiros[$i]->fechaFinal . "','" . $retiros[$i]->descripcion ."','" . $retiros[$i]->idretiros ."', ".$permiso_editar.")\" ";
                echo "style='cursor: pointer;' >";
                echo "		<img src='images/delete-item.png' alt='' title='Eliminar' style='cursor: pointer;' onclick=\"eliminarHv('" . $retiros[$i]->idretiros . "', 'lista_retiros_" . ($i) . "', ".$permiso_eliminar.")\">";

                echo "	</td>";
                echo "  </tr>";
            }
        }
    }

}

?>
