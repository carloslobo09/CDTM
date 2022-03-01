<?php 
function getlistaexcel()
{
  $mysqli = getConnexion();
  $query = 'SELECT id_reg, nombre, dni, fecha_nacimiento, domicilio, telefono, origen, destino,cargofuncion, descripcion,exceptuado,kilometro, fechaingreso, horaingreso, fechaegreso, horaegreso, modelo, patente, estado FROM registros where fechaingreso=date(now());' ;
  return $mysqli->query($query);
}