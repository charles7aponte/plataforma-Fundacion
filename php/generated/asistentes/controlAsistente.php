<?php 


@include_once("../include_dao.php");


	class controlAsistente{



		public function guardarAsistente(){
		
		if(isset($_POST['edad']))
		{
			$email= $_POST['email'];
			$txtNombres= $_POST['txtNombres'];
			$txtApellidos= $_POST['txtApellidos'];
			$edad= $_POST['edad'];
			$ciudad= $_POST['ciudad'];
			$organizacion_idorganizacion= $_POST['organizacion_idorganizacion'];
			
			
			
			
			
			$asistente=  new Asistente();
			
			
			
			$asistente->email= $email;
			$asistente->nombres= $txtNombres;
			$asistente->apellidos= $txtApellidos;
			$asistente->edad=$edad;
			$asistente->ciudad=$ciudad;
			$asistente->organizacionIdorganizacion=$organizacion_idorganizacion; //duda
			
     
          
      DAOFactory::getAsistenteDAO()->insert($asistente);
		    
          
    
			
			}	
		}
	
    
    	
    
		public function eliminarAsistente($email){
		
			return $rowsDeleted = DAOFactory::getAsistenteDAO()->delete($email,"0");

		
		
		}
    
    
    
    
    public function editarAsistente(){
		
			if(isset($_POST['miid']))
			{
			$asistente=DAOFactory::getAsistenteDAO()->load($_POST['miid']);
            $email= $_POST['email'];
            $txtNombres= $_POST['txtNombres'];
            $txtApellidos= $_POST['txtApellidos'];
            $edad= $_POST['edad'];
            $ciudad= $_POST['ciudad'];
            

							
            $asistente->email= $email;
            $asistente->nombres= txtNombres;
            $asistente->apellidos= $txtApellidos;
            $asistente->edad=$edad;
            $asistente->ciudad=$ciudad;
           
            $asistente->organizacionIdorganizacion=$organizacion_idorganizacion;

			
				
				DAOFactory::getAsistenteDAO()->update($asistente);
		
			}
		}
		
    
    
    
    
	}


?>