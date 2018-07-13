<?php

require("seguridad.php");
require_once 'Excel/reader.php';

$servername = "localhost";                                             
$username = "root";
$password = "";
$dbname = "certificados";

$dir_creado="false";
$todayh = getdate();
$carpeta='./subidas/'.$todayh[0]."/";

// Creo una carpeta donde guardare el excel a convertir en csv para evitar conflictos de usuarios concurrentes
// Se asigna el nombre de la hora actual, recalcula su nombre hasta ser unico
while ($dir_creado=="false"){    
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
        $dir_creado="true";
    } else {
        $dir_creado="false";
        $todayh = getdate();
        $carpeta='./subidas/'.$todayh[0]."/";
    }
}

// Se sube el excel a la carpeta creada anteriormente
$target_path = $carpeta.basename($_FILES['file']['name']); 
$nombrearchivo = $_FILES['file']['name'];

echo $target_path;

// Se convierte a formato .csv el archivo .xls
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path) && copy('./subidas/empty.csv', $carpeta.'empty.csv')) { 
    
    $reader=new Spreadsheet_Excel_Reader();
    $reader->setUTFEncoder('iconv'); 
    $reader->setOutputEncoding('UTF-8');
    $reader->read('./'.$target_path); 
    
    $fp = fopen($carpeta.'empty.csv','w');

    $blankspace = array (";");   

  
    $isFirst=true;
    foreach($reader->sheets as $k=>$data) 
    {        
        foreach($data['cells'] as $row )
        {   
            if($isFirst) {
                $isFirst=false;                            
            } else {
            fputcsv($fp, $row);                     
            fputcsv($fp, $blankspace);
            }
        }
    }
    fclose($fp);

} else {
    echo "Ha ocurrido un error, trate de nuevo!";
}

echo "<html><br></html>";


$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Ha ocurrido un Error: " . $con->connect_error);
}      

$flagConsultas="true";

foreach(glob($carpeta.'empty.csv',GLOB_BRACE) as $archivo){

    $filetoopen = fopen($archivo, "r");     
    $datos = explode(",",fgets($filetoopen));    
    
    for ($i=0;$i<5;$i++){
        
        $dni=trim($datos[$i]);
        $nombre=trim($datos[$i+1]);
        $apellido=trim($datos[$i+2]);
        $colegio=trim($datos[$i+3]);
        $fechaaprobacion=trim($datos[$i+4]);
        $fechaaprobacionarray = explode("/",$fechaaprobacion);
        $fechaaprobacion="".trim($fechaaprobacionarray[2])."-".trim($fechaaprobacionarray[1])."-".trim($fechaaprobacionarray[0])." 00:00:00.000";
        echo $fechaaprobacion;
        $consulta = "INSERT INTO `certificados`.`alumno` (`nombre`,`apellido`,`dni`,`colegio`,`fecharegistro`,`fechaaprobacion`)
        VALUES ('".$nombre."','".$apellido."','".$dni."','".$colegio."',CURDATE(),'".$fechaaprobacion."');";

        if ($con->query($consulta) == FALSE) { 
            $flagConsultas="false";    
        }
               
    }
}
fclose($filetoopen);

// if ($flagConsultas=="true") { 
//      echo "<script language='javascript'>
//             alert('Listado de Alumnos cargado correctamente.');
//             window.location.href = './index.php';	
//         </script>";   
// } else{
//     echo "<script language='javascript'>
//             alert('Hubo un problema al cargar el Listado..');
//             window.location.href = './index.php';	
//         </script>";   
// }
    


?>