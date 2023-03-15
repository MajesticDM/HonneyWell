<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilosPHP.css">
    <link rel="icon" href="../Icons/Principal.png">

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
            background: #FFFF00;
            ;
        }

        .social ul li a:hover {
            background: #FFFD50;
            padding: 10px 30px;
        }
        @media(max-width: 943px) {
    .sedes .fila {
        flex-direction: column;
    }
}
    </style>
</head>

<body>
    <div class="social">
        <ul>
            <li><a href="../TpPHP/Administrador/" class="icon-facebook"></a></li>
        </ul>
    </div>
    <section class="sedes">
        <h1>Solicitudes</h1>
        <p>Te damos la bienvenida a nuestro apartado de solicitudes, aquí podrás encontrar las formas de comunicarte con nosotros</p>

        <div class="fila">
            <div class="sedes-columnas">
                <img src="../Images/buscoempleo.jpg">
                <div class="parte">
                    <a href="../TpPHP/Buscotrabajo/">
                        <h3>Trabaja con nosotros</h3>
                    </a>
                </div>
            </div>

            <div class="sedes-columnas">
                <img src="../Images/quejasyreclamos.png">
                <div class="parte">
                    <a href="../TpPHP/Quejas/">
                        <h3>Quejas y reclamos</h3>
                    </a>
                </div>
            </div>
            <div class="sedes-columnas">
                <img src="../Images/comunicatenosotros.png">
                <div class="parte">
                    <a href="../TpPHP/Comunicarse/">
                        <h3>Comunicate con nosotros</h3>
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>