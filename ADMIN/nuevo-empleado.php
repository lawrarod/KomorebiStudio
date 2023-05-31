<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NUEVO EMPLEADO</title>

  <style>

    body{
      background-color: #f5f6f7;
    }
    main {
      display: flex;
      flex-flow: column wrap;
      height: 100vh;
      justify-content: center;
      align-items: center;
      
    }
    h1 {
      color: #444;
    }
    form {
      display: flex;
      flex-flow: column wrap;
      gap: 1em;
      width: 60%;
      /* min-height: 400px; */
      padding: 2em;
      background-color: #eee;
      border: none;
      border-radius: 2em;
      font-family: 'Courier New', Courier, monospace;
      box-shadow: 2px 3px 0px darkgray;
    }

    input[type="text"] {
      border-radius: 2em;
      border-color: #eee;
    }

    input[type="submit"] {
      width: 20%;
    }
  </style>
</head>
<?php

session_start();

if(isset($_SESSION['usuario'])){
  include 'conn.php';
  if(isset($_POST['idEmpleado'])){
    $insert_values = "INSERT INTO empleados VALUES ('".$_POST['idEmpleado']."', '".$_POST['nombre']."', '".$_POST['apellidos']."', '".$_POST['email']."', '".$_POST['numero']."', '".$_POST['puesto']."', '".$_POST['practicas']."' ) ";

    $consulta = mysqli_query($conexion, $insert_values);

    if($consulta){
      echo "Los datos de ".$_POST['nombre']." han sido añadidos correctamente a la base de datos.";
    }else{
      echo mysqli_error($conexion);
    }
  }
?>
<body>
  <main>
    <h1>Nuevo Empleado</h1>
    <form method="post" enctype="multipart/form-data">
      ID Empleado: <input type="text" name="idEmpleado"><br><br>
      Nombre: <input type="text" name="nombre" id=""><br><br>
      Apellidos: <input type="text" name="apellidos" id=""><br><br>
      Email: <input type="text" name="email"><br><br>
      Número: <input type="text" name="numero"><br><br>
      Puesto: <input type="text" name="puesto"><br><br>
      Prácticas: <input type="text" name="practicas">
      <div id="btn">
      <input type="submit" value="Enviar">
      </div>
    </form>
  </main>
<?php
}
?>
</body>
</html>