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
            <div class="col-11">
                            <?Php
                                include "conexion.php";
                        $con = new conexion();
                        $conn = new mysqli($con->getservername(),
                        $con->getusername(),
                        $con->getpassword(),
                        $con->getdbname());

                                
                        $sql ="SELECT  *,DATE_FORMAT(fecha_nacimiento, '%d/%m/%Y') AS fecha_nacimiento,DATE_FORMAT(fechaegreso, '%d/%m/%Y') AS fechaegreso,DATE_FORMAT(fechaingreso, '%d/%m/%Y') AS fechaingreso,DATE_FORMAT(horaingreso, '%H:%i') AS horaingreso,DATE_FORMAT(horaegreso, '%H:%i') AS horaegreso FROM registros WHERE id_reg=".$_GET["id_reg"]; 
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                    echo "<br><br><br><br><table class='table'><tr>
                                    <td><center><strong>Nombre: </strong>" . $row["nombre"]."</center></td>
                                <td><center><strong>DNI: </strong>" . $row["dni"]."</center></td>
                                <td><center><strong>Fecha de Nacimiento : </strong>" . $row["fecha_nacimiento"]."</center></td></tr>
                                <tr>
                                <td><center><strong>Domicilio: </strong>". $row["domicilio"]."</center></td>
                                <td><center><strong>Telefono/Celular: </strong>" . $row["telefono"]."</center></td>
                                <td><center><strong>Cargo/Funcion: </strong>" . $row["cargofuncion"]."</center></td>
                                </tr>
                                <tr>
                                <td><center><strong>Origen: </strong>" . $row["origen"]."</center></td>
                                <td><center><strong>Destino: </strong>" . $row["destino"]."</center></td>
                                <td><center><strong>Descripcion: </strong>" . $row["descripcion"]."</center></td>
                                </tr>
                                <tr>
                                <td colspan='3'><center><strong>Tarea exceptuada: </strong>";
                                    if($row["exceptuado"]==0){
                                        echo "---";
                                    }
                                    if($row["exceptuado"]==1){
                                        echo "Actividad aseguradora desarrollada por compañías aseguradoras, reaseguradoras e intermediarios.";
                                    }
                                    if($row["exceptuado"]==2){
                                        echo "Actividad de entrenamiento de pilotos, desarrollada a través de vuelos privados, en aeroclubes y en escuelas de vuelo.";
                                    }
                                    if($row["exceptuado"]==3){
                                        echo "Actividad Notarial (Decisión Administrativa 467/2020)";
                                    }
                                    if($row["exceptuado"]==4){
                                        echo "Actividad y servicio de mantenimiento y reparación de material rodante ferroviario, embarcaciones, buques y aeronaves.";
                                    }
                                    if($row["exceptuado"]==5){
                                        echo "Actividades religiosas individuales en iglesias, templos y lugares de culto de cercanía.";
                                    }
                                    if($row["exceptuado"]==6){
                                        echo "Artistas y Asistentes de la Industria o Actividad Audiovisual y las Artes Escénicas.";
                                    }
                                    if($row["exceptuado"]==7){
                                        echo "Caja de Seguridad Social para Abogados de la Provincia de Salta.";
                                    }
                                    if($row["exceptuado"]==8){
                                        echo "Círculo Médico de Salta.";
                                    }
                                    if($row["exceptuado"]==9){
                                        echo "Colegio de Abogados y Procuradores de la Provincia de Salta.";
                                    }
                                    if($row["exceptuado"]==10){
                                        echo "Comercio.";
                                    }
                                    if($row["exceptuado"]==11){
                                        echo "Concesionarias de los corredores viales nacionales, incluido el cobro de peaje.";
                                    }
                                    if($row["exceptuado"]==12){
                                        echo "Consejo Profesional de Ciencias Económicas de Salta.";
                                    }
                                    if($row["exceptuado"]==13){
                                        echo "Establecimientos para la atención de personas víctimas de violencia de género - Personal Afectado";
                                    }
                                    if($row["exceptuado"]==14){
                                        echo "Establecimientos que desarrollen actividades de cobranza de servicios e impuestos";
                                    }
                                    if($row["exceptuado"]==15){
                                        echo "Fabricación y provisión de insumos y repuestos indisp. p/la prestación del servicio de transporte ferroviario, aéreo, fluvial o marítimo.";
                                    }
                                    if($row["exceptuado"]==16){
                                        echo "Peluquería.";
                                    }
                                    if($row["exceptuado"]==17){
                                        echo "Peritos y liquidadores de siniestros de las compañías aseguradoras.";
                                    }
                                    if($row["exceptuado"]==18){
                                        echo "Personal de Casa Particulares.";
                                    }
                                    if($row["exceptuado"]==19){
                                        echo "Personal del ANSES.";
                                    }
                                    if($row["exceptuado"]==20){
                                        echo "Personas afectadas al Desarrollo de Obra Privada.";
                                    }
                                    if($row["exceptuado"]==21){
                                        echo "Productores Asesores de Seguros.";
                                    }
                                    if($row["exceptuado"]==22){
                                        echo "Profesionales y técnicos especialistas en seguridad e higiene laboral.";
                                    }
                                    if($row["exceptuado"]==23){
                                        echo "Profesiones Liberales.";
                                    }
                                    if($row["exceptuado"]==24){
                                        echo "Servicio de Mantenimiento.";
                                    }
                                    if($row["exceptuado"]==25){
                                        echo "Servicios de Hotelería.";
                                    }
                                    if($row["exceptuado"]==26){
                                        echo "Venta de mercadería ya elaborada de comercios minoristas, a través de plataformas de comercio electrónico,venta telefónica.";
                                    }
                                    if($row["exceptuado"]==27){
                                        echo "Actividad bancaria con turnos previos.";
                                    }
                                    if($row["exceptuado"]==28){
                                        echo "Actividad migratoria.";
                                    }
                                    if($row["exceptuado"]==29){
                                        echo "Autoridades y Agentes de Gobierno Nacional, Provincial o Municipal afectados a la emergencia.";
                                    }
                                    if($row["exceptuado"]==30){
                                        echo "Bomberos.";
                                    }
                                    if($row["exceptuado"]==31){
                                        echo "Control de tráfico aéreo.";
                                    }
                                    if($row["exceptuado"]==32){
                                        echo "El traslado hacia aeropuertos, puertos y/o terminales de ómnibus o ferroviarias de extranjeros que se encuentren en el país y que se dirijan a su país de origen.";
                                    }
                                    if($row["exceptuado"]==33){
                                        echo "El traslado hacia sus domicilios (dentro o fuera de la provincia) de residentes en el país que estén retornando a la REPÚBLICA ARGENTINA.";
                                    }
                                    if($row["exceptuado"]==34){
                                        echo "Fuerzas Armadas.";
                                    }
                                    if($row["exceptuado"]==35){
                                        echo "Fuerzas de Seguridad.";
                                    }
                                    if($row["exceptuado"]==36){
                                        echo "Personal afectado a obra pública.";
                                    }
                                    if($row["exceptuado"]==37){
                                        echo "Personal de los servicios de justicia";
                                    }
                                    if($row["exceptuado"]==38){
                                        echo "Personal de Salud";
                                    }
                                    if($row["exceptuado"]==39){
                                        echo "Personal diplomático y consular extranjero";
                                    }
                                    if($row["exceptuado"]==40){
                                        echo "Personas afectadas a la atención de comedores escolares, comunitarios y merenderos";
                                    }
                                    if($row["exceptuado"]==41){
                                        echo "Personas afectadas a la realización de servicios funerarios, entierros y cremaciones";
                                    }
                                    if($row["exceptuado"]==42){
                                        echo "Personas que acompañen a otra con discapacidad o con trastorno del espectro autista (TEA) &quot;dentro de los lugares de cercanía a su domicilio&quot;";
                                    }
                                    if($row["exceptuado"]==43){
                                        echo "Personas que deban asistir a otra con discapacidad, familiares que necesiten asistencia, personas mayores y menores de edad";
                                    }
                                    if($row["exceptuado"]==44){
                                        echo "Servicio Meteorológico Nacional";
                                    }
                                    if($row["exceptuado"]==45){
                                        echo "Actividad bancaria con atención al público, exclusivamente con sistema de turnos y respetando el protocolo establecido por el Banco  Central de la República Argentina (BCRA)";
                                    }
                                    if($row["exceptuado"]==46){
                                        echo "Actividades de telecomunicaciones, internet fija y móvil y servicios digitales";
                                    }
                                    if($row["exceptuado"]==47){
                                        echo "Actividades impostergables vinculadas con el comercio exterior";
                                    }
                                    if($row["exceptuado"]==48){
                                        echo "Actividades vinculadas a curtiembres, aserraderos y fábricas de productos de madera, fábricas de colchones y fábricas de maquinaria vial y agrícola";
                                    }
                                    if($row["exceptuado"]==49){
                                        echo "Actividades vinculadas a la inscripción, identificación y documentación de personas";
                                    }
                                    if($row["exceptuado"]==50){
                                        echo "Actividades vinculadas a la producción, distribución y comercialización forestal y minera";
                                    }
                                    if($row["exceptuado"]==51){
                                        echo "Actividades vinculadas a la protección ambiental minera";
                                    }
                                    if($row["exceptuado"]==52){
                                        echo "Actividades vinculadas a la venta de insumos y materiales de la construcción<";
                                    }
                                    if($row["exceptuado"]==53){
                                        echo "Actividades vinculadas con la producción, distribución y comercialización agropecuaria y de pesca";
                                    }
                                    if($row["exceptuado"]==54){
                                        echo "Cadena productiva e insumos";
                                    }
                                    if($row["exceptuado"]==55){
                                        echo "Combustibles líquidos, petróleo y gas";
                                    }
                                    if($row["exceptuado"]==56){
                                        echo "Comercios minoristas de proximidad";
                                    }
                                    if($row["exceptuado"]==57){
                                        echo "Curtiembres, para recibir la producción proveniente de los frigoríficos";
                                    }
                                    if($row["exceptuado"]==58){
                                        echo "De equipamiento médico";
                                    }
                                    if($row["exceptuado"]==59){
                                        echo "De higiene personal y limpieza<";
                                    }
                                    if($row["exceptuado"]==60){
                                        echo "Estaciones expendedoras de combustibles y generadores de energía";
                                    }
                                    if($row["exceptuado"]==61){
                                        echo "Fabricación de neumáticos; venta y reparación de los mismos exclusivamente para transporte público, vehículos de las fuerzas de seguridad y fuerzas armadas, vehículos afectados a las  prestaciones de salud o al  personal con autorización para circular, conforme la normativa vigente.";
                                    }
                                    if($row["exceptuado"]==62){
                                        echo "Farmacias";
                                    }
                                    if($row["exceptuado"]==63){
                                        echo "Ferreterías";
                                    }
                                    if($row["exceptuado"]==64){
                                        echo "Hoteles afectados a la emergencia sanitaria";
                                    }
                                    if($row["exceptuado"]==65){
                                        echo "Industrias de alimentación";
                                    }
                                    if($row["exceptuado"]==66){
                                        echo "Medicamentos, vacunas y otros insumos sanitarios";
                                    }
                                    if($row["exceptuado"]==67){
                                        echo "Ministros de los diferentes cultos a los efectos de brindar asistencia espiritual";
                                    }
                                    if($row["exceptuado"]==68){
                                        echo "Mutuales y cooperativas de crédito";
                                    }
                                    if($row["exceptuado"]==69){
                                        echo "Operación de aeropuertos y estacionamientos";
                                    }
                                    if($row["exceptuado"]==70){
                                        echo "Personal de S.E. Casa de Moneda, servicios de cajeros automáticos, transporte de caudales y todas aquellas actividades que el Banco Central de la República Argentina disponga imprescindibles para garantizar el funcionamiento del sistema de pagos";
                                    }
                                    if($row["exceptuado"]==71){
                                        echo "Personal que se desempeña en los servicios de comunicación audiovisuales, radiales y gráficos";
                                    }
                                    if($row["exceptuado"]==72){
                                        echo "Personas que deban atender una situación de fuerza mayor";
                                    }
                                    if($row["exceptuado"]==73){
                                        echo "Plantas de tratamiento/refinación de Petróleo y Gas";
                                    }
                                    if($row["exceptuado"]==74){
                                        echo "Producción y distribución de biocombustibles y de combustibles nucleares";
                                    }
                                    if($row["exceptuado"]==75){
                                        echo "Provisión de garrafas";
                                    }
                                    if($row["exceptuado"]==76){
                                        echo "Servicios esenciales de mantenimiento y fumigación";
                                    }
                                    if($row["exceptuado"]==77){
                                        echo "Servicios esenciales de vigilancia, limpieza y guardia";
                                    }
                                    if($row["exceptuado"]==78){
                                        echo "Supermercados mayoristas y minoristas";
                                    }
                                    if($row["exceptuado"]==79){
                                        echo "Talleres mecánicos para la atención de vehículos del transporte público, móviles afectados a las fuerzas de seguridad, vehículos afectados a las prestaciones de salud o al personal con autorización para circular, conforme la normativa vigente";
                                    }
                                    if($row["exceptuado"]==80){
                                        echo "Transporte y distribución de energía eléctrica";
                                    }
                                    if($row["exceptuado"]==81){
                                        echo "Venta a domicilio de artículos de librería e insumos informáticos";
                                    }
                                    if($row["exceptuado"]==82){
                                        echo "Venta de repuestos para los vehículos del transporte público, móviles afectados a las fuerzas de seguridad y al sistema sanitario";
                                    }
                                    if($row["exceptuado"]==83){
                                        echo "Veterinarias";
                                    }
                                    if($row["exceptuado"]==84){
                                        echo "Yacimientos de Petróleo y Gas";
                                    }
                                    if($row["exceptuado"]==85){
                                        echo "Atención de emergencias";
                                    }
                                    if($row["exceptuado"]==86){
                                        echo "El transporte de pasajeros para el traslado de personas que presten servicios o realicen actividades declarados esenciales en el marco de la emergencia pública declarada";
                                    }
                                    if($row["exceptuado"]==87){
                                        echo "Mantenimiento de los servicios básicos (agua, electricidad, gas, comunicaciones, etc.)";
                                    }
                                    if($row["exceptuado"]==88){
                                        echo "Recolección, transporte y tratamiento de residuos sólidos urbanos, peligrosos y patogénicos";
                                    }
                                    if($row["exceptuado"]==89){
                                        echo "Servicios de lavandería";
                                    }
                                    if($row["exceptuado"]==90){
                                        echo "Servicios postales y de distribución de paquetería";
                                    }
                                    if($row["exceptuado"]==91){
                                        echo "Transportes especiales para personas con discapacidad";
                                    }
                                    if($row["exceptuado"]==92){
                                        echo "Alimentos y Bebidas";
                                    }
                                    if($row["exceptuado"]==93){
                                        echo "Medicamentos";
                                    }
                                    if($row["exceptuado"]==94){
                                        echo "Productos de higiene";
                                    }
                                    if($row["exceptuado"]==95){
                                        echo "Productos de limpieza y otros insumos de necesidad. Otros de insumos para industria y comercio";
                                    }
                                    if($row["exceptuado"]==96){
                                        echo "Restaurantes, locales de comidas preparadas y locales de comidas rápidas (Solo sistema de reparto a domicilio)";
                                    }
                                
                                
                                
                                echo "</center></td>
                                </tr>
                                <tr>
                                <td><center><strong>Fecha de ingreso: </strong>" . $row["fechaingreso"]." ".$row["horaingreso"]."</center></td>
                                <td><center><strong>Fecha de ingreso: </strong>" . $row["fechaegreso"]." ".$row["horaegreso"]."</center></td>
                                </tr>
                                <tr>
                                <td><center><strong>Modelo del automovil: </strong>" . $row["modelo"]."</center></td>
                                <td><center><strong>Nro. Patente: </strong>" . $row["patente"]."</center></td>
                                <td><center><strong>Kilometraje: </strong>" . $row["kilometro"]."</center></td>
                                </tr>
                                <tr>
                                <td>&nbsp</td>
                                <td>&nbsp</td>
                                <td>&nbsp</td>
                                </tr>
                                <tr>
                                <td>&nbsp</td>
                                <td><center><a  href='regpers.php?id_reg=" .$row["id_reg"] ."'><i class='fas fa-user-edit fa-2x'></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class='btn-exit-pers' href='eliminar.php?id_reg=" .$row["id_reg"] ."'><i class='fas fa-user-times fa-2x'></i></a></center></td>
                                <td>&nbsp</td>
                                </tr>
                                </table>";

                                
                            
                                        }
                                    }
                            
                        echo "</table>";
                        $conn->close();
                                ?>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    

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