<?php

ob_start();

$hostname="127.0.0.1";
$username="root";
$password="";
$dbname="certificados";
$usertable="alumno";
$yourfield = "nombre";
$nombre = $_GET["dni"];

$con=mysqli_connect($hostname,$username, $password,$dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
  }



mysqli_select_db($con,$dbname);


$query = 'SELECT * FROM alumno WHERE dni='.$nombre.'';

$result = mysqli_query($con,$query);


if($result) {
	
  	if($row = mysqli_fetch_assoc($result)){
    include ('fpdf.php');
	html_entity_decode("&aacute;");
	 


 	$pdf = new FPDF('L','mm','A4');
    $pdf->AddPage();    
    $pdf->Image('header_vial.png',0,10,298,53,"png");
	$pdf->SetMargins(25,0,0);
	$pdf->Ln(35);
    $pdf->SetFont('Helvetica', 'B', 27);
	$pdf->SetTextColor('154', '202', '60'); 
	$pdf->Cell(69);
	
    $pdf->SetFont('Helvetica', '', 16);
	$pdf->SetTextColor('0', '0', '0'); 
	$pdf->Ln(23); 
	$fecha = new DateTime($row['fecharegistro']);
	$fecha = $fecha->format("d-m-Y");  

	$fechaCambioGestion = new DateTime("2018-01-10 00:00:00");
	
	if ($row['fecharegistro'] <= "2018-01-10 00:00:00"){		
		$imagenDirectorVial='fappiano.png';
		$descFirmaDirectores=utf8_decode("            Lic. María Aurelia Furnari                                                      Dr. Pablo Oscar Fappiano");
	}else{
		$descFirmaDirectores=utf8_decode("            Lic. María Aurelia Furnari                                                      Victor Augusto Stephens");
		$imagenDirectorVial='fappiano2.png';
	}


   setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
   $qr="http://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=http://localhost/certificados-dev/formulario.php?dni=".$nombre.".png";
   $pdf->Image($qr,260,170,30,30);
   
   $texto = "Se deja constancia que ".strtoupper($row['apellido'])." ".strtoupper($row['nombre']).", DNI ".strtoupper(iconv('UTF-8', 'windows-1252', $row['dni']))." ha asistido y aprobado el curso ".utf8_decode("\"POR UN CAMBIO DE CULTURA VIAL\" el dia ".$fecha.".");
   $texto2 = utf8_decode("El presente certificado se extiende a los efectos de acreditar el cumplimiento del curso de manejo señalado en el inc. 5) del art. 10 del Título I, Anexo II del Decreto 532/09 a los ").date("d").utf8_decode(" días del mes de ").strftime("%B").utf8_decode(" del año ").date("Y")." en la Provincia de Buenos Aires.";
   
   
   $pdf->MultiCell(245,10, $texto , 0,J,false);
   
   $pdf->MultiCell(245,10, $texto2 , 0,J,false);
	
	

    
   // $pdf->Ln(5);
    $pdf->Image('furnari.png',75,125,55,35,"png");
    $pdf->Image($imagenDirectorVial,190,125,48,35,"png");
    $pdf->Ln(40);
    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(40);
    $pdf->Write(3,$descFirmaDirectores);
    $pdf->SetFont('Helvetica', '', 9);
    $pdf->Ln(4);
    $pdf->Cell(27);
    $pdf->Write(3,utf8_decode("                Directora Provincial de Política Socio Educativa                                                       Director Provincial de Política y Seguridad Vial"));
    $pdf->SetTextColor('91', '89', '78'); 
 	$pdf->SetFont('Helvetica','',13);
	 $pdf->Ln(19);
	 $pdf->SetMargins(0,0,0);
 	$pdf->Write(8,"Para verificar la validez del certificado dirigirse a la ".utf8_decode("página")." ");
 	$pdf->SetFont('Helvetica','U',12);
 	$pdf->SetTextColor('0', '102', '204'); 
	$pdf->Write(8,"http://www.gob.gba.gov.ar/portal/seguridadvial/certificados");
 	$pdf->SetFont('Helvetica','',12);
 	$pdf->SetTextColor('0', '0', '0'); 
 	$pdf->Write(8,".");
    ob_end_clean();
    $pdf->Output();

	
	   }	
	   else {
		echo "<script language='javascript'>
			alert('No se encontro ningun alumno para ese DNI.');
		window.location.href = './index.html';	
	  </script>";
	}
	}
  
	mysqli_close($con);
?>
