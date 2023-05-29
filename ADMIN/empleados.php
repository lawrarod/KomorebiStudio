<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <title>EMPLEADOS</title>

  <style>
    body {
      font-family: 'Courier New', Courier, monospace;
    }

    main {
      /* outline: auto; */
      padding: 2em;
      gap: 2em;
      margin: 0 auto;
      width: 80%;
      display: flex;
      flex-flow: row wrap;
      height: 90vh;
      justify-content: center;
    }

    #nuevo-empleado {
      border-radius: 1em;
      background-color: cornflowerblue;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      flex-grow: 1;
    }

    #empleados {
      padding: 1em;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 30%;
      flex-grow: 1;
      text-align: center;
      box-shadow: 0px 3px 4px #b6b6b6;
    }

    #empleados:hover {
      background-color: cornflowerblue;
    }

    @media (max-width: 988px) {
      #empleados {
        flex-flow: column;
        gap: 1em;
      }

      #iconos {
        display: flex;
        flex-flow: row;
      }

      #nuevo-empleado {
        padding: .5em;
      }
    }

  </style>
</head>

<?php

session_start();
// echo $_SESSION['usuario'];

if (isset($_SESSION['usuario'])) {

  include "conn.php";

  if(isset($_GET['id'])){
    $delete_values = mysqli_query($conexion, "DELETE FROM empleados WHERE idEmpleados=". $_GET['id']);
  }

  $registros = mysqli_query($conexion, "SELECT * FROM empleados WHERE 1");
  $filas = mysqli_fetch_all($registros, MYSQLI_ASSOC);


?>

<body>
  <main>
    <section id="nuevo-empleado">Añadir Nuevo Empleado&nbsp;&nbsp;
      <a href="#"><i class="bi bi-plus-circle"></i></a>
    </section>
    <?php
    foreach ($filas as $fila) {
    ?>
      <section id="empleados">
        <?php echo $fila['nombre'] . " " . $fila['apellidos']; ?>&nbsp;
        <div id="iconos">
          <a href="./empleados.php?id=<?php echo $fila['idEmpleados'] ?>"><i class="bi bi-trash"></i></a>&nbsp;
          <a href="actualizar-empleado.php?id=<?php echo $fila['idEmpleados']?>"><i class="bi bi-pen"></i></a>&nbsp;
          <a href="info-empleados.php?id=<?php echo $fila['idEmpleados'] ?>"><i class="bi bi-person-circle"></i></a>
        </div>
      </section>
    <?php
    }
  }
    ?>
</body>

</html>