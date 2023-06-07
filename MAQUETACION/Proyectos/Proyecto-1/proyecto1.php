<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./proyecto1.css">
  <title>PROYECTO 1</title>
</head>

<?php

// $conexion= mysqli_connect("127.0.0.1", "root", "", "komorebi");
// if($conexion == FALSE){
//     echo("error en la conexión");
//     exit();
// }

include '../../../ADMIN/conn.php';

?>

<body>

  <main>
    <section id="wrap">

      <section id="section-pic">

        <?php

        $registros = mysqli_query($conexion, "SELECT URL_Imagenes, nombre,localizacion, presupuesto, Descripcion FROM `proyectos` WHERE idProyectos=".$_GET['id']);
        
        $filas = mysqli_fetch_all($registros, MYSQLI_ASSOC);

        foreach ($filas as $fila){
        ?>
        
        <h2><?php echo utf8_encode($fila['nombre']) ?></h2><br><br>
        <img src="../img/<?php echo $fila['URL_Imagenes']?>" alt="" id="imagenes">
        
      </section>

      <section id="section-text">

        <p id="localizacion"><?php echo utf8_encode($fila['localizacion'])?>.</p><br>
        <p><?php echo $fila['presupuesto']?>€</p><br>

        <p id="descripcion"><?php echo utf8_encode($fila['Descripcion']) ?>.</p>

      </section>

      <?php
        }
        ?>
    </section>

    <div id="boton">
      <a href="../../Estudio/estudio.php#proyectos"><dfn title="Volver atrás"><img src="../img/flecha-izquierda.png" alt="flecha de retroceso"></dfn></a>
    </div>
  </main>

 
  
</body>

</html>