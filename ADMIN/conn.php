<?php

// PREPRODUCCIÓN
$conexion = mysqli_connect("127.0.0.1", "root", "", "komorebi");
if ($conexion == FALSE) {
  echo ("error en la conexión");
  exit();
}

// PRODUCCIÓN
// ini_set('display_errors', 1);
// $conexion = mysqli_connect("vl23537.dinaserver.com", "lrodriguezr", "Institut_2023", "insti_LR");
// if ($conexion == FALSE) {
//   echo mysqli_connect_error();
//   exit();
//}
