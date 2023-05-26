<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=</a>, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <title>ACTUALIZAR DATOS</title>
  <style>

    body{
      background-color: #f5f6f7;
    }

    main {
      width: 100%;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

     form {
      width: 60%;
      display: flex;
      height: 650px;
      flex-flow: column;
      border-radius: 2em;
      padding: 2em;
      box-shadow: 2px 3px 7px #444;
    } 

    input[type="text"], textarea{
      border-radius: 2em;
      border-color: #eee;
      padding: .5em;
      outline: none;
    }

    input[type="text"]:focus, textarea:focus {
      background-color: #d6d6d6;
    }

    button {
      border-radius: 2em;
      border: none;
      background-color: plum;

      /* background-color: gray; */
      padding: 1em;
    }

    button:hover {
      background-color: palevioletred;
    }

  </style>
</head>

<body>
  <?php
  session_start();

  if (isset($_SESSION['usuario'])) {

    include "conn.php";

      if(isset($_POST['idProyectos'])){
        $update_values = "UPDATE proyectos set nombre = '".$_POST['nombre']."', localizacion ='".$_POST['localizacion']."', presupuesto = '".$_POST['presupuesto']."', fecha_inicio = '".$_POST['fecha-inicio']."', fecha_fin = '".$_POST['fecha-fin']."', Descripcion = '".$_POST['Descripcion']."' where idProyectos = '".$_POST['idProyectos']."' ";

    
        $consulta = mysqli_query($conexion, $update_values);

        if($consulta){
          echo "Se ha actualizado correctamente.";
        }else{
          echo mysqli_error($conexion);
        }
      }

      if (isset($_GET['id'])){

        $registros = mysqli_query($conexion, "SELECT * FROM proyectos WHERE idProyectos=".$_GET['id']);
        $filas = mysqli_fetch_all($registros, MYSQLI_ASSOC);
        foreach($filas as $fila){
    ?>

      <main>
        <form method="POST" enctype="multipart/form-data">

          ID Proyecto: <br><input type="text" name="idProyectos" id="idProyecto" value="<?php echo $fila['idProyectos']?>" readonly><br><br>

          Nombre: <br><input type="text" name="nombre" id="nombre" value="<?php echo $fila['nombre']?>"><br><br>

          Localización: <br><input type="text" name="localizacion" id="localizacion" value="<?php echo $fila['localizacion']?>"><br><br>

          Presupuesto: <br><input type="text" name="presupuesto" id="presupuesto" value="<?php echo $fila['presupuesto']?>"><br><br>

          Fecha de Inicio: <br><input type="text" name="fecha-inicio" id="fecha-inicio" value="<?php echo $fila['fecha_inicio']?>"><br><br>

          Fecha Fin: <br><input type="text" name="fecha-fin" id="fecha-fin" value="<?php echo $fila['fecha_fin']?>"><br><br>

          Descripción: <br><textarea name="Descripcion" id="Descripcion" cols="40" rows="5"><?php echo $fila['Descripcion'] ?></textarea><br><br>

          <button type="submit">Enviar</button>
        </form>

      </main>
        
    <?php
    }
    } else {
      echo "No se han obtenido los datos correctamente.";
    }
  }
  ?>
</body>

</html>