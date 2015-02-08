<?php

	//include all DAO files	
  //@include_once ("../include_dao.php");
  //include all DAO files
	require_once('include_dao.php');

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
            
            if($datos[$i]->activo=="0")
						{
							$nombreActivo="Inactivo";
						}
						else {
							$nombreActivo="Activo";
				
						}
						
						echo "	<td>".$nombreActivo."</td>";
							
						echo "	<td>";
						echo "		<img src='images/reload.png' alt='' ";
						echo " title='Editar' onclick=\"editar('".$datos[$i]->nombre."', '".$datos[$i]->apellido."', '".$datos[$i]->usuario."', '".$datos[$i]->clave."',".$datos[$i]->activo.", ".$datos[$i]->idusuario.")\" ";
						echo "style='cursor: pointer;' >";
						echo "		<img src='images/delete-item.png' alt='' title='Eliminar' style='cursor: pointer;' onclick=\"eliminarUsuario(".$datos[$i]->idusuario.",'lista_usuarios_".($i)."')\">";

						echo "	</td>";
						echo "  </tr>";
			}
		}
	
	}
	
	
	
	
	
	
	
	
	
	}//fin de clase
	
	
	?>