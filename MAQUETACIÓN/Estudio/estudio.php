<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estudio-style.css">
  <title>ESTUDIO</title>
</head>

<!-- CREAMOS LA CONEXIÓN -->
<?php

$conexion= mysqli_connect("127.0.0.1", "root", "", "komorebi");
if($conexion == FALSE){
    echo("error en la conexión");
    exit();
}

?>

<body>
  <main>
    <!-- HAMBURGUER MENU -->

    <nav role="navigation">
      <div id="menuToggle">

        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
        
        <ul id="menu">
          <a href="../Home Page/home-page.html"><li>Home</li></a>
          <a href="../Formulario/form.html"><li>Contacto</li></a>
          <a href="#proyectos"><li>Proyectos</li></a>
          <a href="#"><li>About Us</li></a>
        </ul>
      </div>
    </nav>

    <!-- EL ESTUDIO -->
    <section id="estudio-caja">
      <div id="estudio-titulo">
        <h2>EL ESTUDIO</h2>
      </div>

      <article id="estudio-parrafos">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum ullam laudantium dolore inventore sunt id iusto
          excepturi ratione perspiciatis obcaecati quasi eum, nisi eveniet numquam! Perferendis qui quibusdam
          praesentium rerum natus labore vitae enim, id nemo molestiae perspiciatis quasi nesciunt quam, quos doloremque
          et eveniet! Minima consequatur asperiores laudantium et?</p>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum ullam laudantium dolore inventore sunt id iusto
          excepturi ratione perspiciatis obcaecati quasi eum, nisi eveniet numquam! Perferendis qui quibusdam
          praesentium rerum natus labore vitae enim, id nemo molestiae perspiciatis quasi nesciunt quam, quos doloremque
          et eveniet! Minima consequatur asperiores laudantium et?</p>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum ullam laudantium dolore inventore sunt id iusto
          excepturi ratione perspiciatis obcaecati quasi eum, nisi eveniet numquam! Perferendis qui quibusdam
          praesentium rerum natus labore vitae enim, id nemo molestiae perspiciatis quasi nesciunt quam, quos doloremque
          et eveniet! Minima consequatur asperiores laudantium et?</p>
      </article>
    </section>

    <!-- PROYECTOS -->
    <section id="proyectos-caja">
      
      <a name="proyectos"></a>
      
      <div id="proyectos-titulo">
        <h2 name="proyectos">PROYECTOS</h2>
      </div>


      <section id="proyectos-imgs">

        <?php
        $registros = mysqli_query($conexion, "SELECT idProyectos, URL_Imagenes FROM `proyectos` WHERE 1;");
        $filas= mysqli_fetch_all($registros, MYSQLI_ASSOC); 

        foreach ($filas as $fila) {
        ?>

        <!-- IMÁGENES PROYECTOS -->
        
        <a href="../Proyectos/Proyecto-1/proyecto1.php?id=<?php echo $fila['idProyectos'] ?>">

          <img src="<?php echo "../Proyectos/img/".$fila['URL_Imagenes']?>" alt="">

        </a>
        
        <?php
        }
        ?>
      </section>


    </section>

  </main>
</body>

</html>