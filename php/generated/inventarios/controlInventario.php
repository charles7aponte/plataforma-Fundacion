<?php 


@include_once("../include_dao.php");

	class controlInventario{



		public function guardarInventario(){
		
		if(isset($_POST['cantidad']))
		{
		
			$cantidad= $_POST['cantidad'];
			$descripcion= $_POST['descripcion'];
			$activo= $_POST['activo'];
			$precio= $_POST['precio'];
			$id_categoria= $_POST['id_categoria'];
			$txtNombres= $_POST['txtNombres'];
			
;
			
			
			
			$elementos=  new Elemento();
			
			
			$elementos->idelementos;
			$elementos->nombre= $txtNombres;
			$elementos->activo=$activo;
			$elementos->precio=$precio;
			$elementos->categoria= $id_categoria;
			$elementos->descripcion = $descripcion;
			$elementos->cantidad= $cantidad;
			$elementos->categoriaId= $id_categoria;
			
				
			DAOFactory::getElementosDAO()->insert($elementos);
		
			}	
		}
		
		 
		
		public function editarElementos(){
		
			if(isset($_POST['miid']))
			{
				$elemento=DAOFactory::getElementosDAO()->load($_POST['miid']);
						$cantidad= $_POST['cantidad'];
						$descripcion= $_POST['descripcion'];
						$activo= $_POST['activo'];
						$precio= $_POST['precio'];
						$id_categoria= $_POST['id_categoria'];
						$txtNombres= $_POST['txtNombres'];
						
						
							
						$elemento->nombre= $txtNombres;
						$elemento->activo=$activo;
						$elemento->precio=$precio;
						$elemento->categoria= $id_categoria;
						$elemento->descripcion = $descripcion;
						$elemento->cantidad= $cantidad;
						$elemento->categoriaId= $id_categoria;
					
			
				
				DAOFactory::getElementosDAO()->update($elemento);
		
			}
		}
		
		
		
		
			
		public function eliminarElemento($idelementos){
		
			return $rowsDeleted = DAOFactory::getElementosDAO()->delete($idelementos);

		
		
		}
		
		
		
		public function editarElemento($idelementos){
		
			return $rowsUpdate = DAOFactory::getModulesDAO()->update($idelementos);

		
		
		}
	

	}


?>