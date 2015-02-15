

<!-- @ 3 formas de poner una imagen como fondo web adaptable a cualquier resolución
     @ author Agustín Baraza (contacto@nosolocss.com)
     @ Copyright 2014 nosolocss.com. All rights reserved
     @ http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
     @ link http://www.nosolocss.com -->

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7,8,9" />
<meta name="keywords" content="jquery, fondo, fondo web" />
<meta name="description" content="Redimensiona la ventana para ver como la imagen se adapta a cualquier resolución con Jquery backstretch. No solo CSS" lang="ES" />
<link href='http://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
<title>Fondo a pantalla completa con Jquery backstretch</title>

<style type="text/css">

body{
	font-family: 'Architects Daughter', cursive;
	color:#333;
	font-size:25px;
	font-weight:bold;
}
a{
	text-decoration:none;
	font-family: 'Black Ops One', cursive;
	font-size:20px;
	color:#222;

}
a:hover{

	color:#DF7401;
	
}
.nsc{
	position:absolute;
	bottom:0;
	right:10px;

}
.center{
	position: absolute;
	padding: 0 10px 0 10px;
	width: 500px;
	height: 500px;
	top: 50%;
	left: 50%;
	margin-left: -250px;
	margin-top: -250px;
	background-color: rgba(245, 218, 129, 0.50);
	

}
h1{
	font-size: 20px;
}
h1 p{

	background: #222;
	color: #fff;
	padding: 10px;


}


</style>
</head>
<body>
  
  <img src="images/comprobante_ing.png" width="1000px" height="600px" alt="descripcion de la imagen" style="background-position: center">
  
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/jquery-2.1.1.min.js"></script>

<script>
	
	$(document).ready(function() {
		$.backstretch("background.jpg");
	});
  
  
  
  
  
  
  
  function Unidades(num){

  switch(num)
  {
    case 1: return "UN";
    case 2: return "DOS";
    case 3: return "TRES";
    case 4: return "CUATRO";
    case 5: return "CINCO";
    case 6: return "SEIS";
    case 7: return "SIETE";
    case 8: return "OCHO";
    case 9: return "NUEVE";
  }

  return "";
}

function Decenas(num){

  decena = Math.floor(num/10);
  unidad = num - (decena * 10);

  switch(decena)
  {
    case 1:   
      switch(unidad)
      {
        case 0: return "DIEZ";
        case 1: return "ONCE";
        case 2: return "DOCE";
        case 3: return "TRECE";
        case 4: return "CATORCE";
        case 5: return "QUINCE";
        default: return "DIECI" + Unidades(unidad);
      }
    case 2:
      switch(unidad)
      {
        case 0: return "VEINTE";
        default: return "VEINTI" + Unidades(unidad);
      }
    case 3: return DecenasY("TREINTA", unidad);
    case 4: return DecenasY("CUARENTA", unidad);
    case 5: return DecenasY("CINCUENTA", unidad);
    case 6: return DecenasY("SESENTA", unidad);
    case 7: return DecenasY("SETENTA", unidad);
    case 8: return DecenasY("OCHENTA", unidad);
    case 9: return DecenasY("NOVENTA", unidad);
    case 0: return Unidades(unidad);
  }
}//Unidades()

function DecenasY(strSin, numUnidades){
  if (numUnidades > 0)
    return strSin + " Y " + Unidades(numUnidades)

  return strSin;
}//DecenasY()

function Centenas(num){

  centenas = Math.floor(num / 100);
  decenas = num - (centenas * 100);

  switch(centenas)
  {
    case 1:
      if (decenas > 0)
        return "CIENTO " + Decenas(decenas);
      return "CIEN";
    case 2: return "DOSCIENTOS " + Decenas(decenas);
    case 3: return "TRESCIENTOS " + Decenas(decenas);
    case 4: return "CUATROCIENTOS " + Decenas(decenas);
    case 5: return "QUINIENTOS " + Decenas(decenas);
    case 6: return "SEISCIENTOS " + Decenas(decenas);
    case 7: return "SETECIENTOS " + Decenas(decenas);
    case 8: return "OCHOCIENTOS " + Decenas(decenas);
    case 9: return "NOVECIENTOS " + Decenas(decenas);
  }

  return Decenas(decenas);
}//Centenas()

function Seccion(num, divisor, strSingular, strPlural){
  cientos = Math.floor(num / divisor)
  resto = num - (cientos * divisor)

  letras = "";

  if (cientos > 0)
    if (cientos > 1)
      letras = Centenas(cientos) + " " + strPlural;
    else
      letras = strSingular;

  if (resto > 0)
    letras += "";

  return letras;
}//Seccion()

function Miles(num){
  divisor = 1000;
  cientos = Math.floor(num / divisor)
  resto = num - (cientos * divisor)

  strMiles = Seccion(num, divisor, "UN MIL", "MIL");
  strCentenas = Centenas(resto);

  if(strMiles == "")
    return strCentenas;

  return strMiles + " " + strCentenas;

  //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
}//Miles()

function Millones(num){
  divisor = 1000000;
  cientos = Math.floor(num / divisor)
  resto = num - (cientos * divisor)

  strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
  strMiles = Miles(resto);

  if(strMillones == "")
    return strMiles;

  return strMillones + " " + strMiles;

  //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
}//Millones()

function NumeroALetras(num){
  var data = {
    numero: num,
    enteros: Math.floor(num),
    centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
    letrasCentavos: "",
    letrasMonedaPlural: "CORDOBAS",
    letrasMonedaSingular: "CORDOBA"
  };

  if (data.centavos > 0)
    data.letrasCentavos = "CON " + data.centavos + "/100";

  if(data.enteros == 0)
    return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
  if (data.enteros == 1)
    return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
  else
    return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
}//NumeroALetras()
  
  
	
</script>

numero: <input type="number"  name="usuario" id="usuario" placeholder="Usuario" >
<button 
		onclick="enviarDatos()"
		type="button" class="btn btn-primary" style="margin-left: 100px;">			
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <b id="btnProcesar">Agregar</b>
		</button>	
 


</body>
</html>