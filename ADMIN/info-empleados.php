<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INFO EMPLEADOS</title>

  <style>
    body{
      overflow: hidden;
    }

    main {
      display: flex;
      flex-flow: column wrap;
      justify-content: center;
      align-items:  center;
      line-height: 1.5em;
      height: 100vh;
      font-size: 20px;
      background-color: #f5f6f7;
      font-family: 'Courier New', Courier, monospace;
    }

    input[type="text"] {
      border: none;
      border-radius: 2em;
      padding: .5em;
      box-shadow: 0 3px 2px #ccc;
    }

    input[type="text"]:focus {
      outline: none;
    }

    h2 {
      text-transform: uppercase;
      /* outline: auto; */
      background-color: #eee;
      color: #444;
      padding: .5em;
      border-radius: 2em;
    }
  </style>
</head>
<?php
include "conn.php";

$registros = mysqli_query($conexion, "SELECT * FROM empleados WHERE idEmpleados=" . $_GET['id']);
$filas = mysqli_fetch_all($registros, MYSQLI_ASSOC);

foreach ($filas as $fila) {
?>

  <body>
    <main>
    <h2>INFORMACIÓN SOBRE <?php echo $fila['nombre']?></h2>

      ID Empleado: <input type="text" name="id" id="id" value="<?php echo $fila['idEmpleados'] ?>" readonly><br>

      Nombre: <input type="text" name="nombre" id="nombre" value="<?php echo utf8_encode( $fila['nombre']) ?>"  readonly><br>

      Apellidos: <input type="text" name="apellidos" id="apellidos" value="<?php echo utf8_encode($fila['apellidos']) ?>" readonly><br>

      Email: <input type="text" name="email" id="email" value="<?php echo $fila['email'] ?>" readonly><br>

      Nº móvil: <input type="text" name="movil" id="movil" value="<?php echo $fila['numero'] ?>" readonly><br>

      Puesto: <input type="text" name="puesto" id="puesto" value="<?php echo $fila['puesto'] ?>" readonly><br>

      Prácticas: <input type="text" name="practicas" id="practicas" value="<?php echo $fila['practicas'] ?>" readonly>
    </main>
  <?php
}
  ?>
  </body>

</html>