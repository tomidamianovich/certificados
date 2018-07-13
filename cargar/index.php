<!DOCTYPE html>

<?php
require "seguridad.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificados</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="../styles.css"></script>
</head>

<body>
    <div class="container-fluid" style="
        background-color:  #9aca3c;
        height: 100%;
        width: 100%;
        ">
    <div class="navbar-header" style="
        height:  100%;
        width:  100%;
     ">

<!-- Content -->

        <a href="https://www.gba.gob.ar/" ><img src="https://www.gba.gob.ar/imagenes/logo_gba_footer.svg" style="
        margin-top: 2%;
        margin-bottom: 2%;
        margin-left:  8%;
        padding-bottom: 0px;
        width: 18%;
        "></a>

        </div>
         </div>
         <img src="../header.png" style="
         margin-top: -2px;
         width: 100%;
        ">
        <div class="container">
        <h3 style="font-family: din;font-weight: 1000;font-size: 30px;color: #333333;margin-top:3%;margin-left: 3%;">Certificados "Mi Primera Licencia"</h3>
        <p style="
        font-family:  din;
        width: 80%;
        margin-left: 3%;
        line-height: 25px;
        margin-top: 2%;
        ">En el marco de un convenio llamado "Mi Primer Licencia" del Ministerio de Gobierno con el Ministerio de Educación, se acordo para los alumnos de escuelas secundarias de
            la provincia de Buenos Aires la aprobación del Exámen Teorico necesario para la obtención de la licencia nacional de Conducir
        emitida por la Dirección de Politica y Seguridad Vial a los alumnos que aprueben las materias correspondientes en el secundario.</p>
        <div id="loginbox" style="margin-top: 4%;margin-bottom: 4%;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Carga de Alumnos</div>

        </div>

        <div style="padding-top:20px" class="panel-body" >

            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

            <form id="busquedaform" class="form-horizontal" target="_blank" action="./cargar.php" method="post">
                <p style="margin-bottom: 17px;">Complete los datos del nuevo alumno:</p>
                <div style="margin-bottom: 25px;margin-top: 5px;" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" required="" name="name" value="" placeholder="Nombre">
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" required="" name="apellido" value="" placeholder="Apellido">
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                    <input type="text" class="form-control" required="" name="dni" value="" placeholder="DNI">
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                    <input type="text" class="form-control" required="" name="colegio" value="" placeholder="Colegio">
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input id="fecha" type="date" name="fechaaprobacion" required="" style="font-size: 14px;height:34px; color: darkgray;  padding-left: 10px;">
                    <span style="color: darkgray;margin-left: 7px; font-size: 13px;"> (Fecha de Aprobación del Curso) </span>
                </div>

                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->

                    <div class="col-sm-12 controls">
                            <button id="btn-login" type="submit" class="btn boton" 
                            style="margin-bottom: 20px !important;">Cargar</button>
                    </div>
                </div>
            </form>

            <div class="form-group">
                <div class="col-md-12 control">
                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                        <form  method="post" target="_blank" action="cargarListado.php" enctype="multipart/form-data">

                    <div class="container" style="width:  100%;">
                        <div class="row" style="width: 100% !important;">
                            <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-center" style="width:  100%;margin-bottom:10px;">
                                <p style="font-size: 13px;margin-bottom: 22px;">¿Desea importar cursos o varios alumnos mediante un archivo Excel?</p>
                                        <input type="file" name="file" style="display:  inline;font-size: 13px;margin-bottom: 14px;">
                                        <button type="submit" class="btn btn-primary btn-sm"  style="
                                                background-color:  #5cb85c;
                                                border-color:  #5cb85c;
                                                width: 70px;
                                                margin-left: 15px;
                                                "> <i class="glyphicon glyphicon-cloud-upload"></i> Subir</button>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <a style="font-size: 13px;  " onclick="descargarExcel()">Descarga aquí el formato de excel requerido para la carga de alumnos</a>
                </div>
            </div>
        </div>
                </form>
            </div>
        </div>
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Ingreso a Carga de Alumnos</div>

                </div>
                <div class="panel-body" >
                    <form id="signupform" class="form-horizontal" action="./cargar/login.php" method="POST">

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Nombre de Usuario" onchange="cambiarColor()">
                        </div>

                <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Contraseña">
                        </div>




                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">

                          <button id="btn-login" type="submit" class="btn boton">Ingresar</button>


                        </div>
                    </div>



                    </form>
                 </div>
            </div>




 </div>
</div>
<div id="cargaralumnos" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Ingreso a Carga de Alumnos</div>

        </div>
        <div class="panel-body" >
            <form id="signupform" class="form-horizontal" role="form">

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Nombre de Usuario">
                </div>

        <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password" placeholder="Contraseña">
                </div>

            <div style="margin-top:10px" class="form-group">
                <!-- Button -->
                <div class="col-sm-12 controls">
                  <a id="btn-login" href="#" class="btn boton">Ingresar</a>
               </div>
            </div>
            </form>
         </div>
    </div>

</div>
</div>
</body>

<footer class="page-footer font-small blue pt-4 mt-4" style="
    border-color:  #444;
">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row" style="
    background-color: #444;
">

        <!-- Grid column -->
        <div class="col-md-4 mt-md-0 mt-3">

          <!-- Content -->

          <img src="https://www.gba.gob.ar/imagenes/logo_gba_footer.svg" style="
          margin-top: 8%;
          margin-bottom: 8%;
      ">


    </div>

  </footer>
<script>

    function cambiarColor(){
        var fecha=document.getElementById("fecha");

        if (fecha.style.color == "darkgray"){
            fecha.style.color = "black";
        } else {
            fecha.style.color = "darkgray";
        }

    }

    function descargarExcel(){
        var archivo='alumnos.xlsx';
        location.href="./descargar.php?archivo="+archivo;
    }


</script>

<style>

.panel-info>.panel-heading{
        background-color: #9ACA3C;
    /* border-color: #9ACA3C; */
    color: white;
}
.boton{
    color: #fff !important;
    margin: auto !important;
    width: 150px !important;
    display: block !important;
    background-color: #5cb85c;
    border-color: #4cae4c;
}
@font-face {
  font-family: "din";
  src: url("../DINR.woff");
}
    </style>
</html>
