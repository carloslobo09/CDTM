<?php
function getConnexion(){

    $mysqli= new Mysqli('localhost','root','','controlador');
    if($mysqli->connect_errno) exit ('error de conexion: '. $mysqli->connect_errno);
    $mysqli->set_charset('utf8');
    return $mysqli;
}
?>