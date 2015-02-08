<?php 


@include_once("../include_dao.php");


	class controlIngreso{



		public function guardarIngreso(){
		
		if(isset($_POST['valor']))
		{
		
			$ciudad= $_POST['ciudad'];
			$fecha= $_POST['fecha'];
      $valor= $_POST['valor'];
      $recibido= $_POST['recibido'];
      $concepto1= $_POST['concepto'];
      $modalidad= $_POST['modalidad'];
      $beneficiario= $_POST['beneficiario'];
      $cc= $_POST['cc'];
			$aprobado= $_POST['aprobado'];
			$organizacion_idorganizacion= $_POST['organizacion_idorganizacion'];
			
			
			echo "------$organizacion_idorganizacion";
			
			
			
			$ingreso=  new Ingreso();
			
			
			
			
			$ingreso->ciudad= $ciudad;
      $ingreso->fecha= $fecha;
      $ingreso->valor= $valor;
      $ingreso->recibidoDe= $recibido;
      $ingreso->conceptoDe= $concepto1;
			$ingreso->modalidad= $modalidad;
      $ingreso->beneficiario= $beneficiario;
      $ingreso->cc= $cc;
      $ingreso->aprobado= $aprobado;
			$ingreso->organizacionIdorganizacion=$organizacion_idorganizacion;
			
				
			DAOFactory::getIngresosDAO()->insert($ingreso);
		
			}	
		}
	
    
    	
    
		public function eliminarIngreso($idingresos){
		
			return $rowsDeleted = DAOFactory::getIngresosDAO()->delete($idingresos, "0");

		
		
		}
    
    
    
    
    public function editarIngreso(){
		
			if(isset($_POST['miid']))
			{
			$ingreso=DAOFactory::getIngresosDAO()->load($_POST['miid']);
            
            $ciudad= $_POST['ciudad'];
            $fecha= $_POST['fecha'];
            $valor= $_POST['valor'];
            $recibido= $_POST['recibido'];
            $concepto1= $_POST['concepto'];
            $modalidad= $_POST['modalidad'];
            $beneficiario= $_POST['beneficiario'];
            $cc= $_POST['cc'];
            $aprobado= $_POST['aprobado'];
            




            $ingreso->ciudad= $ciudad;
            $ingreso->fecha= $fecha;
            $ingreso->valor= $valor;
            $ingreso->recibidoDe= $recibido;
            $ingreso->conceptoDe= $concepto1;
            $ingreso->modalidad= $modalidad;
            $ingreso->beneficiario= $beneficiario;
            $ingreso->cc= $cc;
            $ingreso->aprobado= $aprobado;
            $ingreso->organizacionIdorganizacion=$organizacion_idorganizacion;

				
				DAOFactory::getIngresosDAO()->update($ingreso);
		
			}
		}
		
    
    
    
    
	}


?>