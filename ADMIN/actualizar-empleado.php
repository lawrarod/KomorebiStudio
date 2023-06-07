<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ACTUALIZAR EMPLEADO</title>
</head>
<?php

session_start();

include "conn.php";


if (isset($_POST['idEmpleados'])) {
  $update_values = "UPDATE empleados set nombre = '" . $_POST['nombre'] . "', apellidos ='" . $_POST['apellidos'] . "', email = '" . $_POST['email'] . "', numero = '" . $_POST['numero'] . "', puesto = '" . $_POST['puesto'] . "', practicas = '" . $_POST['practicas'] . "' where idEmpleados = '" . $_POST['idEmpleados'] . "' ";


  $consulta = mysqli_query($conexion, $update_values);

  if ($consulta) {
    echo "Se ha actualizado correctamente.";
  } else {
    echo mysqli_error($conexion);
  }
}

if (isset($_GET['id'])) {
  $registros = mysqli_query($conexion, "SELECT * FROM empleados WHERE idEmpleados=" . $_GET['id']);
  $filas = mysqli_fetch_all($registros, MYSQLI_ASSOC);
  foreach($filas as $fila){
?>

  <body>
    <form method="POST" enctype="multipart/form-data">
      <fieldset>
        <legend>ACTUALIZAR EMPLEADO</legend>

        ID Empleado: <br><input type="text" name="idEmpleados" id="idEmpleados" value="<?php echo $fila['idEmpleados'] ?>" readonly><br><br>

        Nombre: <br><input type="text" name="nombre" id="nombre" value="<?php echo $fila['nombre'] ?>"><br><br>

        Apellidos: <br><input type="text" name="apellidos" id="apellidos"><br><br>

        Email: <br><input type="text" name="email" id="email"><br><br>

        Nº Móvil: <br><input type="text" name="numero" id="movil"><br><br>

        Puesto: <br><input type="text" name="puesto" id="puesto"><br><br>

        Prácticas: <br><input type="text" name="practicas" id="practicas"><br><br>

        <button type="submit">Enviar</button>
      </fieldset>
    </form>
  <?php
  }
}
  ?>
  </body>

</html>