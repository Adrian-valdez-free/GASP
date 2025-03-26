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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>
<body>

 <?php
  include "encabezado.php";
  include "Menu_botones.php";
  ?>
<br><br>
    <!-- Pestañas -->
    <ul class="tabs ancho">
      <li><a href="#tab1">REGISTRO DE COMIDA</a></li>
      <li><a href="#tab2">REGISTRO DE INGREDIENTES</a></li>
      <li><a href="#tab3">REGISTRO DE COMPLEMENTOS</a></li>
    </ul>
    <br><br>

    <!-- Contenidos de las pestañas -->
    <div id="tab1" class="tab_content regis ancho">

      <form action="guardarComida.php" class="formRe" method="post" enctype="multipart/form-data" onsubmit="return validarImagen()">
        <label for="" class="cuadrosG">Nombre de la comida: </label>
        <input type="text" class="rec" name="nombre_comida" required>
        <label for="" class="cuadrosG">Descripción: </label>
        <input type="text" class="rec" name="descripcion" required>
        <label for="" class="cuadrosG" id="rec2">Precio: </label>
        <input type="number" class="rec" name="precio" required min="1">
        <label for="" class="cuadrosG">Subir foto:</label>
        <input type="file" class="rec" name="imagen" accept=".jpg, .jpeg, .png" required>
        <div class="botones">
          <button type="submit" id="envi2" class="fifi">Guardar Comida</button>
          <button type="reset" id="envi2" class="fifi">Borrar datos</button>
        </div>
      </form>
    </div>

    <div id="tab2" class="tab_content regis ancho">

      <form action="guardarIngrediente.php" class="formRe" method="post" enctype="multipart/form-data" onsubmit="return validarImagen()">
        <label for="" class="cuadrosG">Nombre del ingrediente: </label>
        <input type="text" class="rec" name="nombre_ingrediente" required>
        <label for="" class="cuadrosG">Subir foto:</label>
        <input type="file" class="rec" name="imagen" accept=".jpg, .jpeg, .png" required>
        <div class="botones">
          <button type="submit" id="envi2" class="fifi">Guardar Ingrediente</button>
          <button type="reset" id="envi2" class="fifi">Borrar datos</button>
        </div>
      </form>
    </div>

    <div id="tab3" class="tab_content regis ancho">

      <form action="guardarcomplementos.php" class="formRe" method="post" enctype="multipart/form-data" onsubmit="return validarImagen()">
        <label for="" class="cuadrosG">Nombre del complemento: </label>
        <input type="text" class="rec" name="nombre_complemento" required>
        <label for="" class="cuadrosG">Descripción: </label>
        <input type="text" class="rec" name="descripcion" required>
        <label for="" class="cuadrosG" id="rec2">Precio: </label>
        <input type="number" class="rec" name="precio" required min="1">
        <label for="" class="cuadrosG">Subir foto:</label>
        <input type="file" class="rec" name="imagen" accept=".jpg, .jpeg, .png" required>
        <div class="botones">
          <button type="submit" id="envi2" class="fifi">Guardar Complemento</button>
          <button type="reset" id="envi2" class="fifi">Borrar datos</button>
        </div>
      </form>
    </div>
  </section>
</div>

<script>
  $(document).ready(function () {
    $(".tab_content").hide(); // Oculta todo el contenido
    $(".tabs li:first").addClass("active").show(); // Activa la primera pestaña
    $(".tab_content:first").show(); // Muestra el contenido de la primera pestaña

    // Evento de clic en las pestañas
    $("ul.tabs li a").click(function (e) {
      e.preventDefault();
      $("ul.tabs li").removeClass("active"); // Quita la clase "active" de todas las pestañas
      $(this).parent().addClass("active"); // Agrega la clase "active" a la pestaña seleccionada
      $(".tab_content").hide(); // Oculta todo el contenido
      var activeTab = $(this).attr("href"); // Obtén el ID del tab activo
      $(activeTab).fadeIn(); // Muestra el contenido del tab activo
    });
  });
</script>

</body>
</html>
