<?php 
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

$nit_cc= "";
$nombre="";
$direccion="";
$telefono= "";
$fecha_ingreso="";
$cupo_credito= "";
$foto = "";

if(isset($_POST['buscar'])){
    $nit_ccbuscar = $_POST['nit_ccbuscar'];
        $consulta = $conexion -> query("SELECT * FROM   cliente WHERE nit_cc='$nit_cc'");
        while($resultadoconsulta = $consulta -> fetch_array()){
            $nit_cc = $resultadoconsulta[0];
            $nombre = $resultadoconsulta[1];
            $direccion = $resultadoconsulta[2];
            $telefono = $resultadoconsulta[3];
            $fecha_ingreso = $resultadoconsulta[4];
            $cupo_credito = $resultadoconsulta[5];
            $foto = $resultadoconsulta[6];
        }
} ?>
<body>
    <center>
        <h2>Manupulacion de datos con PHP</h2>
        <form action="formulario.php" method="post" enctype="multipart/form-data">
            <label for="buscar">Buscar</label>
            <input type="text" name="nit_ccbuscar" placeholder="Buscar cliente">
            <input type="submit" name= "buscar" value="buscar">
            <hr>
            <br>
            <label for="">Nit O CC</label>
            <input type="text" name="nit_cc" placeholder="Ingrese el Nit o la Cc " value="<?php echo $nit_cc?>">
            <br> <br>
            <label for="">Nombre:</label>
            <input type="text" name="nombre" placeholder="Ingrese el nombre completo" value="<?php echo $nombre;?>">
            <br> <br>
            <label for="">Dirección</label>
            <input type="text" name="direccion" placeholder="Ej: Cra 120 #61-a15" value="<?php echo $direccion;?>">
            <br> <br>
            <label for="">Telefono:</label>
            <input type="number" name="telefono" placeholder="Ej: 123123555" value="<?php echo $telefono;?>">
            <br> <br>
            <label for="">Fecha de ingreso:</label>
            <input type="date" name="fecha_ingreso" value="<?php echo $fecha_ingreso;?>">
            <br> <br>
            <label for="">Cupo de Credito:</label>
            <input type="number" name="cupo_credito" placeholder="$ valor en pesos" value="<?php echo $cupo_credito;?>">
            <br> <br>
        
        <label for="">Subir foto:</label>
        <input type="file" name="foto" id="" >
        <img src="<?php echo $foto;?>" alt="" width="100" height="100">
        <br> <br>
        
        <input type="submit" name="guardar" value="Guardar Nuevo Cliente">
        <input type="submit" name="llamar" value="Listar Todos los Clientes">
        <input type="submit" name="actualizar" value="Actualizar Cliente">
        <input type="submit" name="eliminar" value="Eliminar Cliente">
        </form>
    </center>
    <?php 
    if (isset($_POST['guardar'])){
        include("conexion.php");
        $nit_cc= $_POST['nit_cc'];
        $nombre= $_POST['nombre'];
        $direccion= $_POST['direccion'];
        $telefono= $_POST['telefono'];
        $fecha_ingreso= $_POST['fecha_ingreso'];
        $cupo_credito= $_POST['cupo_credito'];
        $nombre_foto= $_FILES['foto']['name'];
        $ruta= $_FILES['foto']['tmp_name'];
        $foto="img/".$nombre_foto;
        copy($ruta,$foto);
        $SQLbuscar =" SELECT nit_cc FROM cliente WHERE nit_cc = '$nit_cc' ORDER BY nit_cc";
        if($resultado=mysqli_query($conexion, $SQLbuscar)){
            $nroregistros= mysqli_num_rows($resultado);
            if($nroregistros>0){
                echo"<script>alert('El Nit o CC que ingresaste no existe');</script>";
            } else{
                mysqli_query($conexion, "INSERT INTO cliente (nit_cc,nombre,direccion,telefono,fecha_ingreso,cupo_credito, foto)
                VALUES ('$nit_cc','$nombre','$direccion','$telefono','$fecha_ingreso','$cupo_credito','$foto')");
                echo"Datos ok";
            }

        }
    }
 /*    if (isset($_POST['llamar'])){

    }
    if (isset($_POST['actualizar'])){

    }
    if (isset($_POST['eliminar'])){

    } */
    
    ?>
</body>

</html>