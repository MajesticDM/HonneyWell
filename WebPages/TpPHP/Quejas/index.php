<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Déjanos tus reclamos</title>
  <link rel="stylesheet" type="text/css" href="../../TpCSS/Estilos.css">
  <link rel="icon" href="../../Icons/Principal.png">
</head>

<body>

  <!-- Formularios -->

  <div class="contact_form">
    <form name="registrar" method="post">
      <div class="formulario">
        <h1>Formulario de contacto</h1>
        <h3>Entendemos tus posibles disgustos, trataremos de comunicarnos contigo tan rápido como nos sea posible</h3>

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
          <input type="number" name="telefono" required="obligatorio" id="telefono" placeholder="Escribe tu teléfono">
        </p>

        <p>
          <label for="mensaje" class="colocar_mensaje">Dinos tu razón
            <span class="obligatorio">*</span>
          </label>
          <select name="mensaje">
                                <?php
                                include '../ConexionMYSQL.php';
                                $query = ("SELECT ID_TIPO_SOLICITUD,TIPO_SOLICITUD FROM tipo_solicitudes");
                                $result = $conector->query($query);
                                $ejecutar = mysqli_query($conector, $query);
                                ?>
                                <?php
                                foreach ($ejecutar as $opciones) :
                                ?>
                                    <option value="<?php echo $opciones['ID_TIPO_SOLICITUD'] ?>"><?php echo $opciones['TIPO_SOLICITUD'] ?></option>
                                <?php
                                endforeach;
                                $conector->close();
                                ?>
                            </select>
        </p>

        <p>
          <label for="direccion" class="colocar_website">Usuario
          <span class="obligatorio">*</span>
          </label>
          <input type="text" name="usuario" required="obligatorio" id="direccion" placeholder="Crea un usuario para más tarde">
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
        <input type="submit" name="registrar" class="enviar" value="Solicitar contacto">
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
    $TIPO_SOLI = $_POST['mensaje'];
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