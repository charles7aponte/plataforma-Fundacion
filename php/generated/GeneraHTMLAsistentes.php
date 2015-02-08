<?php

	//include all DAO files	
  //@include_once ("../include_dao.php");
  //include all DAO files
	require_once('include_dao.php');

class  GeneraHTMLAsistentes{


	public function crearTabla_asistentes(){
	
		$datos=DAOFactory::getAsistenteDAO()->queryAll();
		
		if(count($datos)>0)
		{
		for($i=0;$i< count($datos); $i++)
			{

												
						echo "<tr role='row' class='odd' id='lista_usuarios_".($i)."'>";
						//echo "	<td class='sorting_1'>".$datos[$i]->idelementos."</td>";
						echo "	<td>".$datos[$i]->email."</td>";
						echo "	<td>".$datos[$i]->nombres."</td>";
						
						echo "	<td>".$datos[$i]->apellidos."</td>";
						echo "	<td>".$datos[$i]->edad."</td>";
						echo "	<td>".$datos[$i]->ciudad."</td>";
            
           
						
						
							
						echo "	<td>";
						echo "		<img src='images/reload.png' alt='' ";
						echo " title='Editar' onclick=\"editar('".$datos[$i]->email."', '".$datos[$i]->nombres."', '".$datos[$i]->apellidos."', '".$datos[$i]->edad."','".$datos[$i]->ciudad."','".$datos[$i]->email."')\" ";
						echo "style='cursor: pointer;' >";
						echo "		<img src='images/delete-item.png' alt='' title='Eliminar' style='cursor: pointer;' onclick=\"eliminarAsistente('".$datos[$i]->email."', 'lista_usuarios_".($i)."')\">";

						echo "	</td>";
						echo "  </tr>";
		
	
				}
	
	}
	
	}
	
	
	
	
	
	
	
	
	
	}
	//fin de clase
	
	
	?>