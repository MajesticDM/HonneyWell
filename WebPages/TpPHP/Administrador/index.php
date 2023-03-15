<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../estilosPHP.css">
  <link rel="icon" href="../../Icons/Principal.png">

  <title>Tipo de solicitudes</title>
  <style>
    .social {
      position: fixed;
      left: 0;
      top: 200px;
      z-index: 2000;
    }

    .social ul {
      list-style: none;
    }

    .social ul li a {
      display: inline-block;
      color: #fff;
      background: #000;
      padding: 10px 15px;
      text-decoration: none;
      -webkit-transition: all 500ms ease;
      -o-transition: all 500ms ease;
      transition: all 500ms ease;
    }

    .social ul li .icon-facebook {
      background: #000;
    }

    .social ul li a:hover {
      background: #9C9C9C;
      padding: 10px 30px;
    }


    ul.topnav {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    ul.topnav li {
      float: left;
    }

    ul.topnav li a,
    input {
      display: block;
      color: black;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-weight: bold;
    }

    ul.topnav li a:hover:not(.active),
    input:hover:not(.active) {
      background-color: gray;
      color: #000
    }

    ul.topnav li.right {
      float: right;
    }

    @media screen and (max-width: 600px) {

      ul.topnav li.right,
      ul.topnav li {
        float: none;
      }
    }

    .ingreso {
      display: block;
    }

    .administrador {
      display: none;
    }

    .bg-img {
      /* The image used */
      background-image: url("../../Images/Slide2.jpg");

      min-height: 660px;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }

    /* Add styles to the form container */
    .container {
      position: absolute;
      right: 0;
      margin: 20px;
      max-width: 300px;
      padding: 16px;
      background-color: white;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit button */
    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .btn:hover {
      opacity: 1;
    }
    table {
    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;
    margin: 45px;
    width: 90%;
    text-align: center;
    border-collapse: collapse;
}

th {
    font-size: 13px;
    font-weight: normal;
    padding: 8px;
    background: rgba(19, 35, 47, 0.9);
    box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
    border-top: 4px solid #000000;
    border-bottom: 1px solid rgb(0, 0, 0);
    color: rgb(255, 255, 255);

}

td {
    padding: 8px;
    background: #ffffff;
    border-bottom: 1px solid rgb(0, 0, 0);
    color: rgb(0, 0, 0);
    border-top: 1px solid transparent;
}

tr:hover td {
    background: #176852;
    text-align: right;
    transition: 700ms;
    text-transform: uppercase;

    text-decoration: none;
    color: #ffffff;
    transition: 0.5s ease;
}


tbody tr {
    border-bottom: 1px solid #dd1d1d;
}

tbody tr:nth-of-type(even) {
    background-color: #1bfa137c;
}

tbody tr:last-of-type {
    border-bottom: 2px solid #000000;
}
  </style>
</head>

<body>
  <div class="social">
    <ul>
      <li><a href="../" class="icon-facebook"></a></li>
    </ul>
  </div>

  <div class="ingreso">
    <div class="bg-img">
      <form class="container" method="post" name="ingresarf">
        <h1>Login</h1>

        <label for="usuario"><b>Usuario</b></label>
        <input type="text" placeholder="Ingresar usuario" name="usuario" required>

        <label for="psw"><b>Contraseña</b></label>
        <input type="password" placeholder="Ingresar contraseña" name="psw" required>

        <input type="submit" name="ingresar" class="btn" value="Entrar">
      </form>
    </div>
  </div>
  <div class="administrador">
    <form method="post" name="ingresarf">
      <ul class="topnav">
        <li><input type="submit" value="Usuarios" name="usuarios"></li>
        <li><input type="submit" value="Solicitudes" name="solicitudes"></li>
        <li><input type="submit" value="Clientes" name="clientes"></li>
        <li class="right"><a href="../">Volver</a></li>
        
      </ul>
    </form>
  </div>
  
  <!-- Usuarios -->
  <?php
  if (isset($_POST['usuarios'])) {
    echo ("<style> .ingreso{display: none;} .administrador{display: block;}</style>");
    echo ("<a href='../Administrador/Informacion-usuarios/' target='_blank''><input type='submit' value='Editar o Eliminar'></a>");
    include("../ConexionMYSQL.php");
    $sql = "SELECT NOMBRES as 'Nombres',USUARIO as 'Usuario',CONTRASENA as 'Contrasena',tipo_usuarios.TIPO_USUARIO as 'Tipo de usuario',FECHA AS 'Fecha de creación'
    FROM
    usuarios
    INNER JOIN tipo_usuarios ON usuarios.IDX_TIPO_USUARIO = tipo_usuarios.ID_TIPO_USUARIO
    GROUP BY Nombres
    ORDER BY Nombres";
    $result = $conector->query($sql);

    if ($result->num_rows > 0) {
      //Nombres de las columnas
      echo "<table><tr>
    <th>Nombres</th>
    <th>Usuario</th>
    <th>Contraseña</th> 
    <th>Tipo de usuario</th>
    <th>Fecha de cración</th>
    </tr>";
      //Acomodando cada dato en su respectiva columna
      while ($row = $result->fetch_assoc()) {
        echo    "<tr>
                           <td>" . $row["Nombres"] . "</td>
                           <td>" . $row["Usuario"] . "</td>
                           <td type='password'>" . $row["Contrasena"] . "</td>
                           <td>" . $row["Tipo de usuario"] . "</td>
                           <td>" . $row["Fecha de creación"] . "</td>
                    </tr>";
      }
    } else {
      echo "0 results";
    }
    $conector->close();
  }
  ?>
<!-- Solicitudes -->
  <?php
  if (isset($_POST['solicitudes'])) {
    echo ("<style> .ingreso{display: none;} .administrador{display: block;}</style>");
    include("../ConexionMYSQL.php");
    $sql = "SELECT 
    clientes.NOMBRES as 'Nombre del solicitante',clientes.TELEFONO as 'Contacto',clientes.EMAIL as 'E-mail',tipo_solicitudes.TIPO_SOLICITUD as 'Tipo de solicitud',solicitudes.DESCRIPCION as 'Mensaje',solicitudes.FECHA as 'Solicitud creada en'
    FROM 
    solicitudes
    INNER JOIN clientes on solicitudes.IDX_CLIENTE = clientes.ID_CLIENTE
    INNER JOIN tipo_solicitudes on solicitudes.IDX_TIPO_SOLICITUD = tipo_solicitudes.ID_TIPO_SOLICITUD";
    $result = $conector->query($sql);

    if ($result->num_rows > 0) {
      //Nombres de las columnas
      echo "<table><tr>
    <th>Nombre de quien solicita</th>
    <th>Contacto</th>
    <th>E-mail</th>
    <th>Tipo de solicitud</th>
    <th>Mensaje</th>
    <th>Solicitud creada en</th>
    </tr>";
      //Acomodando cada dato en su respectiva columna
      while ($row = $result->fetch_assoc()) {
        echo    "<tr>
                           <td>" . $row["Nombre del solicitante"] . "</td>
                           <td>" . $row["Contacto"] . "</td>
                           <td>" . $row["E-mail"] . "</td>
                           <td>" . $row["Tipo de solicitud"] . "</td>
                           <td>" . $row["Mensaje"] . "</td>
                           <td>" . $row["Solicitud creada en"] . "</td>
                    </tr>";
      }
    } else {
      echo "0 results";
    }
    $conector->close();
  }
  ?>
<!-- Clientes -->
  <?php
  if (isset($_POST['clientes'])) {
    echo ("<style> .ingreso{display: none;} .administrador{display: block;}</style>");
    include("../ConexionMYSQL.php");
    $sql = "SELECT
    NOMBRES,TELEFONO,EMAIL,COUNT(EMAIL) AS 'Veces que ha ingresado'
    FROM
    clientes
    GROUP BY EMAIL
    ORDER BY COUNT(EMAIL) DESC";
    $result = $conector->query($sql);

    if ($result->num_rows > 0) {
      //Nombres de las columnas
      echo "<table><tr>
    <th>Nombres</th>
    <th>Telefono</th>
    <th>E-mail</th> 
    <th>Veces que ha ingresado</th>
    </tr>";
      //Acomodando cada dato en su respectiva columna
      while ($row = $result->fetch_assoc()) {
        echo    "<tr>
                           <td>" . $row["NOMBRES"] . "</td>
                           <td>" . $row["TELEFONO"] . "</td>
                           <td>" . $row["EMAIL"] . "</td>
                           <td>" . $row["Veces que ha ingresado"] . "</td>
                    </tr>";
      }
    } else {
      echo "0 results";
    }
    $conector->close();
  }
  ?>

  <?php
  if (isset($_POST['ingresar'])) {
    include("../ConexionMYSQL.php");
    $user = "valor temporal";
    $pas = "valor temporal";
    $itu = 2;
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["psw"];
    $val1 = false;
    $val2 = false;
    $val3 = false;
    $mensaje = "valor temporal";

    $q = "SELECT USUARIO,CONTRASENA,IDX_TIPO_USUARIO FROM usuarios WHERE USUARIO LIKE '%$usuario%' limit 1";
    if ($result = $conector->query($q)) {
      while ($row = $result->fetch_assoc()) {
        $user = $row['USUARIO'];
        $pas = $row['CONTRASENA'];
        $itu = $row['IDX_TIPO_USUARIO'];
      }
    }

    if ($user === $usuario) {
      $val1 = true;
    } else {
      $mensaje = "Usuario incorrecto";
    }
    if ($pas === $contrasena) {
      $val2 = true;
    } else {
      $mensaje = "Contraseña incorrecta";
    }
    if ($itu == 1) {
      $val3 = true;
    } else {
      $mensaje = "Usted no tiene permisos para ingresar a este módulo o su cuenta no se creó correctamente, pida ayuda al área de sistemas.";
    }

    if ($val1 === true and $val2 === true and $val3 === true) {
      echo ("<style> .ingreso{display: none;} .administrador{display: block;}</style>");
    } else {
      print("<script>alert('$mensaje');</script>");
    }
  }


  ?>

</body>

</html>