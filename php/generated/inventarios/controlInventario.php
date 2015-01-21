<?php 

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
			
			echo "------$activo";
			
			
			
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
	

	}


?>