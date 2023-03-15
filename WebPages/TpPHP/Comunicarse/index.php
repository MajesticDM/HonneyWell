<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comuniquémonos</title>
  <link rel="stylesheet" type="text/css" href="../../TpCSS/Estilos.css">
  <link rel="icon" href="../../Icons/Principal.png">
</head>

<body>
  <!-- Formularios -->
  <div class="contact_form">
    <form name="registrar" method="post">
      <div class="formulario">
        <h1>Formulario de contacto</h1>
        <h3>Nos encanta hablar contigo, por eso sabrás de nosotros muy pronto</h3>

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
          <label for="mensaje" class="colocar_mensaje">Danos una razón para llamarte :)
            <span class="obligatorio">*</span>
          </label>
          <input type="text" name="descr" id="descr" required="obligatorio" placeholder="Ejm: Quiero contarles mi experiencia">
        </p>

        <p class="aviso">
          <span class="obligatorio"> * </span>los campos son obligatorios.
        </p>
        <input type="submit" name="registrar" class="enviar" value="Enviar">
        <input type="reset"  class="enviar" value="Limpiar">
      </div>
    </form>
  </div>


  <?php
  if (isset($_POST['registrar'])) {
    include '../ConexionMYSQL.php';

    $TIPO_USUARIO = 2;
    $NOMBRES =  $_POST['nombre'];
    $TELEFONO = $_POST['telefono'];
    $EMAIL = $_POST['email'];
    $TIPO_SOLI = 3;
    $DESCR = $_POST['descr'];


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

    $to      = $EMAIL;
    $subject = 'Contacto';
    $message = "Hola, $NOMBRES, vimos que nos enviaste un mensaje, créenos cuando te decimos que esto es lo más importante
    para nosotros, trataremos de comunicarnos contigo lo antes posible.
    Tu mensaje '$DESCR' fue recibido." ;
    $headers = 'From: noreplay@nomail.com'       . "\r\n" .
                 'Reply-To: noreplay@nomail.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
  }
  ?>

<?php
    
?>


</body>

</html>