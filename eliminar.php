<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
</head>
<body>
    <?Php
        include "registro.php"; 
        $id_reg=$_GET["id_reg"];
        $registro = new registros("","","","","","","","","","","","","","","","","","","");
        $registro->getbyId($id_reg);
         echo $registro->borrar($id_reg);
         header("Location:localhost:8080/COVID19/listtr.php");     
    ?>
</body>
</html>