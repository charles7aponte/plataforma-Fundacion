<?php 


@include_once("../include_dao.php");


	class controlUsuario{



		public function guardarUsuario(){
		
		if(isset($_POST['activo']))
		{
		
			$txtNombres= $_POST['txtNombres'];
			$txtApellidos= $_POST['txtApellidos'];
			$usuario1= $_POST['usuario'];
			$activo= $_POST['activo'];
			$clave= $_POST['clave'];
			$organizacion_idorganizacion= $_POST['organizacion_idorganizacion'];
			
			
			echo "------$organizacion_idorganizacion";
			
			
			
			$usuario=  new Usuario();
			
			
			
			
			$usuario->nombre= $txtNombres;
			$usuario->apellido= $txtApellidos;
			$usuario->usuario=$usuario1;
			$usuario->activo=$activo;
			$usuario->clave=$clave;
			$usuario->organizacionIdorganizacion=$organizacion_idorganizacion;
			
				
			DAOFactory::getUsuarioDAO()->insert($usuario);
		
			}	
		}
	
    
    	
    
		public function eliminarUsuario($idusuario){
		
			return $rowsDeleted = DAOFactory::getUsuarioDAO()->delete($idusuario);

		
		
		}
    
    
    
    
    public function editarUsuario(){
		
			if(isset($_POST['miid']))
			{
				$elemento=DAOFactory::getElementosDAO()->load($_POST['miid']);
						$txtNombres= $_POST['txtNombres'];
            $txtApellidos= $_POST['txtApellidos'];
            $usuario1= $_POST['usuario'];
            $activo= $_POST['activo'];
            $clave= $_POST['clave'];

							
            $usuario->nombre= $txtNombres;
            $usuario->apellido= $txtApellidos;
            $usuario->usuario=$usuario1;
            $usuario->activo=$activo;
            $usuario->clave=$clave;
            $usuario->organizacionIdorganizacion=$organizacion_idorganizacion;

			
				
				DAOFactory::getUsuarioDAO()->update($usuario);
		
			}
		}
		
    
    
    
    
	}


?>