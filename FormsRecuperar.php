<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante Chucho</title>
    <link rel="stylesheet" href="diseño1.css">
</head>
<body>

    <?php 
    include "encabezado.php";
    ?>

    <div class="panel1">
        <br><br>
        

        <h1>Recuperación de contraseña</h1><br><br>

        <div class="panel2">
            <h3>* Campos obligatorios</h3><br><br>
            <form action="recuperar.php" method="post">
                <br>
                <label for="">Correo Electrónico<span>*</span> :</label>&nbsp;&nbsp;
                <input type="email" name="correo" required><br><br>

                <button type="submit" class="boton1" >Recuperar</button>
                <br><br>
                <a href="index.php" >Regresar</a>
            </form>
        </div>
    </div>
</body>
</html>