<?php
include "conexion.php";
class Registros {
    private $id_reg;
    private $nombre;
    private $dni;
    private $fecha_nacimiento;
    private $domicilio;
    private $telefono;
    private $origen;
    private $destino;
    private $cargofuncion;
    private $descripcion;
    private $exceptuado;
    private $kilometro;
    private $fechaingreso;
    private $horaingreso;
    private $fechaegreso;
    private $horaegreso;
    private $modelo;
    private $patente;
    private $estado;
    protected $conexion;

    function __construct($id_reg,$nombre,$dni,$fecha_nacimiento,$domicilio,$telefono,$origen, $destino,$cargofuncion,$descripcion,$exceptuado,$kilometro,$fechaingreso, $horaingreso, $fechaegreso, $horaegreso, $modelo, $patente,$estado){
        $this->id_reg=$id_reg;
        $this->nombre = $nombre;
        $this->dni=$dni;
        $this->fecha_nacimiento=$fecha_nacimiento;
        $this->domicilio=$domicilio;
        $this->telefono=$telefono;
        $this->origen=$origen;
        $this->destino=$destino;
        $this->cargofuncion = $cargofuncion;
        $this->descripcion = $descripcion;
        $this->exceptuado = $exceptuado;
        $this->kilometro=$kilometro;
        $this->fechaingreso = $fechaingreso;
        $this->horaingreso = $horaingreso;
        $this->fechaegreso = $fechaegreso;
        $this->horaegreso = $horaegreso;
        $this->modelo = $modelo;
        $this->patente = $patente;
        $this->estado = $estado;
        $this->conexion = new conexion();
    }
   
        public function setnombre($nombre){
        $this->nombre=$nombre;
        }
        public function getnombre(){
        return $this->nombre;
        }
        public function setdni($dni){
            $this->dni=$dni;
        }
         public function getdni(){
         return $this->dni;
         }
         public function setnacimiento($fecha_nacimiento){
            $this->fecha_nacimiento=$fecha_nacimiento;
            }
            public function getnacimiento(){
            return $this->fecha_nacimiento;
            }
        public function settel($telefono){
            $this->telefono=$telefono;
        }
        public function gettel(){
            return $this->telefono;
        }
        public function setdomicilio($domicilio){
            $this->domicilio=$domicilio;
        }
        public function getdomicilio(){
            return $this->domicilio;
        }
        public function setorigen($origen){
            $this->origen=$origen;
        }
        public function getorigen(){
            return $this->origen;
        }
        public function setdestino($destino){
            $this->destino=$destino;
        }
        public function getdestino(){
            return $this->destino;
        }
        public function setcargofuncion($cargofuncion){
            $this->cargofuncion=$cargofuncion;
            }
            public function getcargofuncion(){
            return $this->cargofuncion;
        }
        public function setdescripcion($descripcion){
            $this->descripcion=$descripcion;
            }
            public function getdescripcion(){
            return $this->descripcion;
        }
        public function setexceptuado($exceptuado){
            $this->exceptuado=$exceptuado;
            }
            public function getexceptuado(){
            return $this->exceptuado;
        }
        public function setkilometro($kilometro){
            $this->kilometro=$kilometro;
            }
            public function getkilometro(){
            return $this->kilometro;
        }
        public function setfechaingreso($fechaingreso){
            $this->fechaingreso=$fechaingreso;
            }
            public function getfechaingreso(){
            return $this->fechaingreso;
        }
        public function sethoraingreso($horaingreso){
            $this->horaingreso=$horaingreso;
            }
            public function gethoraingreso(){
            return $this->horaingreso;
        }
        public function setfechaegreso($fechaegreso){
            $this->fechaegreso=$fechaegreso;
            }
            public function getfechaegreso(){
            return $this->fechaegreso;
        }
        public function sethoraegreso($horaegreso){
            $this->horaegreso=$horaegreso;
            }
            public function gethoraegreso(){
            return $this->horaegreso;
        }
    
        public function setmodelo($modelo){
        $this->modelo=$modelo;
        }
        public function getmodelo(){
        return $this->modelo;
        }
        public function setpatente($patente){
        $this->patente=$patente;
        }
        public function getpatente(){
        return $this->patente;
        }
        public function setestado($estado){
            $this->estado=$estado;
            }
            public function getestado(){
            return $this->estado;
            }
            

       

        
        public function conectar(){
            $conn= new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword());
            if($conn->connect_error){
                echo "Fallo la conexion: ".$conn->connect_error;
            
            }else{
            
            
            echo "Conectado </br>";
            }
            $sql="CREATE DATABASE controlador;";
            if(mysqli_query($conn,$sql)){
                echo "la base de datos se creo correctamente </br>";
            }else{
                echo "ya existe: ".mysqli_error($conn)."</br>";
            }
            }
            public function creartabla(){
                $conn= new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
               $sql="USE contralador";
               $sql="CREATE TABLE registros(
                id_reg integer auto_increment,
                nombre varchar(60) ,
                dni bigint(8),
                fecha_nacimiento date,
                domicilio varchar(50),
                telefono varchar(16),
                origen varchar(50),
                destino varchar(50),
                cargofuncion varchar(50),
                descripcion varchar(50),
                exceptuado integer,
                kilometro integer,
                fechaingreso date,
                horaingreso time,
                fechaegreso date,
                horaegreso time,
                modelo varchar(50),
                patente varchar(10),
                estado tinyint(1) default '1',
                primary key(id_reg));";
            
                if($conn->query($sql)===TRUE){
                    echo "se creo correctamente la tabla </br>";
            
                }else{
                    echo "error al crear tabla: ".$conn->error;
                }
            }
          
            public function guardar(){       
                $conn = new mysqli( $this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());        
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                else{
                        $sql = "INSERT INTO registros(id_reg, nombre, dni, fecha_nacimiento ,domicilio, telefono, origen, destino,cargofuncion, descripcion,exceptuado,kilometro, fechaingreso,horaingreso,fechaegreso, horaegreso, modelo, patente,estado) VALUES 
                        ('".$this->id_reg."','".$this->nombre."','".$this->dni."','".$this->fecha_nacimiento."','".$this->domicilio."','".$this->telefono."','".$this->origen."','".$this->destino."','".$this->cargofuncion."','".$this->descripcion."','".$this->exceptuado."','".$this->kilometro."',NOW(),DATE_FORMAT(NOW(),'%H:%i' ),'".$this->fechaegreso."','".$this->horaegreso."','".$this->modelo."','".$this->patente."','".$this->estado."')";                
                        if ($conn->query($sql) === TRUE) {
                            return  " ";
                        } else {
                            return "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                $conn->close();
            }    
            public function getbyId($id_reg){        
                $conn = new mysqli( $this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());        
                $sql = "SELECT id_reg, nombre, dni, fecha_nacimiento, domicilio, telefono, origen, destino,cargofuncion, descripcion,exceptuado,kilometro, fechaingreso, horaingreso, fechaegreso, horaegreso, modelo, patente, estado FROM registros where id_reg=" . $id_reg ;
                $result = $conn->query($sql);        
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $this->id_reg = $row["id_reg"];
                        $this->nombre = $row["nombre"]; 
                        $this->dni = $row["dni"];
                        $this->fecha_nacimiento = $row["fecha_nacimiento"];
                        $this->domicilio = $row["domicilio"];
                        $this->telefono = $row["telefono"];
                        $this->cargofuncion = $row["cargofuncion"];
                        $this->descripcion=$row["descripcion"];
                        $this->exceptuado=$row["exceptuado"];
                        $this->kilometro=$row["kilometro"];
                        $this->origen=$row["origen"];
                        $this->destino=$row["destino"];
                        $this->fechaingreso=$row["fechaingreso"];
                        $this->horaingreso = $row["horaingreso"];
                        $this->fechaegreso=$row["fechaegreso"];
                        $this->horaegreso = $row["horaegreso"];
                        $this->modelo=$row["modelo"];
                        $this->patente = $row["patente"];
                        $this->estado = $row["estado"];
              
                       
            
                    }
                } 
                $conn->close();
            }
            public function borrar($id_reg){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = " DELETE FROM registros WHERE id_reg = $id_reg ";
                $conn->query($sql);        
                $conn->close();
            }    
            
            public function modificar($id_reg){
                $conn = new mysqli($this->conexion->getservername(), $this->conexion->getusername(), $this->conexion->getpassword(), $this->conexion->getdbname());
                $sql = "UPDATE registros SET nombre='".$this->nombre."',dni='".$this->dni."',fecha_nacimiento='".$this->fecha_nacimiento."',domicilio='".$this->domicilio."',telefono='".$this->telefono."',origen='".$this->origen."',destino='".$this->destino."',cargofuncion='".$this->cargofuncion."',descripcion='".$this->descripcion."',exceptuado='".$this->exceptuado."',kilometro='".$this->kilometro."',fechaegreso='".$this->fechaegreso."',horaegreso='".$this->horaegreso."',modelo='".$this->modelo."',patente='".$this->patente."' WHERE  id_reg=". $id_reg;
                $conn->query($sql);
            
                $conn->close();
            }
            public function activar($id_reg){
                $conn = new mysqli( $this->conexion->getservername(),
                 $this->conexion->getusername(),
                  $this->conexion->getpassword(),
                   $this->conexion->getdbname());      
                $sql = "UPDATE registros SET estado= 1  WHERE id_reg=".$id_reg;
                $result = $conn->query($sql); 
                $conn->close();
            }
            public function desactivar($id_reg){
                $conn = new mysqli( $this->conexion->getservername(),
                 $this->conexion->getusername(),
                  $this->conexion->getpassword(),
                   $this->conexion->getdbname());      
                $sql = "UPDATE registros SET estado= 0  WHERE id_reg=".$id_reg;
                $result = $conn->query($sql); 
                $conn->close();
            }

           
              
}
