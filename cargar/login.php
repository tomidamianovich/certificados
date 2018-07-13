<?php
$hostname="127.0.0.1";
$username="root";
$password="";
$dbname="certificados";
$usertable="usuario";
$yourfield = "nombre";
$alias = $_POST["username"];

$con=mysqli_connect($hostname,$username, $password,$dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


mysqli_select_db($con,$dbname);


$query = 'SELECT * FROM usuario where alias="'.$alias.'"';

$result = mysqli_query($con,$query);

$user = $_POST['username'];
$pass = $_POST['password'];

if($result) {
	
  while($row = mysqli_fetch_assoc($result)){      
    if ($user==$row['alias'] && $pass==$row['password']){    
        session_start(); 

        $_SESSION["autentica"] = "ok";

        $_SESSION["usuario"] = $user;

        echo '<script language="javascript">alert("Bienvenido '.$_SESSION["usuario"].'.");</script>'; 
      
        echo '<script language="javascript">window.location="./index.php"</script>';   
    }
  }

}

echo "<script>
alert('Nombre de Usuario y/o Contraseña incorrectos');
window.location= '../index.html'
</script>";

mysqli_close($con);
?>