<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ACTUALIZAR EMPLEADO</title>
</head>
<?php

include "conn.php";


if(isset($_GET['id'])){
$registros = mysqli_query($conexion, "SELECT * FROM empleados WHERE idEmpleados=" . $_GET['id']);
$filas = mysqli_fetch_all($registros, MYSQLI_ASSOC);
?>

<body>
  <form method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>ACTUALIZAR EMPLEADO</legend>

      ID Empleado: <br><input type="text" name="idEmpleados" id="idEmpleados" value="<?php echo $fila['idEmpleados'] ?>" readonly><br><br>

      Nombre: <br><input type="text" name="nombre" id="nombre" value="<?php echo $fila['nombre'] ?>"><br><br>

      Apellidos: <br><input type="text" name="apellidos" id="apellidos" value="<?php echo $fila['apellidos'] ?>"><br><br>

      Email: <br><input type="text" name="email" id="email" value="<?php echo $fila['email'] ?>"><br><br>

      Nº Móvil: <br><input type="text" name="movil" id="movil" value="<?php echo $fila['movil'] ?>"><br><br>

      Puesto: <br><input type="text" name="puesto" id="puesto" value="<?php echo $fila['puesto'] ?>"><br><br>

      Prácticas: <br><input type="text" name="practicas" id="practicas" value="<?php echo $fila['practicas'] ?>">

      <button type="submit">Enviar</button>
    </fieldset>
  </form>
<?php
}
?>
</body>

</html>