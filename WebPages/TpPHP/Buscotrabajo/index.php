<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trabaja con nosotros</title>
  <link rel="stylesheet" type="text/css" href="../../TpCSS/Estilos.css">
  <link rel="icon" href="../../Icons/Principal.png">
</head>

<body>

  <!-- Formularios -->

  <div class="contact_form">
    <form name="registrar" method="post">
      <div class="formulario">
        <h1>Formulario de contacto</h1>
        <h3>Esto es muy importante para nosotros, por eso te dejaremos saber lo antes posible acerca de tu candidatura</h3>

        <p>
          <label for="nombre" class="colocar_nombre">Nombres
            <span class="obligatorio">*</span>
          </label>
          <input type="text" name="nombre" id="nombre" required="obligatorio" placeholder="Escribe tu nombre completo">
        </p>

        <p>
          <label for="email" class="colocar_email">Email
            <span class="obligatorio">*</span>
          </label>
          <input type="email" name="email" id="email" required="obligatorio" placeholder="Ejm: correo@mail.com">
        </p>

        <p>
          <label for="telefone" class="colocar_telefono">Teléfono
          <span class="obligatorio">*</span>
          </label>
          <input type="number" name="telefono" id="telefono" required="obligatorio" placeholder="Escribe tu teléfono">
        </p>

        <p>
          <label for="mensaje" class="colocar_mensaje">Cuéntanos de tu trabajo soñado
            <span class="obligatorio">*</span>
          </label>
          <input type="text" name="descr" id="descr" required="obligatorio" placeholder="Ejm: Me gustaría cocinar">
        </p>

        <p>
          <label for="direccion" class="colocar_website">Usuario
          <span class="obligatorio">*</span>
          </label>
          <input type="text" name="usuario" id="direccion" required="obligatorio" placeholder="Crea un usuario para más tarde">
        </p>

        <p>
          <label for="asunto" class="colocar_asunto">Contraseña
            <span class="obligatorio">*</span>
          </label>
          <input type="password" name="contrasena" id="assunto" required="obligatorio" placeholder="Crea una contraseña segura">
        </p>
        <p class="aviso">
          <span class="obligatorio"> * </span>los campos son obligatorios.
        </p>
        <input type="submit" name="registrar" class="enviar" value="Enviar candidatura">
        <input type="reset"  class="enviar" value="Limpiar">
      </div>
    </form>
  </div>


  <?php
  if (isset($_POST['registrar'])) {
    include '../ConexionMYSQL.php';

    $TIPO_USUARIO = 2;
    $NOMBRES =  $_POST['nombre'];
    $USUARIO = $_POST['usuario'];
    $CONTRASENA = $_POST['contrasena'];
    $TELEFONO = $_POST['telefono'];
    $EMAIL = $_POST['email'];
    $TIPO_SOLI = 2;
    $DESCR = $_POST['descr'];


    $sql = "INSERT INTO usuarios(IDX_TIPO_USUARIO,NOMBRES,USUARIO,CONTRASENA) VALUES ($TIPO_USUARIO,'$NOMBRES','$USUARIO','$CONTRASENA');";
    if ($conector->query($sql) === TRUE) {
      //echo '<script type="text/javascript">', 'window.alert("Registro guardado")', '</script>';
    }
    $sql = "INSERT INTO clientes(NOMBRES,TELEFONO,EMAIL) VALUES ('$NOMBRES',$TELEFONO,'$EMAIL');";
    if ($conector->query($sql) === TRUE) {
      //echo '<script type="text/javascript">', 'window.alert("Registro guardado")', '</script>';
    }
    $sql = "INSERT INTO solicitudes (IDX_CLIENTE,IDX_TIPO_SOLICITUD,DESCRIPCIÓN) VALUES ((SELECT MAX(ID_CLIENTE) FROM clientes),$TIPO_SOLI,'$DESCR');";
    if ($conector->query($sql) === TRUE) {
      //echo '<script type="text/javascript">', 'window.alert("Registro guardado")', '</script>';
    }

    echo '<script type="text/javascript">', 'window.alert("Registro guardado")', '</script>';
    $conector->close();
  }
  ?>


</body>

</html>