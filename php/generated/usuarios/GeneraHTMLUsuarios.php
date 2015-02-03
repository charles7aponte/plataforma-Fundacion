<?php

	//include all DAO files
	
@include_once ("../include_dao.php");


class  GeneraHTMLUsuarios{


	public function crearTabla_usu(){
	
		$datos=DAOFactory::getUsuarioDAO()->queryAll();

		if(count($datos)>0)
		{
		for($i=0;$i< count($datos); $i++)
			{
												
						echo "<tr role='row' class='odd' id='lista_usuarios_".($i)."'>";
						//echo "	<td class='sorting_1'>".$datos[$i]->idelementos."</td>";
						echo "	<td>".$datos[$i]->nombre."</td>";
						
						echo "	<td>".$datos[$i]->apellido."</td>";
						echo "	<td>".$datos[$i]->usuario."</td>";
						echo "	<td>".$datos[$i]->clave."</td>";
						echo "	<td>".$datos[$i]->activo."</td>";
					
						
							
						echo "	<td>";
						echo "		<img src='images/reload.png' alt='' ";
						echo " onclick=\"editar('".$datos[$i]->nombre."', '".$datos[$i]->apellido."', '".$datos[$i]->usuario."', '".$datos[$i]->clave."',".$datos[$i]->activo.")\" ";
						echo "style='cursor: pointer;' >";
						echo "		<img src='images/delete-item.png' alt='' style='cursor: pointer;' onclick=\"eliminarUsuario(".$datos[$i]->idusuario.",'lista_usuarios_".($i)."')\">";

						echo "	</td>";
						echo "  </tr>";
			}
		}
	
	}
	
	
	
	public function eliminarUsuario($idusuario){
	
		return $rowsDeleted = DAOFactory::getUsuarioDAO()->delete($idusuario);

	
	
	}
	
	
	
	
	
	}//fin de clase
	
	
	?>