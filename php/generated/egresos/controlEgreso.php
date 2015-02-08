<?php 


@include_once("../include_dao.php");


	class controlEgreso{



		public function guardarEgreso(){
		
		if(isset($_POST['valor']))
		{
		
			$ciudad= $_POST['ciudad'];
			$fecha= $_POST['fecha'];
      $valor= $_POST['valor'];
      $pagado_a= $_POST['pagado_a'];
      $concepto1= $_POST['concepto'];
      $modalidad= $_POST['modalidad'];
      $beneficiario= $_POST['beneficiario'];
      $cc= $_POST['cc'];
			$aprobado= $_POST['aprobado'];
			$organizacion_idorganizacion= $_POST['organizacion_idorganizacion'];
			
			
			echo "------$organizacion_idorganizacion";
			
			
			
			$ingreso=  new Ingreso();
			
			
			
			
			$egreso->ciudad= $ciudad;
      $egreso->fecha= $fecha;
      $egreso->valor= $valor;
      $egreso->pagadoA= $pagado_a;
      $egreso->conceptoDe= $concepto1;
			$egreso->modalidad= $modalidad;
      $egreso->beneficiario= $beneficiario;
      $egreso->cc= $cc;
      $egreso->aprobado= $aprobado;
			$egreso->organizacionIdorganizacion=$organizacion_idorganizacion;
			
				
			DAOFactory::getEgresosDAO()->insert($egreso);
		
			}	
		}
	
    
    	
    
		public function eliminarEgreso($idegresos){
		
			return $rowsDeleted = DAOFactory::getEgresosDAO()->delete($idegresos, "0");

		
		
		}
    
    
    
    
    public function editarEgreso(){
		
			if(isset($_POST['miid']))
			{
			$usuario=DAOFactory::getEgresosDAO()->load($_POST['miid']);
			
            $ciudad= $_POST['ciudad'];
            $fecha= $_POST['fecha'];
            $valor= $_POST['valor'];
            $pagado_a= $_POST['pagado_a'];
            $concepto1= $_POST['concepto'];
            $modalidad= $_POST['modalidad'];
            $beneficiario= $_POST['beneficiario'];
            $cc= $_POST['cc'];
            $aprobado= $_POST['aprobado'];
            




            $egreso->ciudad= $ciudad;
            $egreso->fecha= $fecha;
            $egreso->valor= $valor;
            $egreso->pagadoA= $pagado_a;
            $egreso->conceptoDe= $concepto1;
            $egreso->modalidad= $modalidad;
            $egreso->beneficiario= $beneficiario;
            $egreso->cc= $cc;
            $egreso->aprobado= $aprobado;
            $egreso->organizacionIdorganizacion=$organizacion_idorganizacion;

			
				
				DAOFactory::getEgresosDAO()->update($egreso);
		
			}
		}
		
    
    
    
    
	}


?>