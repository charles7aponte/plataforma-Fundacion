<?php 


@include_once("../include_dao.php");
@include_once '../../variablesGlobal.php';


	class controlHv{



		public function guardarHv(){
		
		if(isset($_POST['edad']))
		{
			
			$txtNombres= $_POST['txtNombres'];
			$txtApellidos= $_POST['txtApellidos'];
			$fecha_nac= $_POST['p_fecha_nacimiento'];
      $edad= $_POST['edad'];
			$email= $_POST['email'];
      $direccion= $_POST['direccion'];
      $cc= $_POST['cc'];
      $godson= $_POST['godson'];
      $telefono= $_POST['telefono'];
			$organizacion_idorganizacion= $_POST['organizacion_idorganizacion'];
			
			
			
			
			
			$hoja_de_vida=  new HV();
			
			
			
			
			$hoja_de_vida->nombres= $txtNombres;
			$hoja_de_vida->apellidos= $txtApellidos;
			$hoja_de_vida->fechaNac=$$fecha_nac;
      $hoja_de_vida->edad=$edad;
      $hoja_de_vida->email= $email;
			$hoja_de_vida->direccion=$direccion;
      $hoja_de_vida->cc=$cc;
      $hoja_de_vida->godson=$godson;
      $hoja_de_vida->telefono=$telefono;
			$hoja_de_vida->organizacionIdorganizacion=$organizacion_idorganizacion; //duda
			
     
          
      DAOFactory::getHojaDeVidaADAO()->insert($hoja_de_vida);
		    
          
    
			
			}	
		}
	
    
    	
    
		public function eliminarHV($id){
		
			return $rowsDeleted = DAOFactory::getHojaDeVidaDAO()->delete($id,VALOR_ORG);

		
		
		}
    
    
    
    
    public function editarAsistente(){
		
			if(isset($_POST['miid']))
			{
			$asistente=DAOFactory::getAsistenteDAO()->load($_POST['miid'],"0");
      
      
      
            $email= $_POST['email'];
            $txtNombres= $_POST['txtNombres'];
            $txtApellidos= $_POST['txtApellidos'];
            $edad= $_POST['edad'];
            $ciudad= $_POST['ciudad'];
            
            
							
            $asistente->email2= $email;//se cambio email por email2
            $asistente->nombres= $txtNombres;
            $asistente->apellidos= $txtApellidos;
            $asistente->edad=$edad;
            $asistente->ciudad=$ciudad;
           
            //$asistente->organizacionIdorganizacion=0;

			
				
				DAOFactory::getAsistenteDAO()->update($asistente,$email); //se agrego parametro email
		
			}
		}
		
    
    
    
    
	}


?>