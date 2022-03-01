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
	<?Php
        include "registro.php";

        if(isset($_GET["id_reg"])){
            $id_reg=$_GET["id_reg"];
            $registro = new registros("","","","","","","","","","","","","","","","","","","");
            $registro->getbyId($id_reg);
            $nombre = $registro->getnombre(); 
            $dni = $registro->getdni();
            $fecha_nacimiento = $registro->getnacimiento(); 
            $domicilio = $registro->getdomicilio();
            $telefono = $registro->gettel(); 
            $cargofuncion = $registro->getcargofuncion();     
            $descripcion=$registro->getdescripcion();
            $exceptuado=$registro->getexceptuado();
            $kilometro=$registro->getkilometro();
            $origen=$registro->getorigen();
            $destino=$registro->getdestino();
            $fechaingreso=$registro->getfechaingreso();
            $horaingreso = $registro->gethoraingreso();  
            $fechaegreso=$registro->getfechaegreso();
			$horaegreso = $registro->gethoraegreso();     
			$modelo=$registro->getmodelo();
			$patente = $registro->getpatente(); 
			$estado = $registro->getestado();     
        
                  
        }
        else{
            $nombre = ""; 
            $dni = "";
            $fecha_nacimiento = "";
            $domicilio = "";
            $telefono =  "";
            $origen="";
            $destino="";
            $cargofuncion = "";
            $descripcion="";
            $exceptuado="";
            $kilometro="";
            $fechaingreso="";
            $horaingreso ="";
            $fechaegreso="";
			$horaegreso="";
			$modelo="";
			$patente="";
			$estado=1;
			$id_reg=0;
			
        }
        date_default_timezone_set('America/Buenos_Aires'); date('h:i:s A');
        if(isset($_POST["nombre"]) &&
        isset($_POST["dni"])&& 
        isset($_POST["fecha_nacimiento"]) &&
        isset($_POST["domicilio"])&& 
        isset($_POST["telefono"])  && 
        isset($_POST["origen"])  && 
        isset($_POST["destino"])  && 
        isset($_POST["cargofuncion"])&& 
        isset($_POST["descripcion"])  && 
        isset($_POST["exceptuado"])  && 
        isset($_POST["kilometro"])  && 
        isset($_POST["fechaingreso"])&& 
        isset($_POST["horaingreso"])  && 
        isset($_POST["fechaegreso"])&& 
		isset($_POST["horaegreso"])  && 
		isset($_POST["modelo"])&& 
		isset($_POST["patente"])  && 
		isset($_POST["estado"])  &&
        isset($_POST["id_reg"]) ){
            $id_reg = $_POST["id_reg"];
            $nombre = $_POST["nombre"];
            $dni = $_POST["dni"];
            $fecha_nacimiento= $_POST["fecha_nacimiento"];
            $domicilio = $_POST["domicilio"];
            $telefono = $_POST["telefono"];
            $origen= $_POST["origen"];
            $destino= $_POST["destino"];
            $cargofuncion = $_POST["cargofuncion"];
            $descripcion= $_POST["descripcion"];
            $exceptuado= $_POST["exceptuado"];
            $kilometro= $_POST["kilometro"];
            $fechaingreso= $_POST["fechaingreso"];
            $horaingreso = $_POST["horaingreso"];
            $fechaegreso= $_POST["fechaegreso"];
			$horaegreso= $_POST["horaegreso"];
			$modelo= $_POST["modelo"];
            $patente= $_POST["patente"];
			$estado= $_POST["estado"];
            $registro = new registros($id_reg,$nombre, $dni, $fecha_nacimiento, $domicilio, $telefono,$origen,$destino,$cargofuncion,$descripcion,$exceptuado,$kilometro,$fechaingreso, $horaingreso,$fechaegreso,$horaegreso,$modelo, $patente,$estado);
            $registro->conectar();
            $registro->creartabla();
            if($id_reg==0){
                //Es nuevo
                echo $registro->guardar();
                header("Location: /covid19/ingre.php");
                ob_end_flush();
                exit;
            }
            else{
                //Modificar
                echo $registro->modificar($id_reg);
                header("Location: /covid19/listtr.php");                
            }                        
        }    
        
      
    ?>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v4.0"></script>

	<div id="wrapper" class="">
		<nav class="navbar" id="navbarSupportedContent">
			<div class="collapse navbar-collapse">
				<p style="color:white;position:absolute;left:400;top:5;font-size:35px;text-shadow: 2px 0 0 #000, -2px 0 0 #000, 0 2px 0 #000, 0 -2px 0 #000, 1px 1px #000, -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000;">
					<strong>Control de transito Municipal</strong>
				</p>
				<ul class="navbar-nav mr-auto">
					<p style="color:white;position:absolute;left:1100;top:10;font-size:10px">Salta
						<br> Coronel Juan Solá
						<br> Est. Morillo</p>
					<img style="position:absolute;left:1200;top:15;font-size:10px" width="40px" src="salta.jpg">
				</ul>
			</div>
		</nav>
		<div id="sidebar-wrapper">
			<ul id="sidebar_menu" class="sidebar-nav">
				<li class="sidebar-brand">
					<a id="menu-toggle">COVID-19
						<i class="sub_icon fas fa-hospital-alt" style="font-size:30px"></i>
					</a>
				</li>
			</ul>
			<ul class="sidebar-nav" id="sidebar">
				<li>
					<a href="regpers.php">Transeúntes
						<i class="sub_icon fas fa-user"></i>
						</span>
					</a>
				</li>
				<li>
					<a href="ingre.php">Ingresantes
						<i class="sub_icon fas fa-door-open"></i>
					</a>
				</li>
				<li>
					<a href="listtr.php">Lista trans.
						<i class="sub_icon fas fa-list-alt"></i>
					</a>
				</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>
					<a  href="#">Salir
						<i class="sub_icon fas fa-door-open">
					</a>
					</i>
			</ul>
		</div>
		<div id="page-content-wrapper">
			<div class="page-content inset">
				<div class="container-fluid">
					<div class="row">
						<div class="col-11">
							<form class="formreg" method="post" action="regpers.php" name="tuformulario">
								<?php
								if (empty($fechaingreso)){
								echo "<h2 align='center'>Registro de Transeuntes</h2>";
								} else{
									echo "<h2 align='center'>Modificar : ".$nombre." DNI: ".$dni."</h2>";
								}
								?>
								<br>
								<div class="form-group">
									<input type="hidden" class="form-control" name="id_reg" id="id_reg" placeholder="" value="<?PHP echo $id_reg ?>">
									<input type="hidden" class="form-control" name="estado" id="estado" placeholder="" value="<?PHP echo $estado ?>">
									<table bgcolor="#cccccc" border="0" cellpadding="6" cellspacing="6" width="1150" height="470px">
										<tr>
											<td align="left">
												<b>Nombre</b>
											</td>
											<td>
												<input type="text" class="form-control" name="nombre" id="nombre" required value="<?PHP echo $nombre ?>">
											</td>
											<td align="left">
												<b>DNI</b>
											</td>
											<td>
												<input type="text" class="form-control" name="dni" id="dni" required value="<?PHP echo $dni ?>">
											</td>
											<td align="left">
												<b>Fecha de Nacimiento</b>
											</td>
											<td>
												<input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required value="<?PHP echo $fecha_nacimiento ?>">
											</td>
										</tr>
										<tr>
											<td align="left">
												<b>Telefono</b>
											</td>
											<td>
												<input type="text" class="form-control" name="telefono" id="telefono" required value="<?PHP echo $telefono ?>">
											</td>
											<td align="left">
												<b>Domicilio</b>
											</td>
											<td>
												<input type="text" class="form-control" name="domicilio" id="domicilio" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{5,60}" required value="<?PHP echo $domicilio ?>">
											</td>
											<td align="left">
												<b>Cargo/Funcion</b>
											</td>
											<td>
												<input type="text" class="form-control" name="cargofuncion" id="cargofuncion" value="<?PHP echo $cargofuncion ?>">
											</td>
										</tr>
										<tr>
											<td align="left">
												<b>Origen</b>
											</td>
											<td>
												<input type="text" class="form-control" name="origen" id="origen" required value="<?PHP echo $origen ?>">
											</td>
											<td align="left">
												<b>Destino</b>
											</td>
											<td>
												<input type="text" class="form-control" name="destino" id="destino" required value="<?PHP echo $destino ?>"> 
											</td>
											<td align="left">
												<b>Descripcion de Tareas</b>
											</td>
											<td>
												<input type="text" style="WIDTH: 228px; HEIGHT: 70px" class="form-control" name="descripcion" id="descripcion" ROWS=3 COLS=24 value="<?PHP echo $descripcion ?>">
											</td>
										</tr>
										<tr>
											<td align="left">
												<b>Tareas exceptuadas</b>
											</td>
											<td colspan="5">
												<select class="browser-default custom-select custom-select-lg" name='exceptuado' id='exceptuado'>
												<option value="" selected="selected">Seleccione un rubro de la lista</option>
												<optgroup label="ACTIVIDADES PERMITIDAS QUE SE INCORPORAN (ACTUALIZADAS AL 18/05/20)">
												<option value="1"<?php if($exceptuado==1){echo "selected='selected'";} ?>>Actividad aseguradora desarrollada por compañías aseguradoras, reaseguradoras e intermediarios.</option>
												<option value="2"<?php if($exceptuado==2){echo "selected='selected'";} ?>>Actividad de entrenamiento de pilotos, desarrollada a través de vuelos privados, en aeroclubes y en escuelas de vuelo.</option>
												<option value="3"<?php if($exceptuado==3){echo "selected='selected'";} ?>>Actividad Notarial (Decisión Administrativa 467/2020)</option>
												<option value="4"<?php if($exceptuado==4){echo "selected='selected'";} ?>>Actividad y servicio de mantenimiento y reparación de material rodante ferroviario, embarcaciones, buques y aeronaves.</option>
												<option value="5"<?php if($exceptuado==5){echo "selected='selected'";} ?>>Actividades religiosas individuales en iglesias, templos y lugares de culto de cercanía.</option>
												<option value="6"<?php if($exceptuado==6){echo "selected='selected'";} ?>>Artistas y Asistentes de la Industria o Actividad Audiovisual y las Artes Escénicas.</option>
												<option value="7"<?php if($exceptuado==7){echo "selected='selected'";} ?>>Caja de Seguridad Social para Abogados de la Provincia de Salta.</option>
												<option value="8"<?php if($exceptuado==8){echo "selected='selected'";} ?>>Círculo Médico de Salta.</option>
												<option value="9"<?php if($exceptuado==9){echo "selected='selected'";} ?>>Colegio de Abogados y Procuradores de la Provincia de Salta.</option>
												<option value="10"<?php if($exceptuado==10){echo "selected='selected'";} ?>>Comercio.</option>
												<option value="11"<?php if($exceptuado==11){echo "selected='selected'";} ?>>Concesionarias de los corredores viales nacionales, incluido el cobro de peaje.</option>
												<option value="12"<?php if($exceptuado==12){echo "selected='selected'";} ?>>Consejo Profesional de Ciencias Económicas de Salta.</option>
												<option value="13"<?php if($exceptuado==13){echo "selected='selected'";} ?>>Establecimientos para la atención de personas víctimas de violencia de género - Personal Afectado</option>
												<option value="14"<?php if($exceptuado==14){echo "selected='selected'";} ?>>Establecimientos que desarrollen actividades de cobranza de servicios e impuestos</option>
												<option value="15"<?php if($exceptuado==15){echo "selected='selected'";} ?>>Fabricación y provisión de insumos y repuestos indisp. p/la prestación del servicio de transporte ferroviario, aéreo, fluvial o marítimo.</option>
												<option value="16"<?php if($exceptuado==16){echo "selected='selected'";} ?>>Peluquería.</option>
												<option value="17"<?php if($exceptuado==17){echo "selected='selected'";} ?>>Peritos y liquidadores de siniestros de las compañías aseguradoras.</option>
												<option value="18"<?php if($exceptuado==18){echo "selected='selected'";} ?>>Personal de Casa Particulares.</option>
												<option value="19"<?php if($exceptuado==19){echo "selected='selected'";} ?>>Personal del ANSES.</option>
												<option value="20"<?php if($exceptuado==20){echo "selected='selected'";} ?>>Personas afectadas al Desarrollo de Obra Privada.</option>
												<option value="21"<?php if($exceptuado==21){echo "selected='selected'";} ?>>Productores Asesores de Seguros.</option>
												<option value="22"<?php if($exceptuado==22){echo "selected='selected'";} ?>>Profesionales y técnicos especialistas en seguridad e higiene laboral.</option>
												<option value="23"<?php if($exceptuado==23){echo "selected='selected'";} ?>>Profesiones Liberales.</option>
												<option value="24"<?php if($exceptuado==24){echo "selected='selected'";} ?>>Servicio de Mantenimiento.</option>
												<option value="25"<?php if($exceptuado==25){echo "selected='selected'";} ?>>Servicios de Hotelería.</option>
												<option value="26"<?php if($exceptuado==26){echo "selected='selected'";} ?>>Venta de mercadería ya elaborada de comercios minoristas, a través de plataformas de comercio electrónico,venta telefónica.</option>
												</optgroup><optgroup label="PARTICULARES O DE EMPRESAS">
												<option value="27"<?php if($exceptuado==27){echo "selected='selected'";} ?>>Actividad bancaria con turnos previos.</option>
												<option value="28"<?php if($exceptuado==28){echo "selected='selected'";} ?>>Actividad migratoria.</option>
												<option value="29"<?php if($exceptuado==29){echo "selected='selected'";} ?>>Autoridades y Agentes de Gobierno Nacional, Provincial o Municipal afectados a la emergencia.</option>
												<option value="30"<?php if($exceptuado==30){echo "selected='selected'";} ?>>Bomberos.</option>
												<option value="31"<?php if($exceptuado==31){echo "selected='selected'";} ?>>Control de tráfico aéreo.</option>
												<option value="32"<?php if($exceptuado==32){echo "selected='selected'";} ?>>El traslado hacia aeropuertos, puertos y/o terminales de ómnibus o ferroviarias de extranjeros que se encuentren en el país y que se dirijan a su país de origen.</option>
												<option value="33"<?php if($exceptuado==33){echo "selected='selected'";} ?>>El traslado hacia sus domicilios (dentro o fuera de la provincia) de residentes en el país que estén retornando a la REPÚBLICA ARGENTINA.</option>
												<option value="34"<?php if($exceptuado==34){echo "selected='selected'";} ?>>Fuerzas Armadas.</option>
												<option value="35"<?php if($exceptuado==35){echo "selected='selected'";} ?>>Fuerzas de Seguridad.</option>
												<option value="36"<?php if($exceptuado==36){echo "selected='selected'";} ?>>Personal afectado a obra pública.</option>
												<option value="37"<?php if($exceptuado==37){echo "selected='selected'";} ?>>Personal de los servicios de justicia</option>
												<option value="38"<?php if($exceptuado==38){echo "selected='selected'";} ?>>Personal de Salud</option>
												<option value="39"<?php if($exceptuado==39){echo "selected='selected'";} ?>>Personal diplomático y consular extranjero</option>
												<option value="40"<?php if($exceptuado==40){echo "selected='selected'";} ?>>Personas afectadas a la atención de comedores escolares, comunitarios y merenderos</option>
												<option value="41"<?php if($exceptuado==41){echo "selected='selected'";} ?>>Personas afectadas a la realización de servicios funerarios, entierros y cremaciones</option>
												<option value="42"<?php if($exceptuado==42){echo "selected='selected'";} ?>>Personas que acompañen a otra con discapacidad o con trastorno del espectro autista (TEA) &quot;dentro de los lugares de cercanía a su domicilio&quot;</option>
												<option value="43"<?php if($exceptuado==43){echo "selected='selected'";} ?>>Personas que deban asistir a otra con discapacidad, familiares que necesiten asistencia, personas mayores y menores de edad</option>
												<option value="44"<?php if($exceptuado==44){echo "selected='selected'";} ?>>Servicio Meteorológico Nacional</option>
												</optgroup><optgroup label="PERSONAL QUE CONCURRE A TRABAJAR A">
												<option value="45"<?php if($exceptuado==45){echo "selected='selected'";} ?>>Actividad bancaria con atención al público, exclusivamente con sistema de turnos y respetando el protocolo establecido por el Banco  Central de la República Argentina (BCRA)</option>
												<option value="46"<?php if($exceptuado==46){echo "selected='selected'";} ?>>Actividades de telecomunicaciones, internet fija y móvil y servicios digitales</option>
												<option value="47"<?php if($exceptuado==47){echo "selected='selected'";} ?>>Actividades impostergables vinculadas con el comercio exterior</option>
												<option value="48"<?php if($exceptuado==48){echo "selected='selected'";} ?>>Actividades vinculadas a curtiembres, aserraderos y fábricas de productos de madera, fábricas de colchones y fábricas de maquinaria vial y agrícola</option>
												<option value="49"<?php if($exceptuado==49){echo "selected='selected'";} ?>>Actividades vinculadas a la inscripción, identificación y documentación de personas</option>
												<option value="50"<?php if($exceptuado==50){echo "selected='selected'";} ?>>Actividades vinculadas a la producción, distribución y comercialización forestal y minera</option>
												<option value="51"<?php if($exceptuado==51){echo "selected='selected'";} ?>>Actividades vinculadas a la protección ambiental minera</option>
												<option value="52"<?php if($exceptuado==52){echo "selected='selected'";} ?>>Actividades vinculadas a la venta de insumos y materiales de la construcción</option>
												<option value="53"<?php if($exceptuado==53){echo "selected='selected'";} ?>>Actividades vinculadas con la producción, distribución y comercialización agropecuaria y de pesca</option>
												<option value="54"<?php if($exceptuado==54){echo "selected='selected'";} ?>>Cadena productiva e insumos</option>
												<option value="55"<?php if($exceptuado==55){echo "selected='selected'";} ?>>Combustibles líquidos, petróleo y gas</option>
												<option value="56"<?php if($exceptuado==56){echo "selected='selected'";} ?>>Comercios minoristas de proximidad</option>
												<option value="57"<?php if($exceptuado==57){echo "selected='selected'";} ?>>Curtiembres, para recibir la producción proveniente de los frigoríficos</option>
												<option value="58"<?php if($exceptuado==58){echo "selected='selected'";} ?>>De equipamiento médico</option>
												<option value="59"<?php if($exceptuado==59){echo "selected='selected'";} ?>>De higiene personal y limpieza</option>
												<option value="60"<?php if($exceptuado==60){echo "selected='selected'";} ?>>Estaciones expendedoras de combustibles y generadores de energía</option>
												<option value="61"<?php if($exceptuado==61){echo "selected='selected'";} ?>>Fabricación de neumáticos; venta y reparación de los mismos exclusivamente para transporte público, vehículos de las fuerzas de seguridad y fuerzas armadas, vehículos afectados a las  prestaciones de salud o al  personal con autorización para circular, conforme la normativa vigente.</option>
												<option value="62"<?php if($exceptuado==62){echo "selected='selected'";} ?>>Farmacias</option>
												<option value="63"<?php if($exceptuado==63){echo "selected='selected'";} ?>>Ferreterías</option>
												<option value="64"<?php if($exceptuado==64){echo "selected='selected'";} ?>>Hoteles afectados a la emergencia sanitaria</option>
												<option value="65"<?php if($exceptuado==65){echo "selected='selected'";} ?>>Industrias de alimentación</option>
												<option value="66"<?php if($exceptuado==66){echo "selected='selected'";} ?>>Medicamentos, vacunas y otros insumos sanitarios</option>
												<option value="67"<?php if($exceptuado==67){echo "selected='selected'";} ?>>Ministros de los diferentes cultos a los efectos de brindar asistencia espiritual</option>
												<option value="68"<?php if($exceptuado==68){echo "selected='selected'";} ?>>Mutuales y cooperativas de crédito</option>
												<option value="69"<?php if($exceptuado==69){echo "selected='selected'";} ?>>Operación de aeropuertos y estacionamientos</option>
												<option value="70"<?php if($exceptuado==70){echo "selected='selected'";} ?>>Personal de S.E. Casa de Moneda, servicios de cajeros automáticos, transporte de caudales y todas aquellas actividades que el Banco Central de la República Argentina disponga imprescindibles para garantizar el funcionamiento del sistema de pagos</option>
												<option value="71"<?php if($exceptuado==71){echo "selected='selected'";} ?>>Personal que se desempeña en los servicios de comunicación audiovisuales, radiales y gráficos</option>
												<option value="72"<?php if($exceptuado==72){echo "selected='selected'";} ?>>Personas que deban atender una situación de fuerza mayor</option>
												<option value="73"<?php if($exceptuado==73){echo "selected='selected'";} ?>>Plantas de tratamiento/refinación de Petróleo y Gas</option>
												<option value="74"<?php if($exceptuado==74){echo "selected='selected'";} ?>>Producción y distribución de biocombustibles y de combustibles nucleares</option>
												<option value="75"<?php if($exceptuado==75){echo "selected='selected'";} ?>>Provisión de garrafas</option>
												<option value="76"<?php if($exceptuado==76){echo "selected='selected'";} ?>>Servicios esenciales de mantenimiento y fumigación</option>
												<option value="77"<?php if($exceptuado==77){echo "selected='selected'";} ?>>Servicios esenciales de vigilancia, limpieza y guardia</option>
												<option value="78"<?php if($exceptuado==78){echo "selected='selected'";} ?>>Supermercados mayoristas y minoristas</option>
												<option value="79"<?php if($exceptuado==79){echo "selected='selected'";} ?>>Talleres mecánicos para la atención de vehículos del transporte público, móviles afectados a las fuerzas de seguridad, vehículos afectados a las prestaciones de salud o al personal con autorización para circular, conforme la normativa vigente</option>
												<option value="80"<?php if($exceptuado==80){echo "selected='selected'";} ?>>Transporte y distribución de energía eléctrica</option>
												<option value="81"<?php if($exceptuado==81){echo "selected='selected'";} ?>>Venta a domicilio de artículos de librería e insumos informáticos</option>
												<option value="82"<?php if($exceptuado==82){echo "selected='selected'";} ?>>Venta de repuestos para los vehículos del transporte público, móviles afectados a las fuerzas de seguridad y al sistema sanitario</option>
												<option value="83"<?php if($exceptuado==83){echo "selected='selected'";} ?>>Veterinarias</option>
												<option value="84"<?php if($exceptuado==84){echo "selected='selected'";} ?>>Yacimientos de Petróleo y Gas</option>
												</optgroup><optgroup label="SERVICIOS">
												<option value="85"<?php if($exceptuado==85){echo "selected='selected'";} ?>>Atención de emergencias</option>
												<option value="86"<?php if($exceptuado==86){echo "selected='selected'";} ?>>El transporte de pasajeros para el traslado de personas que presten servicios o realicen actividades declarados esenciales en el marco de la emergencia pública declarada</option>
												<option value="87"<?php if($exceptuado==87){echo "selected='selected'";} ?>>Mantenimiento de los servicios básicos (agua, electricidad, gas, comunicaciones, etc.)</option>
												<option value="88"<?php if($exceptuado==88){echo "selected='selected'";} ?>>Recolección, transporte y tratamiento de residuos sólidos urbanos, peligrosos y patogénicos</option>
												<option value="89"<?php if($exceptuado==89){echo "selected='selected'";} ?>>Servicios de lavandería</option>
												<option value="90"<?php if($exceptuado==90){echo "selected='selected'";} ?>>Servicios postales y de distribución de paquetería</option>
												<option value="91"<?php if($exceptuado==91){echo "selected='selected'";} ?>>Transportes especiales para personas con discapacidad</option>
												</optgroup><optgroup label="TRANSPORTE Y DISTRIBUCION">
												<option value="92"<?php if($exceptuado==92){echo "selected='selected'";} ?>>Alimentos y Bebidas</option>
												<option value="93"<?php if($exceptuado==93){echo "selected='selected'";} ?>>Medicamentos</option>
												<option value="94"<?php if($exceptuado==94){echo "selected='selected'";} ?>>Productos de higiene</option>
												<option value="95"<?php if($exceptuado==95){echo "selected='selected'";} ?>>Productos de limpieza y otros insumos de necesidad. Otros de insumos para industria y comercio</option>
												<option value="96"<?php if($exceptuado==96){echo "selected='selected'";} ?>>Restaurantes, locales de comidas preparadas y locales de comidas rápidas (Solo sistema de reparto a domicilio)</option></optgroup>
												</select>
											</td>
										</tr>
										<tr>
											<td>
												&nbsp;
											</td>
											<td align="center">
												<b>Fecha de ingreso</b>
											</td>
											<td><?php
												if(empty($fechaingreso)){echo 
												"<input type='text' class='form-control' disabled='disabled' value=".date('d/m/Y').">";
												} else{
													echo "<input type='text' class='form-control' disabled='disabled' value=".$fechaingreso.">";
												}
												?>
												<input type="hidden" class="form-control" name="fechaingreso" id="fechaingreso"  value="<?PHP echo $fechaingreso ?>">
												<input type="hidden" class="form-control" name="horaingreso" id="horaingreso"  value="<?PHP echo $horaingreso ?>">
											</td>
											<td align="center">
												<b>Fecha de egreso</b>
											</td>
											<td>
												<input type="date" class="form-control" name="fechaegreso" id="fechaegreso" required value="<?PHP echo $fechaegreso ?>">
											</td>
											<td>
												&nbsp;
											</td>
										</tr>
										<tr>
											<td>
												&nbsp;
											</td>
											<td align="center">
												<b>Hora de ingreso</b>
											</td>
											<td>
											<?php
												if(empty($horaingreso)){echo 
												"<input type='text' class='form-control' disabled='disabled' value=".date('H:i A').">";
												} else { 
													echo "<input type='text' class='form-control' disabled='disabled' value=".$horaingreso.">";
												}
												?>
											</td>
											<td align="center">
												<b>Hora de egreso</b>
											</td>
											<td>
												<input type="time" class="form-control" name="horaegreso" id="horaegreso" required value="<?PHP echo $horaegreso ?>">	
											</td>
											<td>
												&nbsp;
											</td>
										</tr>
										<tr>
											<td align="center">
												<b>Modelo</b>
											</td>
											<td>
												<input type="text" class="form-control" name="modelo" id="modelo" value="<?PHP echo $modelo ?>"> 
											</td>
											<td align="center">
												<b>Patente</b>
											</td>
											<td>
												<input type="text" class="form-control" name="patente" id="patente" required value="<?PHP echo $patente ?>"> 
											</td>
											<td align="center">
												<b>Kilometraje</b>
											</td>
											<td>
												<input type="text" class="form-control" name="kilometro" id="kilometro" value="<?PHP echo $kilometro ?>">
											</td>
										</tr>
										<tr>
											<td>
												<b>&nbsp;</b>
											</td>
											<td align="right">
												<b>&nbsp;</b>
											</td>
											<?php
											if (empty($fechaingreso)){
											echo "<td align='right'>
												<button type='submit' class='btn btn-primary btn-guardar-alum'>Guardar</button>
												</td>
												<td align='center'>
												<a href='regpers.php' class='btn btn-danger'>Cancelar</a>";
											} else{
											echo "<td align='right'>
												<button type='submit' class='btn btn-primary btn-modificar-pers'>Modificar</button>
												</td>
												<td align='center'>
												<a href='listtr.php' class='btn btn-danger'>Cancelar</a>";
											}
											?>
												
											</td>
											<td>
												<b>&nbsp;</b>
											</td>

										</tr>
									</table>

								</div>


							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>


	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="op1.js"></script>
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