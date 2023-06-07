<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <title>PANEL DE ADMINISTRACIÓN</title>

  <style>
    body {
      background-color: #eee;
    }

    main {
      margin: 0 auto;
      padding: 3em;
      display: flex;
      flex-flow: row wrap;
      justify-content: center;
      align-items: center;
      height: 80vh;
      gap: 2em;
      font-family: 'Courier New', Courier, monospace;
      font-weight: 500;
    }

    #gestion{
      display: flex;
      justify-content: center;
      width: 100%;
      gap: 2em;
    }

    #nuevo-proyecto {
      background-color: khaki;
    }

    #empleados {
      background-color: cornflowerblue;
    }

    div {
      text-align: center;
      display: flex;
      width: 30%;
      border: 5px solid lavender;
      padding: 1em;
      background-color: #f5f6f7;
      box-shadow: 0px 3px 2px #6d6d6d;
    }

    #proyectos:hover {
      background-color: #ccc;
    }
  </style>
</head>
<?php

session_start();

// echo $_SESSION['usuario'];
if (isset($_SESSION['usuario'])) {

  include "conn.php";

  if (isset($_GET['id'])) {
    $registros = mysqli_query($conexion, "DELETE FROM proyectos WHERE idProyectos=" . $_GET['id']);
  }

?>

  <body>
    <main>
      <section id="gestion">
        <div id="nuevo-proyecto">
          Nuevo Proyecto&nbsp;&nbsp;
          <a href="nuevo-proyecto.php"><i class="bi bi-plus-circle"></i></a>
        </div>

        <div id="empleados">
          Empleados&nbsp;&nbsp;
          <a href="empleados.php"><i class="bi bi-person-circle"></i></a>
        </div>
      </section>
      <?php

      $registros = mysqli_query($conexion, "SELECT idProyectos, nombre FROM `proyectos` ");

      $filas = mysqli_fetch_all($registros, MYSQLI_ASSOC);

      foreach ($filas as $fila) {
      ?>

        <div id="proyectos">
          <?php echo utf8_encode($fila['nombre']) ?>&nbsp;&nbsp;

          <a href="./panel.php?id=<?php echo $fila['idProyectos'] ?>"><i class="bi bi-trash"></i></a>&nbsp;

          <a href="./actualizar-datos.php?id=<?php echo $fila['idProyectos'] ?>"><i class="bi bi-pen"></i></a>&nbsp;
          
          <a href="#"><i class="bi bi-person-circle"></i></a>
        </div>
    <?php
      }
    }
    ?>
    </main>

  </body>

</html>