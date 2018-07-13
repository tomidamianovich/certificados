<?php

require("seguridad.php");

$servername = "localhost";                                             
$username = "root";
$password = "";
$dbname = "certificados";
$nombre = $_POST["name"];
$apellido = $_POST["apellido"];
$colegio = $_POST["colegio"];
$dni = $_POST["dni"];
$fechaaprobacion = $_POST["fechaaprobacion"];

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Ha ocurrido un Error: " . $con->connect_error);
}      

$consulta = "INSERT INTO `certificados`.`alumno` (`nombre`,`apellido`,`dni`,`colegio`,`fecharegistro`,`fechaaprobacion`)
VALUES ('".$nombre."','".$apellido."','".$dni."','".$colegio."',CURDATE(),'".$fechaaprobacion."');";


if ($con->query($consulta) == TRUE) { 
    echo "<script language='javascript'>
		     alert('Alumno cargado correctamente.');
		     window.location.href = './index.php';	
	      </script>";      
} else{
    echo "<script language='javascript'>
		     alert('Hubo un problema al cargar el Alumno..');
		     window.location.href = './index.php';	
	      </script>";      
}
?>