<?php
ob_start();
?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css2/all.min.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Transeuntes</title>

  </head>
<body class="fondo">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v4.0"></script>

<div id="wrapper" class="">
    <!-- Sidebar -->
            <!-- Sidebar -->
            <nav class="navbar" id="navbarSupportedContent">
        <div class="collapse navbar-collapse">
        <p style="color:white;position:absolute;left:400;top:5;font-size:35px;text-shadow: 2px 0 0 #000, -2px 0 0 #000, 0 2px 0 #000, 0 -2px 0 #000, 1px 1px #000, -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000;"><strong>Control de transito Municipal</strong></p>
            <ul class="navbar-nav mr-auto">
            <p style="color:white;position:absolute;left:1100;top:10;font-size:10px">Salta <br> Coronel Juan Solá <br> Est. Morillo</p><img style="position:absolute;left:1200;top:15;font-size:10px" width="40px" src="salta.jpg">
                    </ul>
        </div>
    </nav>
    <div id="sidebar-wrapper">
        <ul id="sidebar_menu" class="sidebar-nav">
        <li class="sidebar-brand"><a id="menu-toggle" >COVID-19<i class="sub_icon fas fa-hospital-alt" style="font-size:30px"></i></a></li>
        </ul>
        <ul class="sidebar-nav" id="sidebar">
              <li><a  href="regpers.php">Transeúntes<i class="sub_icon fas fa-user"></i></span></a></li>
              <li><a  href="ingre.php">Ingresantes<i class="sub_icon fas fa-door-open"></i></a></li>
            <li><a  href="listtr.php">Lista trans.<i class="sub_icon fas fa-list-alt"></i></a></li>
            <li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li><li>&nbsp;</li>
          <li><a  href="#">Salir<i class="sub_icon fas fa-door-open"></a></i></ul>
      </div>
      <div id="page-content-wrapper">
        <div class="page-content inset">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="busqueda">
                <input class="form-control" id="myInput" type="text" placeholder="Ingrese los valores a buscar" style="width:300px;height:30px">    
            </div><br><br>
            <?Php
       include "conexion.php";
        $con = new conexion();
        $conn = new mysqli($con->getservername(), $con->getusername(), $con->getpassword(), $con->getdbname());                
        $sql = "SELECT  *, timestamp(fechaingreso,horaingreso) as 'fechayhora',DATE_FORMAT(fechaegreso, '%d/%m/%Y') AS fechaegreso,DATE_FORMAT(fechaingreso, '%d/%m/%Y') AS fechaingreso,DATE_FORMAT(horaingreso, '%H:%i') AS horaingreso,DATE_FORMAT(horaegreso, '%H:%i') AS horaegreso FROM registros ORDER BY id_reg DESC";
        $result = $conn->query($sql);
        echo "<table class='table  table-hover  table-condensed formreg'>
        <THEAD class='thead-light'>
            <tr>            
                <th scope='col'><center>Nombre</center></th>
                <th scope='col'><center>Dni</center></th>
                <th scope='col'><center>Domicilio</center></th>
                <th scope='col'><center>Telefono</center></th>
                <th scope='col'><center>Origen</center></th>
                <th scope='col'><center>Destino</center></th>
                <th scope='col'><center>¿Exceptuado?</center></th>  
                <th scope='col'><center>Ingreso</center></th>      
                <th scope='col'><center>Egreso</center></th>  
                <th scope='col'><center>Nro. Patente</center></th> 
                <th scope='col'><center>Opc.</center></th> 
            </tr>
            </THEAD><TBODY id='myTable'>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td align='center'>" . $row["nombre"] . "</td>
                        <td align='center'>" . $row["dni"] . "</td>
                        <td align='center'>" . $row["domicilio"] . "</td>
                        <td align='center'>" . $row["telefono"] . "</td>
                        <td align='center'>" . $row["origen"] . "</td>
                        <td align='center'>" . $row["destino"] . "</td>
                        <td align='center'>"; if($row['exceptuado']==0){
                                              echo 'No';
                                              }
                                              else{
                                                echo 'Si';
                                              }

                        echo "</td>  
                        <td align='center'>" . $row["fechaingreso"]." ".$row["horaingreso"]. "</td>
                        <td align='center'>" . $row["fechaegreso"]." ".$row["horaegreso"]. "</td> 
                        <td align='center'>" . $row["patente"]. "</td>    
                        <td align='center'>
                        <div class='btn-group'>
                        <button type='button' class='btn btn-primary btn-md dropdown-toggle' data-toggle='dropdown'>
                            <span class='fas fa-cogs'></span>
                        </button>
                        <ul class='dropdown-menu' role='menu'>
                            <li><a class='btn-exit-pers' href='eliminar.php?id_reg=" .$row["id_reg"] ."'>Borrar</a></li>
                            <li><a href='estado.php?id_reg=".$row["id_reg"]."'>Estado</a></li>
                            <li> <a href='det_reg.php?id_reg=" .$row["id_reg"] ."'>Ver Más</a></li>
                        </ul>
                        </div></td></tr>";
            }
        } 
        echo "</TBODY></table>";
        $conn->close();
  
    ?>  
            <div align="center">
            <a href="createexcel.php" class="btn btn-success">Planilla excel del dia  <i class="fas fa-file-pdf-o"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="generapdf.php" target="_blank" class="btn btn-danger">Planilla PDF del dia <i class="fas fa-file-excel-o"></i></a>
            </div>
            
            
            </div>
            
        </div>
    </div>
    </div>
    </div>
    </div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>   

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="op1.js"></script>
<script src="op2.js"></script>
<!-- <script src="js/jquery-3.1.1.min.js"></script> -->
<script src="js/bootstrap.min.js"></script>
<script src="js/AjaxForms.js"></script>
<script src="js/sweetalert2.min.js"></script>
<script src="plugins/fastclick/fastclick.min.js"></script>
<script src="dist/js/source_lines.js"></script>
<!-- <script src="plugins/jtable/jquery-ui.js" type="text/javascript"></script>
<script src="plugins/jtable/jquery.jtable.js" type="text/javascript"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html> 