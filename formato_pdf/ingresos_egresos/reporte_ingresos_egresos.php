<?php
require_once "../../tcpdf/examples/lang/eng.php";
require_once "../../tcpdf/tcpdf.php";
// create new PDF document
ob_end_clean();
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPageOrientation('l'); // PDF_PAGE_ORIENTATION---> 'l' or 'p'

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);
// set document information
// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Comprobante ingreso FHOFNA', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

$pdf->SetCreator(PDF_CREATOR);
//echo $_GET["accion"];
if(isset($_GET["accion"])){
  require_once('../php/generated/include_dao.php');
  
  $datos=DAOFactory::getIngresosDAO()->queryById($_GET["accion"]);
  
  if(count($datos) > 0){
    $forma_pago = "";
    if($datos->formaPago == 1)
      $forma_pago = "Efectivo";
    else $forma_pago = "Cheque";
    $tbl = '
        <table  border="1px"   style="WIDTH:100%;"> <!-- Lo cambiaremos por CSS  rowspan="3"-->
            <tr>
                <td colspan="2" style="height:30px"><label style="font-size:20px;">Fundacion hogar familia de Nazareth</label></td>
                
                <td style="height:30px"><label style="font-size:20px;"><strong>Comprobante de ingreso</strong></label></td>
            </tr>
            <tr>
                <td colspan="2" style="height:30px"><label style="font-size:20px;">MZ. C Casa No.3 conj. Ciudad salitre</label></td>
                <td rowspan="2" style="height:30px"> <label style="font-size:30px; color: red;">Nº '.$datos->idingresos.'</label></td>
            </tr>
            <tr>
                <td colspan="2" style="height:30px"><label style="font-size:20px;">NIT 8220045327</label></td>
                
            </tr>
            <tr>
                <td colspan="2" style="height:30px">Ciudad: <br /><label style="font-size:20px;">'.$datos->ciudad.'</label></td>
                <td style="height:30px">Fecha: <label style="font-size:20px;">'.$datos->fecha.'</label></td>
                
            </tr>
            <tr>
                <td colspan="2" style="height:30px">Recibido de: <br /><label style="font-size:20px;">'.$datos->recibidoDe.' </label></td>
                <td style="height:30px">Valor : <br /><label style="font-size:20px;">'.$datos->valor.'</label></td>
            </tr>
            <tr>
                <td colspan="3" style="height:30px">Por concepto de:  <br /> <label style="font-size:15px;">'.$datos->conceptoDe.'</label></td>
            </tr>
            <tr>
                <td colspan="3" style="height:30px">La suma de (en letras)</td>
            </tr>
            <tr>
                <td colspan="3" style="height:40px">Elaborado por:  <br /> <label style="font-size:20px;">'.$datos->modalidad.'</label></td>
            </tr>
            <tr>
                <td colspan="3" style="height:40px">Forma de pago:  <br /> <label style="font-size:20px;">'.$forma_pago.' </label></td>
            </tr>
            <tr>
                <td style="height:35px">beneficiario:  <br /> <label style="font-size:18px;">'.$datos->beneficiario.' </label></td>
                <td style="min-height:35px">aprobado por  <br /> <label style="font-size:18px;">'.$datos->aprobado.' </label></td>
                <td style="min-height:35px">CC o NIT  <br /> <label style="font-size:18px;">'.$datos->cc.'</label></td>
            </tr>
        </table>';
  }
}
  

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->Output('activity_log_for_acs.pdf', 'I');
?>
