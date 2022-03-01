<?php 
require_once 'conexionexcel.php';
require_once 'listaexcel.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Exportar informe Excel</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <div class="page-header text-left">
    <h1>Exportar informe <small>con PHPExcel y MySQL</small></h1>
  </div>
  <a href="createexcel.php" target="_blank">Descargar informe en excel</a>
  <div class="row">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>NOMBRE</th>
          <th>DNI</th>
          <th>FECHA NACIMIENTO</th>
          <th>DOMICILIO</th>
          <th>TELEFONO</th>
          <th>ORIGEN</th>
          <th>DESTINO</th>
          <th>CARGO/FUNCION</th>
          <th>DESCRIPCION</th>
          <th>EXCEPTUADO</th>
          <th>KILOMETRO</th>
          <th>FECHA INGRESO</th>
          <th>HORA INGRESO</th>
          <th>FECHA EGRESO</th>
          <th>HORA EGRESO</th>
          <th>MODELO</th>
          <th>PATENTE</th>
          <th>ESTADO</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $informe = getlistaexcel();
      while($row = $informe->fetch_array(MYSQLI_ASSOC))
      {
        echo '<tr>';
        echo "<td>$row[id_reg]</td>";
        echo "<td>$row[nombre]</td>";
        echo "<td>$row[dni]</td>";
        echo "<td>$row[fecha_nacimiento]</td>";
        echo "<td>$row[domicilio]</td>";
        echo "<td>$row[telefono]</td>";
        echo "<td>$row[origen]</td>";
        echo "<td>$row[destino]</td>";
        echo "<td>$row[cargofuncion]</td>";
        echo "<td>$row[descripcion]</td>";
        echo "<td>$row[exceptuado]</td>";
        echo "<td>$row[kilometro]</td>";
        echo "<td>$row[fechaingreso]</td>";
        echo "<td>$row[horaingreso]</td>";
        echo "<td>$row[fechaegreso]</td>";
        echo "<td>$row[horaegreso]</td>";
        echo "<td>$row[modelo]</td>";
        echo "<td>$row[patente]</td>";
        echo "<td>$row[estado]</td>";
        echo '</tr>';
      }
      ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>