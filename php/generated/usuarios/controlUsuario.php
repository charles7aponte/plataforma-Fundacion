<?php 

	class controlUsuario{



		public function guardarUsuario(){
		
		if(isset($_POST['activo']))
		{
		
			$txtNombres= $_POST['txtNombres'];
			$txtApellidos= $_POST['txtApellidos'];
			$usuario= $_POST['usuario'];
			$activo= $_POST['activo'];
			$organizacion_idorganizacion= $_POST['organizacion_idorganizacion'];
			
			
			echo "------$activo";
			
			
			
			$usuario=  new Usuario();
			
			
			$usuario->idusuario;
			$usuario->nombre= $txtNombres;
			$usuario->apellido= $txtApellidos;
			$usuario->usuario=$usuario;
			$usuario->activo=$activo;
			$usuario->organizacion_idorganizacion=$organizacion_idorganizacion;
			
				
			DAOFactory::getUsuarioDAO()->insert($usuario);
		
			}	
		}
	

	}


?>