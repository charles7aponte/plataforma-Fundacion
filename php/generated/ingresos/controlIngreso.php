<?php

@include_once("../include_dao.php");

class controlIngreso {

    public function guardarIngreso() {

        if (isset($_POST['valor'])) {

            $ciudad = $_POST['ciudad'];
            $fecha = $_POST['fecha'];
            $valor = $_POST['valor'];
            $recibido = $_POST['recibido'];
            $concepto1 = $_POST['concepto'];
            $modalidad = $_POST['modalidad'];
            $beneficiario = $_POST['beneficiario'];
            $cc = $_POST['cc'];
            $activo = $_POST['activo'];
            $aprobado = $_POST['aprobado'];
            $organizacion_idorganizacion = $_POST['organizacion_idorganizacion'];


            echo "-----$activo";
 
            $ingreso = new Ingreso();




            $ingreso->ciudad = $ciudad;
            $ingreso->fecha = $fecha;
            $ingreso->valor = $valor;
            $ingreso->recibidoDe = $recibido;
            $ingreso->conceptoDe = $concepto1;
            $ingreso->modalidad = $modalidad;
            $ingreso->beneficiario = $beneficiario;
            $ingreso->cc = $cc;
            $ingreso->formaPago = $activo;

            $ingreso->aprobado = $aprobado;
            $ingreso->organizacionIdorganizacion = $organizacion_idorganizacion;
                
            $id_ingreso = DAOFactory::getIngresosDAO()->insert($ingreso);
            echo "aaaaaa->".$id_ingreso;
            
            if($ingreso->formaPago == 0){
                @include_once("activoIngresoModel.php");
                                
                $cheque = new Cheque();
                
                
                $cheque->banco = $_POST["cheque_banco"];
                $cheque->codigo = $_POST["cheque_codigo"];
                $cheque->sucursal = $_POST["cheque_sucursal"];
                $cheque->cuenta = $_POST["cheque_cuenta"];
                $cheque->ingresosIdingresos = $id_ingreso;
                $cheque->tipoCheque = $_POST["tipoPago"];
                $cheque->cheque = $_POST["cheque_numero"];
                
                $idCheque =DAOFactory::getChequeDAO()->insert($cheque, "ingreso");
                print_r($idCheque);               
                $detallesCheque = "";
                if(isset($_POST["debito"])){
                    $detallesCheque = $_POST["debito"];
                    for($i = 0; $i < count($detallesCheque); $i++){
                        $data = $this->crearObjetoCheque($idCheque, $detallesCheque[$i]); 
                        DAOFactory::getDetalleChequeDAO()->insert($data);
                    }              
                }if(isset($_POST["credito"])){
                    $detallesCheque = $_POST["credito"];
                }                             
            }                
            
        }
    }

    private function crearObjetoCheque($id, $detalleCheque){    
        echo $datelleCheque;
        $detalle = new DetalleCheque();
        $detalle->chequeIdcheque = $id;
        $detalle->valor =$detalleCheque;
        return $detalle;
    }
    
    public function eliminarIngreso($idingresos) {

        return $rowsDeleted = DAOFactory::getIngresosDAO()->delete($idingresos, "0");
    }

    public function editarIngreso() {

        if (isset($_POST['miid'])) {
            $ingreso = DAOFactory::getIngresosDAO()->load($_POST['miid'], "0");

            $ciudad = $_POST['ciudad'];
            $fecha = $_POST['fecha'];
            $valor = $_POST['valor'];
            $recibido = $_POST['recibido'];
            $concepto1 = $_POST['concepto'];
            $modalidad = $_POST['modalidad'];
            $beneficiario = $_POST['beneficiario'];
            $cc = $_POST['cc'];
            $activo = $_POST['activo'];
            $aprobado = $_POST['aprobado'];





            $ingreso->ciudad = $ciudad;
            $ingreso->fecha = $fecha;
            $ingreso->valor = $valor;
            $ingreso->recibidoDe = $recibido;
            $ingreso->conceptoDe = $concepto1;
            $ingreso->modalidad = $modalidad;
            $ingreso->beneficiario = $beneficiario;
            $ingreso->cc = $cc;
            $ingreso->formaPago = $activo;
            $ingreso->aprobado = $aprobado;
            $ingreso->organizacionIdorganizacion = 0;


            DAOFactory::getIngresosDAO()->update($ingreso);
        }
    }

}

?>