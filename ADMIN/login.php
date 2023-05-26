<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>PÁGINA LOGGIN</title>

  <style>
    * {
      padding: 0;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* LOGO */
    h1 {
      /* color: #171515; */
      color: #252222;
    }

    /* FORM */

    #form-container {
      /* outline: auto; */
      display: flex;
      flex-flow: row wrap;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f5f6f7;
    }

    legend {
      text-align: center;
      font-size: x-large;
      background-color: #f5f6f7;
    }

    fieldset {
      width: 500px;
      display: flex;
      flex-flow: column;
      align-items: center;
      justify-content: center;
      /* border-width: 10px; */
      border-color: #eee;
      border-radius: 2em;
      padding: 3em;
      box-shadow: 0px 3px 13px #444;
    }

    /* INPUTS */

    #user-div,
    #password-div {
      /* outline: auto; */
      display: flex;
      flex-flow: column;
      align-items: center;
      line-height: 2em;
      padding: 1em;
    }

    input[type="text"],
    input[type="password"] {
      outline: none;
      border: none;
      border-radius: 2em;
      padding: 1.5em;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      background-color: #d6d6d6;
    }

    /* NAV */

    nav {
      background-color: #f5f6f7;
    }

    nav div {
      position: relative;
      top: 30px;
      left: 40px;
    }
  </style>
</head>

<body>

  <nav>
    <div id="logo-container">
      <h1>KOMOREBI</h1>
    </div>
  </nav>

  <section id="form-container">
    <form action="login.php" method="POST">
      <fieldset>
        <legend>LOGIN</legend>

        <div id="user-div">
          Usuario:
          <input id="usuario" name="usuario" type="text" placeholder="Nombre de usuario">
        </div>

        <div id="password-div">
          Contraseña:
          <input id="contrasena" name="contrasena" type="password" placeholder=" Contraseña">
        </div>

        <button type="submit" class="btn btn-outline-dark">Enviar</button>

      </fieldset>

    </form>
  </section>

  <?php

if(isset($_POST['usuario'])){
  include "conn.php";

  //Buscamos el usuario
  $autentificacion = mysqli_query($conexion, "SELECT * FROM administrador where nombre='" . $_POST['usuario'] . "' and passwd='" . sha1($_POST['contrasena']) . "'");

  // echo $_POST['usuario'] ;
  // echo $_POST['contrasena'] ;

  $usuario = mysqli_fetch_all($autentificacion, MYSQLI_ASSOC);

  //comprobamos si existe el usuario
  if (count($usuario) != 0) {
    session_start();
    $_SESSION['usuario'] = $_POST['usuario'];
    echo $_SESSION['usuario'];
    header("Location: panel.php");
    

  } else {
    echo "Acceso no autorizado";
    session_destroy();
  }

}
  ?>
</body>

</html>