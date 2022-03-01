<?php 
require_once 'excel.php';

activeErrorReporting();
noCli();

require_once 'PHPExcel/Classes/PHPExcel.php';
require_once 'conexionexcel.php';
require_once 'listaexcel.php';

$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Developero")
               ->setLastModifiedBy("Maarten Balliauw")
               ->setTitle("Office 2007 XLS Test Document")
               ->setSubject("Office 2007 XLS Test Document")
               ->setDescription("Test document for Office 2007 XLS, generated using PHP classes.")
               ->setKeywords("office 2007 openxml php")
               ->setCategory("Test result file");

$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(12);            

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NOMBRE')
            ->setCellValue('B1', 'DNI')
            ->setCellValue('C1', 'FECHA NACIMIENTO')
            ->setCellValue('D1', 'DOMICILIO')
            ->setCellValue('E1', 'TELEFONO')
            ->setCellValue('F1', 'ORIGEN')
            ->setCellValue('G1', 'DESTINO')
            ->setCellValue('H1', 'CARGO/FUNCION')
            ->setCellValue('I1', 'DESCRIPCION')
            ->setCellValue('J1', 'EXCEPTUADO')
            ->setCellValue('K1', 'KILOMETRO')
            ->setCellValue('L1', 'FECHA INGRESO')
            ->setCellValue('M1', 'HORA INGRESO')
            ->setCellValue('N1', 'FECHA EGRESO')
            ->setCellValue('O1', 'HORA EGRESO')
            ->setCellValue('P1', 'MODELO')
            ->setCellValue('Q1', 'PATENTE')
            ->setCellValue('R1', 'ESTADO');

$informe = getlistaexcel();
$i = 2;
while($row = $informe->fetch_array(MYSQLI_ASSOC))
{
    $exc=0;
    if($row["exceptuado"]==0){
        $exc="---";
    }
    if($row["exceptuado"]==1){
        $exc="Actividad aseguradora desarrollada por compañías aseguradoras, reaseguradoras e intermediarios.";
    }
    if($row["exceptuado"]==2){
        $exc="Actividad de entrenamiento de pilotos, desarrollada a través de vuelos privados, en aeroclubes y en escuelas de vuelo.";
    }
    if($row["exceptuado"]==3){
        $exc="Actividad Notarial (Decisión Administrativa 467/2020)";
    }
    if($row["exceptuado"]==4){
        $exc="Actividad y servicio de mantenimiento y reparación de material rodante ferroviario, embarcaciones, buques y aeronaves.";
    }
    if($row["exceptuado"]==5){
        $exc="Actividades religiosas individuales en iglesias, templos y lugares de culto de cercanía.";
    }
    if($row["exceptuado"]==6){
        $exc="Artistas y Asistentes de la Industria o Actividad Audiovisual y las Artes Escénicas.";
    }
    if($row["exceptuado"]==7){
        $exc="Caja de Seguridad Social para Abogados de la Provincia de Salta.";
    }
    if($row["exceptuado"]==8){
        $exc="Círculo Médico de Salta.";
    }
    if($row["exceptuado"]==9){
        $exc="Colegio de Abogados y Procuradores de la Provincia de Salta.";
    }
    if($row["exceptuado"]==10){
        $exc="Comercio.";
    }
    if($row["exceptuado"]==11){
        $exc="Concesionarias de los corredores viales nacionales, incluido el cobro de peaje.";
    }
    if($row["exceptuado"]==12){
        $exc="Consejo Profesional de Ciencias Económicas de Salta.";
    }
    if($row["exceptuado"]==13){
        $exc="Establecimientos para la atención de personas víctimas de violencia de género - Personal Afectado";
    }
    if($row["exceptuado"]==14){
        $exc="Establecimientos que desarrollen actividades de cobranza de servicios e impuestos";
    }
    if($row["exceptuado"]==15){
        $exc="Fabricación y provisión de insumos y repuestos indisp. p/la prestación del servicio de transporte ferroviario, aéreo, fluvial o marítimo.";
    }
    if($row["exceptuado"]==16){
        $exc="Peluquería.";
    }
    if($row["exceptuado"]==17){
        $exc="Peritos y liquidadores de siniestros de las compañías aseguradoras.";
    }
    if($row["exceptuado"]==18){
        $exc="Personal de Casa Particulares.";
    }
    if($row["exceptuado"]==19){
        $exc="Personal del ANSES.";
    }
    if($row["exceptuado"]==20){
        $exc="Personas afectadas al Desarrollo de Obra Privada.";
    }
    if($row["exceptuado"]==21){
        $exc="Productores Asesores de Seguros.";
    }
    if($row["exceptuado"]==22){
        $exc="Profesionales y técnicos especialistas en seguridad e higiene laboral.";
    }
    if($row["exceptuado"]==23){
        $exc="Profesiones Liberales.";
    }
    if($row["exceptuado"]==24){
        $exc="Servicio de Mantenimiento.";
    }
    if($row["exceptuado"]==25){
        $exc="Servicios de Hotelería.";
    }
    if($row["exceptuado"]==26){
        $exc="Venta de mercadería ya elaborada de comercios minoristas, a través de plataformas de comercio electrónico,venta telefónica.";
    }
    if($row["exceptuado"]==27){
        $exc="Actividad bancaria con turnos previos.";
    }
    if($row["exceptuado"]==28){
        $exc="Actividad migratoria.";
    }
    if($row["exceptuado"]==29){
        $exc="Autoridades y Agentes de Gobierno Nacional, Provincial o Municipal afectados a la emergencia.";
    }
    if($row["exceptuado"]==30){
        $exc="Bomberos.";
    }
    if($row["exceptuado"]==31){
        $exc="Control de tráfico aéreo.";
    }
    if($row["exceptuado"]==32){
        $exc="El traslado hacia aeropuertos, puertos y/o terminales de ómnibus o ferroviarias de extranjeros que se encuentren en el país y que se dirijan a su país de origen.";
    }
    if($row["exceptuado"]==33){
        $exc="El traslado hacia sus domicilios (dentro o fuera de la provincia) de residentes en el país que estén retornando a la REPÚBLICA ARGENTINA.";
    }
    if($row["exceptuado"]==34){
        $exc="Fuerzas Armadas.";
    }
    if($row["exceptuado"]==35){
        $exc="Fuerzas de Seguridad.";
    }
    if($row["exceptuado"]==36){
        $exc="Personal afectado a obra pública.";
    }
    if($row["exceptuado"]==37){
        $exc="Personal de los servicios de justicia";
    }
    if($row["exceptuado"]==38){
        $exc="Personal de Salud";
    }
    if($row["exceptuado"]==39){
        $exc="Personal diplomático y consular extranjero";
    }
    if($row["exceptuado"]==40){
        $exc="Personas afectadas a la atención de comedores escolares, comunitarios y merenderos";
    }
    if($row["exceptuado"]==41){
        $exc="Personas afectadas a la realización de servicios funerarios, entierros y cremaciones";
    }
    if($row["exceptuado"]==42){
        $exc="Personas que acompañen a otra con discapacidad o con trastorno del espectro autista (TEA) &quot;dentro de los lugares de cercanía a su domicilio&quot;";
    }
    if($row["exceptuado"]==43){
        $exc="Personas que deban asistir a otra con discapacidad, familiares que necesiten asistencia, personas mayores y menores de edad";
    }
    if($row["exceptuado"]==44){
        $exc="Servicio Meteorológico Nacional";
    }
    if($row["exceptuado"]==45){
        $exc="Actividad bancaria con atención al público, exclusivamente con sistema de turnos y respetando el protocolo establecido por el Banco  Central de la República Argentina (BCRA)";
    }
    if($row["exceptuado"]==46){
        $exc="Actividades de telecomunicaciones, internet fija y móvil y servicios digitales";
    }
    if($row["exceptuado"]==47){
        $exc="Actividades impostergables vinculadas con el comercio exterior";
    }
    if($row["exceptuado"]==48){
        $exc="Actividades vinculadas a curtiembres, aserraderos y fábricas de productos de madera, fábricas de colchones y fábricas de maquinaria vial y agrícola";
    }
    if($row["exceptuado"]==49){
        $exc="Actividades vinculadas a la inscripción, identificación y documentación de personas";
    }
    if($row["exceptuado"]==50){
        $exc="Actividades vinculadas a la producción, distribución y comercialización forestal y minera";
    }
    if($row["exceptuado"]==51){
        $exc="Actividades vinculadas a la protección ambiental minera";
    }
    if($row["exceptuado"]==52){
        $exc="Actividades vinculadas a la venta de insumos y materiales de la construcción";
    }
    if($row["exceptuado"]==53){
        $exc="Actividades vinculadas con la producción, distribución y comercialización agropecuaria y de pesca";
    }
    if($row["exceptuado"]==54){
        $exc="Cadena productiva e insumos";
    }
    if($row["exceptuado"]==55){
        $exc="Combustibles líquidos, petróleo y gas";
    }
    if($row["exceptuado"]==56){
        $exc="Comercios minoristas de proximidad";
    }
    if($row["exceptuado"]==57){
        $exc="Curtiembres, para recibir la producción proveniente de los frigoríficos";
    }
    if($row["exceptuado"]==58){
        $exc="De equipamiento médico";
    }
    if($row["exceptuado"]==59){
        $exc="De higiene personal y limpieza";
    }
    if($row["exceptuado"]==60){
        $exc="Estaciones expendedoras de combustibles y generadores de energía";
    }
    if($row["exceptuado"]==61){
        $exc="Fabricación de neumáticos; venta y reparación de los mismos exclusivamente para transporte público, vehículos de las fuerzas de seguridad y fuerzas armadas, vehículos afectados a las  prestaciones de salud o al  personal con autorización para circular, conforme la normativa vigente.";
    }
    if($row["exceptuado"]==62){
        $exc="Farmacias";
    }
    if($row["exceptuado"]==63){
        $exc="Ferreterías";
    }
    if($row["exceptuado"]==64){
        $exc="Hoteles afectados a la emergencia sanitaria";
    }
    if($row["exceptuado"]==65){
        $exc="Industrias de alimentación";
    }
    if($row["exceptuado"]==66){
        $exc="Medicamentos, vacunas y otros insumos sanitarios";
    }
    if($row["exceptuado"]==67){
        $exc="Ministros de los diferentes cultos a los efectos de brindar asistencia espiritual";
    }
    if($row["exceptuado"]==68){
        $exc="Mutuales y cooperativas de crédito";
    }
    if($row["exceptuado"]==69){
        $exc="Operación de aeropuertos y estacionamientos";
    }
    if($row["exceptuado"]==70){
        $exc="Personal de S.E. Casa de Moneda, servicios de cajeros automáticos, transporte de caudales y todas aquellas actividades que el Banco Central de la República Argentina disponga imprescindibles para garantizar el funcionamiento del sistema de pagos";
    }
    if($row["exceptuado"]==71){
        $exc="Personal que se desempeña en los servicios de comunicación audiovisuales, radiales y gráficos";
    }
    if($row["exceptuado"]==72){
        $exc="Personas que deban atender una situación de fuerza mayor";
    }
    if($row["exceptuado"]==73){
        $exc="Plantas de tratamiento/refinación de Petróleo y Gas";
    }
    if($row["exceptuado"]==74){
        $exc="Producción y distribución de biocombustibles y de combustibles nucleares";
    }
    if($row["exceptuado"]==75){
        $exc="Provisión de garrafas";
    }
    if($row["exceptuado"]==76){
        $exc="Servicios esenciales de mantenimiento y fumigación";
    }
    if($row["exceptuado"]==77){
        $exc="Servicios esenciales de vigilancia, limpieza y guardia";
    }
    if($row["exceptuado"]==78){
        $exc="Supermercados mayoristas y minoristas";
    }
    if($row["exceptuado"]==79){
        $exc="Talleres mecánicos para la atención de vehículos del transporte público, móviles afectados a las fuerzas de seguridad, vehículos afectados a las prestaciones de salud o al personal con autorización para circular, conforme la normativa vigente";
    }
    if($row["exceptuado"]==80){
        $exc="Transporte y distribución de energía eléctrica";
    }
    if($row["exceptuado"]==81){
        $exc="Venta a domicilio de artículos de librería e insumos informáticos";
    }
    if($row["exceptuado"]==82){
        $exc="Venta de repuestos para los vehículos del transporte público, móviles afectados a las fuerzas de seguridad y al sistema sanitario";
    }
    if($row["exceptuado"]==83){
        $exc="Veterinarias";
    }
    if($row["exceptuado"]==84){
        $exc="Yacimientos de Petróleo y Gas";
    }
    if($row["exceptuado"]==85){
        $exc="Atención de emergencias";
    }
    if($row["exceptuado"]==86){
        $exc="El transporte de pasajeros para el traslado de personas que presten servicios o realicen actividades declarados esenciales en el marco de la emergencia pública declarada";
    }
    if($row["exceptuado"]==87){
        $exc="Mantenimiento de los servicios básicos (agua, electricidad, gas, comunicaciones, etc.)";
    }
    if($row["exceptuado"]==88){
        $exc="Recolección, transporte y tratamiento de residuos sólidos urbanos, peligrosos y patogénicos";
    }
    if($row["exceptuado"]==89){
        $exc="Servicios de lavandería";
    }
    if($row["exceptuado"]==90){
        $exc="Servicios postales y de distribución de paquetería";
    }
    if($row["exceptuado"]==91){
        $exc="Transportes especiales para personas con discapacidad";
    }
    if($row["exceptuado"]==92){
        $exc="Alimentos y Bebidas";
    }
    if($row["exceptuado"]==93){
        $exc="Medicamentos";
    }
    if($row["exceptuado"]==94){
        $exc="Productos de higiene";
    }
    if($row["exceptuado"]==95){
        $exc="Productos de limpieza y otros insumos de necesidad. Otros de insumos para industria y comercio";
    }
    if($row["exceptuado"]==96){
        $exc="Restaurantes, locales de comidas preparadas y locales de comidas rápidas (Solo sistema de reparto a domicilio)";
    }
    $est=0;
    if ($row["estado"]==1) {
        $est="No cumplimento";
    }
    if ($row["estado"]==0) {
        $est="Cumplimento";
    }
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A$i", $row['nombre'])
            ->setCellValue("B$i", $row['dni'])
            ->setCellValue("C$i", $row['fecha_nacimiento'])
            ->setCellValue("D$i", $row['domicilio'])
            ->setCellValue("E$i", $row['telefono'])
            ->setCellValue("F$i", $row['origen'])
            ->setCellValue("G$i", $row['destino'])
            ->setCellValue("H$i", $row['cargofuncion'])
            ->setCellValue("I$i", $row['descripcion'])
            
            ->setCellValue("J$i", $exc)
            
            ->setCellValue("K$i", $row['kilometro'])
            ->setCellValue("L$i", $row['fechaingreso'])
            ->setCellValue("M$i", $row['horaingreso'])
            ->setCellValue("N$i", $row['fechaegreso'])
            ->setCellValue("O$i", $row['horaegreso'])
            ->setCellValue("P$i", $row['modelo'])
            ->setCellValue("Q$i", $row['patente'])
            ->setCellValue("R$i", $est);
$i++;
}

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);


$objPHPExcel->getActiveSheet()->setTitle('Informe del dia');

$objPHPExcel->setActiveSheetIndex(0);

getHeaders();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;