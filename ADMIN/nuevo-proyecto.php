<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=ç, initial-scale=1.0">
  <title>AÑADIR PROYECTO</title>

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
  overflow: scroll;
  overflow-x: hidden;
  width: 60%;
  display: flex;
  height: 550px;
  flex-flow: column;
  border-radius: 2em;
  padding: 2em;
  box-shadow: 2px 3px 7px #444;
  scroll-behavior: smooth;
} 

input[type="text"], textarea{
  border-radius: 2em;
  border-color: #eee;
  padding: .5em;
  outline: none;
}

textarea {
  resize: both;
}

#url {
  display: flex;
  padding: 1em;
  padding-left: 0;
}

input[type="text"]:focus, textarea:focus {
  background-color: #d6d6d6;
}

button {
  border-radius: 2em;
  border: none;
  background-color: plum;
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
    ini_set('display_errors', 1);
    include "conn.php";

      if(isset($_POST['idProyectos'])){
        $insert_values = "INSERT INTO proyectos VALUES ('".$_POST['idProyectos']."', '".$_POST['nombre']."', '".$_POST['localizacion']."', '".$_POST['presupuesto']."', '".$_POST['fecha-inicio']."', '".$_POST['fecha-fin']."','".$_POST['Descripcion']."','".$_FILES["fichero"]["name"]."' )";

    
        $consulta = mysqli_query($conexion, $insert_values);

        if($consulta){
          $files = $_FILES["fichero"]["name"];
          $url_temp = $_FILES["fichero"]["tmp_name"];
          // $url_insert = dirname(__FILE__) . "../MAQUETACION/Proyectos/img";
          $url_insert = dirname(__DIR__)."\MAQUETACION\Proyectos\img";
          $url_target = str_replace('\\', '/', $url_insert). '/'. $files;
          if(move_uploaded_file($url_temp, $url_target)){
            echo "El archivo se ha cargado correctamente.";
          }
          
          echo "Se ha añadido correctamente.";
        }else{
          echo mysqli_error($conexion);
        }
      }
    ?>
  <main>
    <form method="POST" enctype="multipart/form-data">

      ID Proyecto: <br><input type="text" name="idProyectos" id="idProyecto" ><br><br>

      Nombre: <br><input type="text" name="nombre" id="nombre" ?><br><br>

      Localización: <br><input type="text" name="localizacion" id="localizacion" ><br><br>

      Presupuesto: <br><input type="text" name="presupuesto" id="presupuesto"><br><br>

      Fecha de Inicio: <br><input type="text" name="fecha-inicio" id="fecha-inicio"><br><br>

      Fecha Fin: <br><input type="text" name="fecha-fin" id="fecha-fin" ><br><br>

      Descripción: <br><textarea name="Descripcion" id="Descripcion" cols="40" rows="5"></textarea><br><br>
      
      <div id="url">
      URL_Imagenes:&nbsp;<input type="file" name="fichero" id="fichero">
      </div><br><br>

      <button type="submit">Enviar</button>
    </form>

  </main>
  <?php
  }
  ?>
</body>

</html>