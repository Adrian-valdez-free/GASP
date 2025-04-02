<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="diseño1.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<?php
  include "encabezado.php";
  include "Menu_botones.php";
  ?>
   

<section class="tab_content">
     <h1 class="tititu">REGISTRO DE COMIDA</h1>
     <br>
        <div id="tab1" class="VerListaAdmin">
            <table class="tablaAdmin">
                <tr class="tablaAdminTop">
                    <th>Foto</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCIÓN</th>
                    <th>PRECIO</th>
                    <th> </th>
                    
                </tr>

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

                while ($row = mysqli_fetch_assoc($resultado)) {
                ?>
                    <tr>
                        <td><img src="<?php echo $row["ruta"]; ?>" alt="" class="imagen-circular" height="75px" width="100px"></td>
                        <td><?php echo $row["nombre_comida"]; ?></td>
                        <td><?php echo $row["descripcion"]; ?></td>
                        <td>$<?php echo $row["precio"]; ?></td>
                        <td> 
                            <a href="eliminar.php?id=<?php echo $row["id"]; ?>" id="consu2">Eliminar</a>
                            <button onclick="mostrarModal(<?php echo $row['id']; ?>, '<?php echo $row['nombre_comida']; ?>', '<?php echo $row['descripcion']; ?>', <?php echo $row['precio']; ?>, '<?php echo $row['ruta']; ?>')" id="consu3">Editar</button>
                        </td>
                    </tr>
                <?php
                }

                mysqli_free_result($resultado);
                mysqli_close($conectar);
                ?>
            </table>
        </div>
<br>
        <h1 class="tititu">REGISTRO DE INGREDIENTES</h1>
     <br>
        <div id="tab2" class="VerListaAdmin">
            <table class="tablaAdmin">
                <tr class="tablaAdminTop">
                    <th>Foto</th>
                    <th>NOMBRE</th>
                    <th> </th>
                    
                </tr>

                <?php
                require "conexion.php";

                if (!$conectar) {
                    die("Error de conexión: " . mysqli_connect_error());
                }

                $todos_Usuarios = "SELECT * FROM ingredientes ORDER BY id ASC";
                $resultado = mysqli_query($conectar, $todos_Usuarios);

                if (!$resultado) {
                    die("Error en la consulta SQL: " . mysqli_error($conectar));
                }

                while ($row = mysqli_fetch_assoc($resultado)) {
                ?>
                    <tr>
                        <td><img src="<?php echo $row["ruta"]; ?>" alt="" class="imagen-circular" height="75px" width="100px"></td>
                        <td><?php echo $row["nombre_ingrediente"]; ?></td>
                        <td> 
                            <a href="eliminarIngredientes.php?id=<?php echo $row["id"]; ?>" id="consu2">Eliminar</a>
                            <button onclick="mostrarModalIngrediente(<?php echo $row['id']; ?>, '<?php echo $row['nombre_ingrediente']; ?>', '<?php echo $row['ruta']; ?>')" id="consu3">Editar</button>

                        </td>
                    </tr>
                <?php
                }

                mysqli_free_result($resultado);
                mysqli_close($conectar);
                ?>
            </table>
        </div>

        <br>
     <h1 class="tititu">REGISTRO DE COMPLEMENTOS</h1>
     <br>
        <div id="tab3" class="VerListaAdmin">
            <table class="tablaAdmin">
                <tr class="tablaAdminTop">
                    <th>Foto</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCIÓN</th>
                    <th>PRECIO</th>
                    <th> </th>
                    
                </tr>

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
                    <tr>
                        <td><img src="<?php echo $row["ruta"]; ?>" alt="" class="imagen-circular" height="75px" width="100px"></td>
                        <td><?php echo $row["nombre_complemento"]; ?></td>
                        <td><?php echo $row["descripcion"]; ?></td>
                        <td>$<?php echo $row["precio"]; ?></td>
                        <td> 
                            <a href="eliminarComplementos.php?id=<?php echo $row["id"]; ?>" id="consu2">Eliminar</a>
                            <button onclick="mostrarModalComplemento(<?php echo $row['id']; ?>, '<?php echo $row['nombre_complemento']; ?>', '<?php echo $row['descripcion']; ?>', <?php echo $row['precio']; ?>, '<?php echo $row['ruta']; ?>')" id="consu3">Editar</button>
                        </td>
                    </tr>
                <?php
                }

                mysqli_free_result($resultado);
                mysqli_close($conectar);
                ?>
            </table>
        </div>
        </section>

</div>

<!-- Modal para editar comida -->
<div class="modal-bg" id="modal-bg">
  <div class="modal">
    <button class="close-btn" onclick="cerrarModal()">X</button>
    <h2>Editar Comida</h2>
    <form id="formEditar" action="editar_comida.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" id="comidaId">
      <label>Nombre de la comida:</label>
      <input type="text" name="nombre_comida" id="nombreComida" required>
      
      <label>Descripción:</label>
      <input type="text" name="descripcion" id="descripcionComida" required>
      
      <label>Precio:</label>
      <input type="number" name="precio" id="precioComida" min="1" required>
      
      <label>Actualizar foto:</label>
      <input type="file" accept=".jpg, .jpeg, .png" name="imagen" id="imagenComida">

      <button type="submit">Guardar cambios</button>
    </form>
  </div>
</div>


<!-- Modal para editar ingrediente -->
<div class="modal-bg" id="modal-bg-ingrediente">
  <div class="modal">
    <button class="close-btn" onclick="cerrarModalIngrediente()">X</button>
    <h2>Editar Ingrediente</h2>
    <form id="formEditarIngrediente" action="editar_ingrediente.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" id="ingredienteId">
      <label>Nombre del ingrediente:</label>
      <input type="text" name="nombre_ingrediente" id="nombreIngrediente" required>

      <label>Actualizar foto:</label>
      <input type="file" name="imagen" accept=".jpg, .jpeg, .png" id="imagenIngrediente">

      <button type="submit">Guardar cambios</button>
    </form>
  </div>
</div>


<!-- Modal para editar complemento -->
<div class="modal-bg" id="modal-bg-complemento">
  <div class="modal">
    <button class="close-btn" onclick="cerrarModalComplemento()">X</button>
    <h2>Editar Complemento</h2>
    <form id="formEditarComplemento" action="editar_complemento.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" id="complementoId">
      <label>Nombre del complemento:</label>
      <input type="text" name="nombre_complemento" id="nombreComplemento" required>
      
      <label>Descripción:</label>
      <input type="text" name="descripcion" id="descripcionComplemento" required>
      
      <label>Precio:</label>
      <input type="number" name="precio" id="precioComplemento" min="1" required>
      
      <label>Actualizar foto:</label>
      <input type="file" accept=".jpg, .jpeg, .png" name="imagen" id="imagenComplemento">

      <button type="submit">Guardar cambios</button>
    </form>
  </div>
</div>

<script>
  // Función para mostrar el modal con los datos de la comida
  function mostrarModal(id, nombre, descripcion, precio, ruta) {
      document.getElementById("modal-bg").style.display = "flex";
      document.getElementById("comidaId").value = id;
      document.getElementById("nombreComida").value = nombre;
      document.getElementById("descripcionComida").value = descripcion;
      document.getElementById("precioComida").value = precio;
  }

  // Función para cerrar el modal
  function cerrarModal() {
      document.getElementById("modal-bg").style.display = "none";
  }

  // Función para mostrar el modal de ingredientes
function mostrarModalIngrediente(id, nombre, ruta) {
    document.getElementById("modal-bg-ingrediente").style.display = "flex";
    document.getElementById("ingredienteId").value = id;
    document.getElementById("nombreIngrediente").value = nombre;
}

// Función para cerrar el modal de ingredientes
function cerrarModalIngrediente() {
    document.getElementById("modal-bg-ingrediente").style.display = "none";
}

  // Función para mostrar el modal de edición de complementos
  function mostrarModalComplemento(id, nombre, descripcion, precio, ruta) {
      document.getElementById("modal-bg-complemento").style.display = "flex";
      document.getElementById("complementoId").value = id;
      document.getElementById("nombreComplemento").value = nombre;
      document.getElementById("descripcionComplemento").value = descripcion;
      document.getElementById("precioComplemento").value = precio;
  }

  // Función para cerrar el modal de edición de complementos
  function cerrarModalComplemento() {
      document.getElementById("modal-bg-complemento").style.display = "none";
  }

</script>

</body>
</html>
