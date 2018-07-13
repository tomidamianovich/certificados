
<?php

@session_start();
//Validamos si existe realmente una sesion activa o no 
if(!isset($_SESSION["autentica"])){   
    $_SESSION["autentica"]="no";
}
    if($_SESSION["autentica"]!="ok"){ 
        echo '<script language="javascript">alert("Debe Iniciar Sesion para Acceder al Panel de Carga de Alumnos.");</script>'; 
        echo '<script language="javascript">window.location="../index.html"</script>';
        exit(); 
    }
    

?>