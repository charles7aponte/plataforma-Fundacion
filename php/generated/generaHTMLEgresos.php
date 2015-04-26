<?php

	//include all DAO files	
  //@include_once ("../include_dao.php");
  //include all DAO files
	require_once('include_dao.php');

class  GeneraHTMLEgresos{


	public function crearTabla_Egresos($permiso_editar, $permiso_eliminar){
	
		$datos=DAOFactory::getEgresosDAO()->queryAll();
    $nombre_pago="";
    
		if(count($datos)>0)
		{
		for($i=0;$i< count($datos); $i++)
			{
												
						echo "<tr role='row' class='odd' id='lista_usuarios_".($i)."'>";
						//echo "	<td class='sorting_1'>".$datos[$i]->idelementos."</td>";
						//echo "	<td>".$datos[$i]->ciudad."</td>";
						echo "	<td>".$datos[$i]->fecha."</td>";
						echo "	<td>".$datos[$i]->valor."</td>";
						echo "	<td>".$datos[$i]->conceptoDe."</td>";
            echo "	<td>".$datos[$i]->pagadoA."</td>";
						//echo "	<td>".$datos[$i]->modalidad."</td>";
						echo "	<td>".$datos[$i]->cc."</td>";
            //echo "	<td>".$datos[$i]->beneficiario."</td>";
						
            
            if($datos[$i]->formaPago=="0")
						{
							$nombre_pago="Cheque";
						}
						else {
							$nombre_pago="Efectivo";
				
						}
						
						echo "	<td>".$nombre_pago."</td>";
            
						//echo "	<td>".$datos[$i]->aprobado."</td>";
            
            			
						echo "	<td>";
						echo "		<img src='images/reload.png' alt='' ";
						echo " title='editar' onclick=\"editar('".$datos[$i]->ciudad."', '".$datos[$i]->fecha."', '".$datos[$i]->valor."', '".$datos[$i]->pagadoA."', '".$datos[$i]->conceptoDe."', '".$datos[$i]->modalidad."',  '".$datos[$i]->beneficiario."',  '".$datos[$i]->cc."', ".$datos[$i]->formaPago.", '".$datos[$i]->aprobado."', ".$datos[$i]->idegresos.", ".$permiso_editar.")\" ";
						echo "style='cursor: pointer;' >";
						echo "		<img src='images/delete-item.png' alt='' title='eliminar' style='cursor: pointer;' onclick=\"eliminarIngreso(".$datos[$i]->idegresos.",'lista_usuarios_".($i)."', ".$permiso_eliminar.")\">";
						
						//VISUALIZAR
						//echo "		<img src='images/ver.png' alt='' title='visualizar' style='cursor: pointer;'>";
						echo "		<a href='formato_pdf/egresos_comprobante.php?accion=".$datos[$i]->idegresos."'><img src='images/ver.png' alt='' title='imprimir' style='cursor: pointer;' ></a>";
						echo "	</td>";
						echo "  </tr>";
			}
		}
	
	}
	
	
	
	
	
	
	
	
	
	}//fin de clase
	
	
	?>  