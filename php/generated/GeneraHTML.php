<?php

	//include all DAO files
	require_once('include_dao.php');




class  GeneraHTML{




	public function generarSelecOrganizacion(){

		$a= new Organizacion();
		$a->idorganizacion=3;
		$a->nombre="victor";
		$a->descripcion="casa";
		
		$datos=DAOFactory::getOrganizacionDAO()->queryAll();

		print_r($datos);

	}
	
	
	
	
	public function crearTabla($permiso_editar, $permiso_eliminar){
	
		$datos=DAOFactory::getElementosDAO()->queryAll();
	    $nombreActivo="";
		if(count($datos)>0)
		{
		for($i=0;$i< count($datos); $i++)
			{
												
						echo "<tr role='row' class='odd' id='lista_elementos_".($i)."'>";
						//echo "	<td class='sorting_1'>".$datos[$i]->idelementos."</td>";
						echo "	<td>".$datos[$i]->nombre."</td>";
						
						
						if($datos[$i]->activo=="0")
						{
							$nombreActivo="Inactivo";
						}
						else {
							$nombreActivo="Activo";
				
						}
						
						echo "	<td>".$nombreActivo."</td>";
						echo "	<td>".$datos[$i]->precio."</td>";
						echo "	<td class='mi_td_categoria'>".$datos[$i]->categoria."</td>";
						echo "	<td>".$datos[$i]->descripcion."</td>";
						echo "	<td>".$datos[$i]->cantidad."</td>";
						
							
						echo "	<td>";
						echo "		<img src='images/reload.png' alt='' ";
						echo " title='Editar' onclick=\"editar('".$datos[$i]->nombre."', '".$datos[$i]->cantidad."', '".$datos[$i]->precio."', '".$datos[$i]->descripcion."',".$datos[$i]->activo.", '".$datos[$i]->fechaIngreso."', '".$datos[$i]->fechaCompra."' , '".$datos[$i]->medida."' , ".$datos[$i]->categoria.",".$datos[$i]->idelementos.", ".$permiso_editar.")\" ";
						echo "style='cursor: pointer;' >";
						echo "		<img src='images/delete-item.png' alt='' title='Eliminar' style='cursor: pointer;' onclick=\"eliminarElemento(".$datos[$i]->idelementos.",'lista_elementos_".($i)."' ,".$permiso_eliminar.")\">";

						echo "	</td>";
						echo "  </tr>";
			}
		}
	
	}
	

	
	
	
	
	
	public function generarSelecCategoria(){

		
		$datos=DAOFactory::getCategoriaDAO()->queryAll();

		if(count($datos)>0)
		{
		
		echo "<input type='hidden' name='id_categoria' id='id_categoria' value='".$datos[0]->id."'>";
				
			echo  "<button class='btn btn-default dropdown-toggle form-control' type='button' id='dropdownMenu1' data-toggle='dropdown' aria-expanded='true'> ";
			echo  "	<b id='nombre_categoria'>".$datos[0]->nombre."</b>";
			echo  "				<span class='caret'></span> ";
			echo  "			  </button>";
			
				
				
				
					
		
		
		
			echo "<ul class='dropdown-menu ' role='menu' aria-labelledby='dropdownMenu1' >";
			for($i=0;$i< count($datos); $i++)
			{
				echo "<li role='presentation' id='id_lista_selec_categoria_".$datos[$i]->id."' onclick=\"changeCategoria(".$datos[$i]->id.",'".$datos[$i]->nombre."'  )\"><a role='menuitem' onclick='return false' tabindex='-1' href='#'>".$datos[$i]->nombre."</a></li>";
			}
			echo "</ul>";
		}
	}
	


}

		
		
		
	
	
?>