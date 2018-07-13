<?php

   $user = $_POST['user'];

   $password = $_POST['password'];

   

   if (($user == "admin") AND ($password == "123Cambiar")) {

      session_start(); 

      $_SESSION["autentica"] = "ok";

      $_SESSION["usuario"] = $user;

      echo '<script language="javascript">alert("Bienvenido '.$_SESSION["usuario"].'.");</script>'; 
     
      echo '<script language="javascript">window.location="cambioimagen.php"</script>';   
   

   } else {

       echo '<script language="javascript">alert("Usuario o password erroneos, intente nuevamente");</script>';     

       echo '<script language="javascript">window.location="index.html"</script>';     

   }

?>

