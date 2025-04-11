<?php
    include "seguridad.php";
?>

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
  include "Menu_botonesE.php";
  ?>
  <br>
    <h1 class="Titu">MENU DE COMIDAS</h1>
    <br>
    <div class="CajaC">
        <?php
        require "conexion.php";

        if (!$conectar) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        $todos_Usuarios = "SELECT * FROM comidas ORDER BY id ASC";
        $resultado = mysqli_query($conectar, $todos_Usuarios);

        if (!$resultado) {
            die("Error en la consulta SQL: " . mysqli_error($conectar));
        }

        // Obtener ingredientes
        $query_ingredientes = "SELECT * FROM ingredientes";
        $result_ingredientes = mysqli_query($conectar, $query_ingredientes);
        $ingredientes = mysqli_fetch_all($result_ingredientes, MYSQLI_ASSOC);

        while ($row = mysqli_fetch_assoc($resultado)) {
        ?>
            <article class="CajaC2">
                <figure class="imgcomi"><img src="<?php echo $row["ruta"]; ?>" alt="" class="imagen-circular" height="75px" width="100px"></figure>
                <h1> <?php echo $row["nombre_comida"]; ?> </h1>
                <p> <?php echo $row["descripcion"]; ?> </p>
                <p> $ <?php echo $row["precio"]; ?> </p>

                <label for="" class="cuadrosG">Extras ingredientes:</label>
                <br>
                <div id="ingredientes_<?php echo $row['id']; ?>" class="rec4">
    <?php foreach ($ingredientes as $ingrediente) { ?>
        <label>
            <input type="checkbox" name="ingredientes_excluir_<?php echo $row['id']; ?>" value="<?php echo $ingrediente['id']; ?>">
            <?php echo htmlspecialchars($ingrediente['nombre_ingrediente']); ?>
        </label><br>
    <?php } ?>
</div>


                <label for="" class="cuadrosG">CANTIDAD:</label>
                <input type="number" min="1" max="99" step="1" value="1" id="cantidad_<?php echo $row['id']; ?>" class="rec3" required>
                <button onclick="agregarAlCarrito(<?php echo $row['id']; ?>, '<?php echo $row['nombre_comida']; ?>', <?php echo $row['precio']; ?>)" class="fifi2">Agregar a Pedidos</button>
            </article>
        <?php
        }

        mysqli_free_result($resultado);
        mysqli_close($conectar);
        ?>
    </div>


    <br>

    <h1 class="Titu">MENU DE COMPLEMENTOS</h1>
    <br>

<div class="CajaC">
    <?php
    require "conexion.php";

    if (!$conectar) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $todos_Usuarios = "SELECT * FROM complementos ORDER BY id ASC";
    $resultado = mysqli_query($conectar, $todos_Usuarios);

    if (!$resultado) {
        die("Error en la consulta SQL: " . mysqli_error($conectar));
    }

    while ($row = mysqli_fetch_assoc($resultado)) {
    ?>
        <article class="CajaC2">
            <figure class="imgcomi"><img src="<?php echo $row["ruta"]; ?>" alt="" class="imagen-circular" height="75px" width="100px"></figure>
            <h1> <?php echo $row["nombre_complemento"]; ?> </h1>
            <p> <?php echo $row["descripcion"]; ?> </p>
            <p> $ <?php echo $row["precio"]; ?> </p>

            <label for="" class="cuadrosG">CANTIDAD:</label>
            <input type="number" min="1" max="99" value="1" id="cantidad_complemento_<?php echo $row['id']; ?>" class="rec3" required>
            <button onclick="agregarAlCarrito(<?php echo $row['id']; ?>, '<?php echo $row['nombre_complemento']; ?>', <?php echo $row['precio']; ?>, true)" class="fifi2">Agregar a Pedidos</button>
        </article>
    <?php
    }

    mysqli_free_result($resultado);
    mysqli_close($conectar);
    ?>
</div>

</section>

</div>

<script>
let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

function agregarAlCarrito(id, nombre, precio, esComplemento = false) {
    const cantidadInputId = esComplemento ? `cantidad_complemento_${id}` : `cantidad_${id}`;
    const cantidadInput = document.getElementById(cantidadInputId);
    const cantidad = parseInt(cantidadInput.value);

    // Ingredientes excluidos solo aplican para comidas
    const ingredientesExcluidos = esComplemento ? [] : Array.from(
        document.querySelectorAll(`input[name="ingredientes_excluir_${id}"]:checked`)
    ).map(checkbox => ({
        id: checkbox.value,
        nombre: checkbox.nextSibling.textContent.trim()
    }));

    if (isNaN(cantidad) || cantidad < 1 || cantidad > 99) {
        alert("Por favor, ingresa una cantidad válida de 1 a 99.");
        cantidadInput.value = 1;
        return;
    }

    carrito.push({ id, nombre, precio, cantidad, ingredientes: ingredientesExcluidos });
    localStorage.setItem("carrito", JSON.stringify(carrito));

    const tipo = esComplemento ? "complemento(s)" : "comida(s)";
    const ingredientesTexto = ingredientesExcluidos.length > 0
        ? " Ingredientes extras: " + ingredientesExcluidos.map(ing => ing.nombre).join(", ")
        : " Sin ingredientes quitados.";

    alert(`${cantidad} ${nombre} (${tipo}) añadido(s) al carrito.${esComplemento ? "" : ingredientesTexto}`);
    cantidadInput.value = 1;

    if (!esComplemento) {
        // Desmarcar los checkboxes si no es complemento
        document.querySelectorAll(`input[name="ingredientes_excluir_${id}"]:checked`).forEach(checkbox => checkbox.checked = false);
    }
}
</script>

</body>
</html>