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
        
        <p><span>FORMULARIO</span></p><br>

        <h1>REGISTRO DE PERSONAL</h1><br><br>

        <div class="panel2">
            <h3>* Campos obligatorios</h3><br><br>
            <form action="recibir_info.php" method="post">
            <input type="hidden" name="tipo" value = "2" required><br><br>
                <label for="">Nombre Completo<span>*</span>  :</label>
                <input type="text" name="nombre" required><br><br>
                <label for="">Correo Electrónico<span>*</span> :</label>&nbsp;&nbsp;
                <input type="email" name="correo" required><br><br>
                
                <label for="">Teléfono<span>*</span> :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input 
                    type="tel" 
                    name="telefono" 
                    pattern="[0-9]{10}" 
                    maxlength="10" 
                    required
                >
                <br><br>
                <label>al menos 8 carateres, incluye al menos una mayúscula y un número.</label>
                <br><br>
                <label for="">Contraseña<span>*</span> :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                

                <input 
                    type="password" 
                    name="contrasena" 
                    id = "contrasena"
                    pattern="^(?=.*[A-Z])(?=.*\d).{8,}$" 
                    title="La contraseña debe al menos 8 caracteres, incluyendo al menos una mayúscula y un número." 
                    required
                >
                <button type="button" id="togglePassword"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="1"> <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path> <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path> </svg></button>
                <br><br>
                <label for="">Fecha de ingreso<span>*</span> :</label>&nbsp;&nbsp;
                <input type="date" name="Fecha" required><br><br>
                <br><br>
                <!-- <label for="">Tipo de Usuario<span>*</span> :</label>&nbsp;&nbsp;
                <select name="Tipo_Usuario" id="Tipo_Usuario" required>
                     <option value="Administrador">Administrador</option> 
                    <option value="Usuario">Mesero</option>
                    <option value="Cocinero">Cocinero</option>
                    <option value="Cajero">Cajero</option>
                </select> -->
                <button type="submit" class="boton1" >Registrarse</button>
                <br><br>
                <a href="index.php" >Regresar</a>
                <br><br>
            </form>
        </div>
    </div>
    <script>
    document.getElementById("togglePassword").addEventListener("click", function() {
        let passwordInput = document.getElementById("contrasena");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            this.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="0.75"> <path d="M21 9c-2.4 2.667 -5.4 4 -9 4c-3.6 0 -6.6 -1.333 -9 -4"></path> <path d="M3 15l2.5 -3.8"></path> <path d="M21 14.976l-2.492 -3.776"></path> <path d="M9 17l.5 -4"></path> <path d="M15 17l-.5 -4"></path> </svg> `; // Cambia el icono a ocultar
        } else {
            passwordInput.type = "password";
            this.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" stroke-width="1"> <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path> <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path> </svg> `; // Cambia el icono a mostrar
        }
    });
</script>
</body>
</html>