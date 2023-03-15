<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../Icons/Principal.png">
    <title>Hagamos cambios</title>
    <style>
        * {
    padding: 0;
    margin: 0;
}

*,
*:before,
*:after {
    box-sizing: border-box;
}

body {
    background: #c1bdba;
    font-family: "Ubuntu", helvetica;
}

a {
    text-decoration: none;
    color: #1ab188;
    transition: 0.5s ease;
}

a:hover {
    color: #179b77;
}

.contenedor-formularios {
    background: rgba(19, 35, 47, 0.9);
    box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
    padding: 40px;
    max-width: 600px;
    margin: 40px auto;
    border-radius: 4px;
    
}

.contenedor-tabs {
    list-style: none;
    padding: 0;
    margin: 0 0 40px 0;
}

.contenedor-tabs:after {
    content: "";
    display: table;
    clear: both;
}

.contenedor-tabs li a {
    display: block;
    text-decoration: none;
    padding: 15px;
    background: rgba(160, 179, 176, 0.25);
    color: #a0b3b0;
    font-size: 20px;
    float: left;
    width: 50%;
    text-align: center;
    cursor: pointer;
    transition: 0.5s ease;
}

.contenedor-tabs li a:hover {
    background: #179b77;
    color: #fff;
}

.contenedor-tabs .active a {
    background: #1ab188;
    color: #fff;
}

.contenido-tab>div:last-child {
    display: block;
}

h1 {
    text-align: center;
    color: #fff;
    font-weight: 300;
    margin: 0 0 40px;
}

label {
    position: absolute;
    transform: translateY(6px);
    left: 13px;
    color: rgba(255, 255, 255, 0.5);
    transition: all 0.25s ease;
    --webkit-backface-visibility: hidden;
    pointer-events: none;
    font-size: 22px;
}

label .req {
    margin: 2px;
    color: #1ab188;
}

label.active {
    transform: translateY(50px);
    left: 2px;
    font-size: 14px;
}

label.active .req {
    opacity: 0;
}

label.highlight {
    color: #fff;
}

input {
    font-size: 22px;
    display: block;
    width: 100%;
    height: 100%;
    padding: 5px 10px;
    background: none;
    background-image: none;
    border: 1px solid #a0b3b0;
    border-top: none;
    border-left: none;
    border-right: none;
    color: #fff;
    border-radius: 0;
    transition: all 0.5s ease;
    border-radius: 5px;
}

input:focus {
    outline: none;
    border-color: #1ab188;
}

.contenedor-input {
    position: relative;
    margin-bottom: 40px;
}

.contenedor-input select {
    margin-bottom: 40px;
    outline: none;

    font-size: 22px;
    display: block;
    width: 100%;
    height: 100%;
    padding: 5px 10px;
    background: none;
    background-image: none;
    border: 1px solid #a0b3b0;
    border-top: none;
    border-left: none;
    border-right: none;
    color: rgb(122, 122, 122);
    border-radius: 0;
    transition: all 0.5s ease;
    border-radius: 5px;
}

.fila-arriba:after {
    content: "";
    display: table;
    clear: both;
}

.fila-arriba div {
    float: left;
    width: 48%;
    margin-right: 4%;
}

.fila-arriba div:last-child {
    margin: 0;
}

.button {
    border: 0;
    outline: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 15px 0;
    font-size: 2rem;
    background: #1ab188;
    color: #fff;
    transition: all 0.5s ease;
    -webkit-appearance: none;
}

.button:hover,
.button:focus {
    background: #179b77;
}

.button-block {
    display: block;
    width: 100%;
}

.forgot {
    margin-top: -20px;
    text-align: right;
    margin-bottom: 20px;
}

@media screen and (max-width: 500px) {
    .fila-arriba div {
        width: 100%;
    }

    .fila-arriba div:last-child {
        margin-bottom: 40px;
    }
}

@media screen and (max-width: 400px) {
    .contenedor-tabs li a {
        width: 100%;
    }
}
    </style>
</head>

<body>
<body>
    <!-- Formularios -->
    <div class="contenedor-formularios">
        <!-- Links de los formularios -->
        <ul class="contenedor-tabs">
            <li class="tab tab-primera"><a href="#">Actualizar o eliminar</a></li>
        </ul>

        <!-- Contenido de los Formularios -->
        <div class="contenido-tab">
            <!-- Registrarse -->
            <div id="registrarse">

                <h1>Actualicemos un cliente</h1>

                <form name="guardar" method="post">
                    <div class="fila-arriba">
                        <div class="contenedor-input">
                            <!-- Para llenar el SELECT -->
                            <select name="numeros">
                                <?php
                                include '../../ConexionMYSQL.php';
                                $query = ("SELECT ID_USUARIO,NOMBRES FROM usuarios");
                                $result = $conector->query($query);
                                $ejecutar = mysqli_query($conector, $query);
                                ?>
                                <?php
                                foreach ($ejecutar as $opciones) :
                                ?>
                                    <option value="<?php echo $opciones['ID_USUARIO'] ?>"><?php echo $opciones['NOMBRES'] ?></option>
                                <?php
                                endforeach;
                                $conector->close();
                                ?>
                            </select>
                        </div>
                        <div class="contenedor-input">
                            <input type="text" name="nombre" placeholder="Nuevo usuario" required value="Usuario">
                        </div>
                    </div>
                    <div class="contenedor-input">
                        <input type="password" name="numero" placeholder="Nueva contraseña" required value="Contraseña">
                    </div>
                    <input type="submit" name="actualizar" class="button button-block" value="Actualizar">
                    <br>
                    <input type="submit" name="eliminar" class="button button-block" value="Eliminar">
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['actualizar'])) {
        include '../../ConexionMYSQL.php';
        echo '<script type="text/javascript">', 'window.alert("Registro actualizado")', '</script>';
        $DNI = $_POST['numeros'];
        $nombre = $_POST['nombre'];
        $numero = $_POST['numero'];

        echo '<script type="text/javascript">', 'window.alert("Registro actualizado")', '</script>';

        $sql = "UPDATE usuarios SET USUARIO = '$nombre', CONTRASENA = '$numero' WHERE ID_USUARIO = $DNI";

        if ($conector->query($sql) === TRUE) {
            echo '<script type="text/javascript">', 'window.alert("Registro actualizado")', '</script>';
        } else {
            echo '<script type="text/javascript">', 'window.alert("Algo hiciste mal, sopla mondá")', '</script>';
        }

        $conector->close();
    }
    ?>

<?php
    if (isset($_POST['eliminar'])) {
        include '../../ConexionMYSQL.php';

        $DNI = $_POST['numeros'];
        $nombre = $_POST['nombre'];
        $numero = $_POST['numero'];

        $sql = "DELETE FROM usuarios WHERE ID_USUARIO = $DNI";

        if ($conector->query($sql) === TRUE) {
            echo '<script type="text/javascript">', 'window.alert("Registro eliminado")', '</script>';
        } else {
            echo '<script type="text/javascript">', 'window.alert("Algo hiciste mal, sopla mondá")', '</script>';
        }

        $conector->close();
    }
    ?>
</body>

</html>