<?php

	//include all DAO files	
  //@include_once ("../include_dao.php");
  //include all DAO files
	require_once('include_dao.php');

class  GeneraHTMLIngresos{


	public function crearTabla_ingresos(){
	
		$datos=DAOFactory::getIngresosDAO()->queryAll();

		if(count($datos)>0)
		{
		for($i=0;$i< count($datos); $i++)
			{
												
						echo "<tr role='row' class='odd' id='lista_usuarios_".($i)."'>";
						//echo "	<td class='sorting_1'>".$datos[$i]->idelementos."</td>";
						echo "	<td>".$datos[$i]->ciudad."</td>";
						echo "	<td>".$datos[$i]->fecha."</td>";
						echo "	<td>".$datos[$i]->valor."</td>";
						echo "	<td>".$datos[$i]->recibidoDe."</td>";
						echo "	<td>".$datos[$i]->conceptoDe."</td>";
						echo "	<td>".$datos[$i]->modalidad."</td>";
						echo "	<td>".$datos[$i]->beneficiario."</td>";
						echo "	<td>".$datos[$i]->cc."</td>";
						echo "	<td>".$datos[$i]->aprobado."</td>";
            
            			
						echo "	<td>";
						echo "		<img src='images/reload.png' alt='' ";
						echo " title='editar' onclick=\"editar('".$datos[$i]->ciudad."', '".$datos[$i]->fecha."', '".$datos[$i]->valor."', '".$datos[$i]->recibidoDe."', '".$datos[$i]->conceptoDe."', '".$datos[$i]->modalidad."',  '".$datos[$i]->beneficiario."',  '".$datos[$i]->cc."', '".$datos[$i]->aprobado."', ".$datos[$i]->idingresos.")\" ";
						echo "style='cursor: pointer;' >";
						echo "		<img src='images/delete-item.png' alt='' title='eliminar' style='cursor: pointer;' onclick=\"eliminarIngreso(".$datos[$i]->idingresos.",'lista_usuarios_".($i)."')\">";

						echo "	</td>";
						echo "  </tr>";
			}
		}
	
	}
	
	
	
	
	
	
	
	
	
	}//fin de clase
	
	
	?>